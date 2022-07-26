<template>
    <Authenticated>
        <div class="min-h-screen">
            <p class="px-4 my-3 text-lg text-center md:text-left uppercase tracking-wide text-emerald-600 font-bold">
                Jadwal Praktikum Saya
            </p>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 items-start">
                <card-subject-schedule v-for="(subject, key) in psrs" :subject-data="subject" :open-submission="period.is_open_for_schedule_submission"/>
            </div>
            <!-- <p class="text-lg font-bold mb-2">PERIOD SUBJECT REGISTRAR</p>
            <pre class="mb-3 border border-black">{{ JSON.stringify(psrs, null, '\t') }}</pre> -->
            <!-- <p class="text-lg font-bold mb-2">PERIOD SUBJECT</p>
            <pre class="mb-3 border border-black">{{ JSON.stringify(period_subjects, null, '\t') }}</pre> -->
            <!-- <p class="text-lg font-bold mb-2">PERIOD</p>
            <pre class="mb-3 border border-black">{{
                JSON.stringify(period, null, "\t")
            }}</pre> -->
        </div>
    </Authenticated>
</template>
<script>
import Authenticated from "@/Layouts/Authenticated";
import CardSubjectSchedule from "@/components/Cards/CardSubjectSchedule.vue";

export default {
    name: "dashboard-page",
    data() {
        return {
            subjects: [
                {
                    name: "Rekayasa Perangkat Lunak",
                    schedule: "Senin, 22:22 - 23:23",
                    class: "RB",
                    isSelected: true,
                    id: 1,
                },
                {
                    name: "Rekayasa Perangkat Keras",
                    schedule: "",
                    class: "",
                    isSelected: false,
                    id: 2,
                },
                {
                    name: "Rekayasa Manusia",
                    schedules: "Rabu, 22:22 - 23:23",
                    class: "C",
                    isSelected: false,
                    id: 3,
                },
            ],
        };
    },
    components: {
        Authenticated,
        CardSubjectSchedule,
    },
    props: {
        user: Object,
        period_subjects: Object,
        psrs: Object,
        period: Object,
    },
};
</script>
