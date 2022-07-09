<template>
    <!-- Header -->
    <div class="bg-emerald-600 md:pt-24 pb-6 pt-6">
        <div class="px-4 md:px-10 mx-auto w-full">
            <!-- INFO MESSAGE IF NOT PASS EXAM SELECTION YET -->
            <!-- <div class="px-4 mb-4" v-if="show_warning"> -->
            <div class="px-4 mb-4">
                <div class="flex gap-2 items-center bg-amber-50 rounded p-2 drop-shadow">
                    <span class="text-amber-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    <p class="text-sm md:text-base text-gray-600 font-medium">
                        Saat ini anda login sebagai
                        <span class="font-semibold">Calon Asisten Praktikum</span>. Segera selesaikan
                        <span>
                            <Link :href="'/#'" class="font-semibold text-emerald-600 hover:text-amber-500">
                            Ujian Seleksi
                            </Link>
                        </span>
                        sebelum batas waktu yang ditentukan!
                    </p>
                </div>
            </div>
            <!-- SUBJECTS' EXAM STATUS -->
            <!-- <div class="grid grid-cols-1 md:grid-cols-3 px-4 gap-4 mb-4">
                <card-exams-info v-for="data in psr" :subject-data="data" />
            </div> -->
        </div>
    </div>
</template>

<script>
import CardExamsInfo from "@/components/Cards/CardExamsInfo.vue";
import CardStats from "@/components/Cards/CardStats.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    data(){
        return {
            show_warning : true,
        };
    },
    components: {
        CardExamsInfo,
        CardStats,
        Link,
    },
    props: {
        psr: Object,
    },
    methods: {
        closeWarning: function(){
            this.show_warning = false;
        }
    }
};
</script>
