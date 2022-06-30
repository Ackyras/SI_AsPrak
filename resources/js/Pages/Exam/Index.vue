<template>
    <Authenticated :psr_data="user.period_subjects">
        <div class="min-h-[1000px] border-3 border-purple-500">
            <p class="px-4 my-3 text-lg text-center md:text-left uppercase tracking-wide text-emerald-600 font-bold">Semua Ujian Saya</p>
            <!-- SUBJECTS' EXAM STATUS -->
            <div class="grid grid-cols-1 md:grid-cols-3 px-4 gap-4 mb-4">
                <card-exams-info v-for="data in user.period_subjects" :subject-data="data" />
            </div>
        </div>
    </Authenticated>
</template>
<script>
import Authenticated from "@/Layouts/Authenticated";
import CardExamsInfo from "@/components/Cards/CardExamsInfo.vue";

export default {
    name: "dashboard-page",
    components: {
        CardExamsInfo,
        Authenticated,
    },
    props: {
        user: Object,
    },
};
</script>
