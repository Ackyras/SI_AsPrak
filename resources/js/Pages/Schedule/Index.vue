<template>
    <Authenticated >
        <div class="min-h-screen">
            <p class="px-4 my-3 text-lg text-center md:text-left uppercase tracking-wide text-emerald-600 font-bold">Jadwal Praktikum Saya</p>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <card-subject-schedule v-for="subject in subjects" :subject-data="subject" />
            </div>
            
        </div>
    </Authenticated>
</template>
<script>
import Authenticated from "@/Layouts/Authenticated";
import CardSubjectSchedule from "@/components/Cards/CardSubjectSchedule.vue";

export default {
    name: "dashboard-page",
    data(){
        return{
            subjects : [
                {
                    name        : "Rekayasa Perangkat Lunak",
                    schedule    : 'Senin, 22:22 - 23:23', 
                    class       : 'RB', 
                    isSelected  : true,
                    id          : 1
                },
                {
                    name        : "Rekayasa Perangkat Keras",
                    schedule    : '',
                    class       : '',
                    isSelected  : false,
                    id          : 2
                },
                {
                    name        : "Rekayasa Manusia",
                    schedules   : 'Rabu, 22:22 - 23:23',
                    class       : 'C',
                    isSelected  : false,
                    id          : 3
                },
            ]
        };
    },
    components: {
        Authenticated,
        CardSubjectSchedule
    },
    props: {
        user: Object,
    },
};
</script>
