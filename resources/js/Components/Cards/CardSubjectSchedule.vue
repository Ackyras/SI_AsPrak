<template>
    <div class="bg-white p-3 rounded-md drop-shadow flex gap-3 items-center">
        <div class="w-full">
            <div class="grid grid-cols-3 gap-2 text-sm text-gray-500" :class="{ 'mb-3' :  openSubmission === 1 }">
                <p class="text-emerald-600 text-base col-span-3 font-semibold">Kelas
                    {{ scheduleData.classroom.name }}
                </p>
                <p class="col-span-1">Jadwal</p>
                <p class="col-span-2 font-semibold">
                    {{ scheduleData.day }},
                    {{ scheduleData.start_time }} -
                    {{ scheduleData.end_time }}
                </p>
                <p class="col-span-1">Ruangan</p>
                <p class="col-span-2 font-semibold">
                    {{ scheduleData.room.building }},
                    {{ scheduleData.room.name }}
                </p>
            </div>

            <p class="text-xs italic text-gray-500" v-if="openSubmission === 1">
                Note : Admin berhak menyesuaikan jadwal anda.
            </p>
        </div>
        <div class="w-10 flex-col justify-start gap-2 items-end">
            <button class="block w-fit p-1 rounded-full bg-red-600 text-white" v-on:click="showModal">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </span>
            </button>
        </div>
    </div>
    <div v-if="show_modal" class="fixed z-[1000] inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 w-[22.5rem] md:w-[23rem] lg:w-[25rem] xl:w-[27.5rem]">
            <div class="w-full flex items-center justify-between mb-4">
                <p class="text-xl font-bold tracking-wide text-green-600 md:text-2xl">
                    Hapus Jadwal
                </p>
                <button type="button" class="px-3 py-1 text-xl text-gray-600 border rounded" v-on:click="closeModal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form @submit.prevent="submit">
                <div class="w-full">
                    <div class="w-full mb-4">
                        <p class="text-base font-semibold text-gray-600 block m-0 mb-2">Anda akan menghapus jadwal berikut : </p>
                        <div class="grid grid-cols-3 gap-2 text-sm text-gray-500 mb-2">
                            <p class="text-emerald-600 text-base col-span-3 font-semibold">
                                {{ subjectName }} - Kelas {{ scheduleData.classroom.name }}
                            </p>
                            <p class="col-span-1">Jadwal</p>
                            <p class="col-span-2 font-semibold">
                                {{ scheduleData.day }},
                                {{ scheduleData.start_time }} -
                                {{ scheduleData.end_time }}
                            </p>
                            <p class="col-span-1">Ruangan</p>
                            <p class="col-span-2 font-semibold">
                                {{ scheduleData.room.building }},
                                {{ scheduleData.room.name }}
                            </p>
                        </div>
                        <p class="text-base font-semibold text-gray-600 block m-0 mb-2">Anda yakin untuk melanjutkan aksi ini?</p>
                    </div>

                    <input type="hidden" name="psr_schedule" v-model="form.psr_schedule">

                    <div class="flex justify-between items-center">
                        <button type="button" v-on:click="closeModal" class="py-1 w-36 text-center rounded text-white font-bold text-sm mb-2 bg-gray-500">
                            Batalkan
                        </button>
                        <button type="submit" class="py-1 w-36 text-center rounded text-white font-bold text-sm mb-2 bg-red-600">
                            Hapus
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import { useForm } from "@inertiajs/inertia-vue3";
import { ref, computed } from "vue";
import { Inertia } from "@inertiajs/inertia";

export default {
    name: "card-subject-schedule",
    props: {
        psrId: Number,
        scheduleData: Object,
        subjectName: String,
        openSubmission: Number,
    },
    setup(props) {
        const current_schedule = computed(() => {
            return "-1";
        });
        const show_modal = ref(false);

        const showModal = () => {
            show_modal.value = true;
        };
        const closeModal = () => {
            show_modal.value = false;
        };

        const form = useForm({
            schedule_id: props.scheduleData.id,
            psr_id: props.psrId
        });

        const submit = () => {
            Inertia.post(route("user.schedule.destroy"), form);
        };
        return {
            current_schedule,
            show_modal,
            showModal,
            closeModal,
            form,
            submit
        };
    },
};
</script>
