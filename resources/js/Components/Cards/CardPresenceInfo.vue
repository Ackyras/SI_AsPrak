<template>
    <div class="bg-white rounded-md drop-shadow mb-4 overflow-hidden">
        <div class="bg-emerald-600 text-white p-3">
            <p class="text-sm uppercase font-bold">{{ subjectData.name }}</p>
        </div>
        <div class="px-3 py-4">
            <div class="grid grid-cols-3 gap-2 text-sm text-gray-600">
                <p class="col-span-2">Jumlah Pertemuan Diadakan</p>
                <p class="font-bold text-emerald-600 text-right">{{ subjectData.jumlah_pertemuan }}</p>
                <p class="col-span-2">Jumlah Kehadiran Saya</p>
                <p class="font-bold text-right" :class="{
                    'text-red-600' : subjectData.jumlah_pertemuan > subjectData.jumlah_kehadiran,
                    'text-emerald-600' : subjectData.jumlah_pertemuan == subjectData.jumlah_kehadiran,
                }">
                    {{ subjectData.jumlah_kehadiran }}
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
                <div class="flex items-center justify-between text-sm" v-for="(presence_data, index) in subjectData.detail_kehadiran">
                    <div>
                        <p class="font-bold">Pertemuan {{ index+1 }}</p>
                        <p>{{ presence_data.tanggal }}</p>
                    </div>
                    <div class="text-emerald-600" v-if="presence_data.hadir === true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="text-red-600" v-else>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <!-- <div class="flex items-center justify-between">
                    <div>
                        <p class="font-bold">Pertemuan 1</p>
                        <p>Senin, 02-02-2022 15.00 - 17.00</p>
                    </div>
                    <div class="text-emerald-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-bold">Pertemuan 2</p>
                        <p>Senin, 09-02-2022 15.00 - 17.00</p>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-bold">Pertemuan 3</p>
                        <p>Senin, 16-02-2022 15.00 - 17.00</p>
                    </div>
                    <div class="text-emerald-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-bold">Pertemuan 4</p>
                        <p>Senin, 23-02-2022 15.00 - 17.00</p>
                    </div>
                    <div class="text-emerald-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-bold">Pertemuan 5</p>
                        <p>Senin, 02-03-2022 15.00 - 17.00</p>
                    </div>
                    <div class="text-emerald-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div> -->
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
        subjectData: Object,
    },
};
</script>
