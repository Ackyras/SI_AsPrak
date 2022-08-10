<template>
    <div class="bg-white p-3 rounded-md drop-shadow">
        <p class="text-sm text-gray-400 mb-2" >
            Jadwal Baru
        </p>

        <form @submit.prevent="submit">
            <div class="mb-2">
                <select class="w-full text-sm text-gray-600 py-1 px-2 border-none bg-gray-50" v-model="form.schedule_id">
                    <option selected disabled hidden value="-1">
                        Pilih Jadwal
                    </option>

                    <option v-for="classroom in subjectData.period_subject.classrooms" v-show="!currentSchedules.includes(classroom.id)"
                        :value="classroom.schedule.id" :key="classroom.id">
                        {{ classroom.name }} - {{ classroom.schedule.day }},
                        {{ classroom.schedule.start_time }} -
                        {{ classroom.schedule.end_time }}
                        ({{ classroom.schedule.room.building }},
                        {{ classroom.schedule.room.name }})
                        <small>
                            ({{ classroom.schedule.psrs_count }}/{{ classroom.schedule.number_of_lab_assistant }})
                        </small>
                    </option>
                </select>
            </div>
            <button type="submit"
                :disabled="current_schedule === form.schedule_id"
                class="py-1 px-2 rounded text-white font-bold text-sm mb-2"
                :class="{
                    'bg-sky-400 hover:bg-sky-500': current_schedule !== form.schedule_id,
                    'bg-sky-200': current_schedule === form.schedule_id,
                }"
            >
                Ajukan Jadwal
            </button>
        </form>

        <p class="text-xs italic text-gray-500" v-if="openSubmission === 1">
            Note : Admin berhak menyesuaikan jadwal anda.
        </p>
    </div>
</template>
<script>
import { useForm } from "@inertiajs/inertia-vue3";
import { computed } from "vue";
import { Inertia } from "@inertiajs/inertia";

export default {
    name: "card-add-schedule",
    props: {
        subjectData: Object,
        openSubmission: Number,
        currentSchedules: Array,
    },
    setup(props) {
        const current_schedule = computed(() => {
            return "-1";
        });
        
        const form = useForm({
            schedule_id: current_schedule.value,
            psr_id: props.subjectData.id,
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
