<template>
    <div class="bg-white rounded-md drop-shadow mb-4 overflow-hidden">
        <div class="bg-emerald-600 text-white p-3">
            <p class="text-sm uppercase font-bold">{{ subjectName }} - {{ classroomData.name }}</p>
        </div>
        <div class="px-3 py-4">
            <div class="grid grid-cols-3 gap-2 text-sm text-gray-600">
                <p class="col-span-2">Jumlah Pertemuan Diadakan</p>
                <p class="font-bold text-gray-600 text-right">{{ classroomData.schedule.qrs.length }}</p>
                <p class="col-span-2">Jumlah Kehadiran Saya</p>
                <p class="font-bold text-right text-emerald-600">
                    {{ classroomData.total_valid_presence }}
                </p>
                <p class="col-span-2">Menunggu Validasi</p>
                <p class="font-bold text-right" :class="{
                    'text-gray-600' : classroomData.total_invalid_presence == 0,
                    'text-yellow-400' : classroomData.total_invalid_presence > 0,
                }">
                    {{ classroomData.total_invalid_presence }}
                </p>
            </div>
        </div>
        <h2>
            <button type="button" v-on:click="toggleCollapse"
                class="flex items-center justify-between w-full font-semibold p-3 text-left text-gray-600 border-t border-gray-200">
                <span>Lihat Detail Kehadiran Saya</span>
                <svg class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                    :class="{
                        'rotate-180' : showCollapse,
                        'rotate-0'   : !showCollapse,
                    }">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </h2>
        <div v-if="showCollapse">
            <div class="p-3 font-light text-sm border-t border-gray-200 text-gray-500 flex flex-col gap-3">
                <div class="flex items-center justify-between text-sm" v-for="(schedule, index) in classroomData.schedule.qrs">
                    <div>
                        <p class="font-bold">Pertemuan {{ index+1 }}</p>
                        <p>{{ schedule.end_date }}</p>
                    </div>
                    <div class="text-emerald-600" v-if="(schedule.presenceds.length > 0) && (schedule.presenceds[0].is_valid === 1)">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="text-yellow-400" v-else-if="(schedule.presenceds.length > 0) && (schedule.presenceds[0].is_valid === 0)">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="text-red-600" v-else>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "card-presence-info",
    data() {
        return {
            showCollapse: false,
        };
    },
    methods : {
        toggleCollapse: function(){
            this.showCollapse = !this.showCollapse;
        }
    },
    props: {
        classroomData: Object,
        subjectName: String,
    },
};
</script>
