<template>
    <div class="bg-white p-4 rounded-md drop-shadow">
        <p class="text-base font-semibold text-emerald-600 mb-2">
            {{ subjectData.period_subject.subject.name }}
        </p>
        <p
            class="text-sm text-gray-400 mb-2"
            v-if="subjectData.schedules.length <= 0"
        >
            Anda belum memilih jadwal
        </p>
        <div class="grid grid-cols-3 gap-2 text-sm text-gray-500 mb-3" v-else>
            <p class="font-bold col-span-3">Jadwal terdaftar :</p>
            <p class="col-span-1">Kelas</p>
            <p class="col-span-2 font-semibold">
                {{ subjectData.schedules[0].classroom.name }}
            </p>
            <p class="col-span-1">Jadwal</p>
            <p class="col-span-2 font-semibold">
                {{ subjectData.schedules[0].day }},
                {{ subjectData.schedules[0].start_time }} -
                {{ subjectData.schedules[0].end_time }}
            </p>
            <p class="col-span-1">Ruangan</p>
            <p class="col-span-2 font-semibold">
                {{ subjectData.schedules[0].room.building }},
                {{ subjectData.schedules[0].room.name }}
            </p>
            <!-- <p class="col-span-1">
                Saat ini
            </p>
            <p class="col-span-2 font-semibold">
                {{ current_schedule }}
            </p>
            <p class="col-span-1">
                Dipilih
            </p>
            <p class="col-span-2 font-semibold">
                {{ form.schedule }}
            </p> -->
        </div>

        <form @submit.prevent="submit">
            <div class="mb-2">
                <select
                    class="w-full text-sm text-gray-600 py-1 px-2 border-none bg-gray-50"
                    v-model="form.schedule"
                >
                    <option selected disabled hidden value="-1">
                        Pilih Jadwal
                    </option>

                    <option
                        v-for="classroom in subjectData.period_subject
                            .classrooms"
                        :value="classroom.schedule.id"
                        :selected="
                            subjectData.schedules.length > 0 &&
                            subjectData.schedules[0].id ===
                                classroom.schedule.id
                        "
                    >
                        {{ classroom.name }} - {{ classroom.schedule.day }},
                        {{ classroom.schedule.start_time }} -
                        {{ classroom.schedule.end_time }}
                        ({{ classroom.schedule.room.building }},
                        {{ classroom.schedule.room.name }})
                    </option>
                </select>
            </div>
            <button
                type="submit"
                :disabled="current_schedule === form.schedule"
                class="py-1 px-2 rounded text-white font-bold text-sm mb-2"
                :class="{
                    'bg-sky-400 hover:bg-sky-500':
                        subjectData.schedules.length > 0 &&
                        current_schedule !== form.schedule,
                    'bg-sky-200':
                        subjectData.schedules.length > 0 &&
                        current_schedule === form.schedule,
                    'bg-emerald-400 hover:bg-emerald-500':
                        subjectData.schedules.length <= 0 &&
                        current_schedule !== form.schedule,
                    'bg-emerald-200':
                        subjectData.schedules.length <= 0 &&
                        current_schedule === form.schedule,
                }"
            >
                {{
                    subjectData.schedules.length > 0
                        ? "Ajukan Perubahan Jadwal"
                        : "Ajukan Jadwal"
                }}
            </button>
        </form>

        <p class="text-xs italic text-gray-500">
            Note : Admin berhak menyesuaikan jadwal anda.
        </p>
    </div>
</template>
<script>
import { useForm } from "@inertiajs/inertia-vue3";
import { computed } from "vue";
import { Inertia } from "@inertiajs/inertia";

export default {
    name: "card-subject-schedule",
    props: {
        subjectData: Object,
    },
    setup(props) {
        const current_schedule = computed(() => {
            if (props.subjectData.schedules.length <= 0) {
                return "-1";
            } else {
                return props.subjectData.schedules[0].id;
            }
        });
        const form = useForm({
            schedule: current_schedule.value,
        });

        const submit = () => {
            Inertia.post(route("user.schedule.store"), form);
        };
        return {
            current_schedule,
            form,
            submit,
        };
    },
};
</script>
