<template>
    <div class="bg-white p-3 rounded-md drop-shadow">
        <p class="text-base font-semibold text-emerald-500 mb-2">{{ subjectData.name }}</p>
        <p class="text-sm text-gray-400 mb-2" v-if="subjectData.isSelected === false">
            Anda belum memilih jadwal
        </p>
        <p class="text-sm font-bold text-gray-500 mb-2" v-else>
            Jadwal terdaftar : {{ subjectData.class }} - {{ subjectData.schedule }}
        </p>
        
        <form action="">
            <div class="mb-2">
                <select name="" id="" class="w-full text-sm text-gray-600 py-1 px-2 border-none bg-gray-50">
                    <option value="">RA - Senin, 13.00 - 15.00</option>
                    <option value="">RB - Selasa, 13.00 - 15.00</option>
                    <option value="">RC - Rabu, 13.00 - 15.00</option>
                    <option value="">RD - Kamis, 13.00 - 15.00</option>
                </select>
            </div>
            <button type="button" class="py-1 px-2 rounded bg-emerald-400 hover:bg-emerald-500 text-white font-bold text-sm mb-2"
                :class="{
                    'bg-sky-400 hover:bg-sky-500'           : subjectData.isSelected,
                    'bg-emerald-400 hover:bg-emerald-500'   : !subjectData.isSelected
                }">
                {{ subjectData.isSelected ? 'Ajukan Perubahan Jadwal' : 'Ajukan Jadwal Sekarang' }}
            </button>
        </form>
        
        <p class="text-xs italic text-gray-500">
            Note : Admin berhak menyesuaikan jadwal anda.
        </p>
    </div>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
    name: "card-subject-schedule",
    data() {
        return {
            showCollapse : false,
        };
    },
    methods: {
        
    },
    components: {
        Link,
    },
    props: {
        subjectData: Object,
    },
};
</script>
