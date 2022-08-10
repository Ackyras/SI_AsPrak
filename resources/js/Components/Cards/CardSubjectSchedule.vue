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
            <button class="block w-fit p-1 rounded-full bg-red-600 text-white">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </span>
            </button>
        </div>
    </div>
</template>
<script>
import { useForm } from "@inertiajs/inertia-vue3";
import { computed } from "vue";
import { Inertia } from "@inertiajs/inertia";

export default {
    name: "card-subject-schedule",
    props: {
        scheduleData: Object,
        openSubmission: Number,
    },
    setup(props) {
        const current_schedule = computed(() => {
            return "-1";
        });
        return {
            current_schedule,
        };
    },
};
</script>
