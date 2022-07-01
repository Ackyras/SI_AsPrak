<template>
    <Authenticated :psr_data="user.period_subjects">
        <div class="min-h-screen border-3 border-purple-500">
            <p>{{ user.name }}</p>
            <ul>
                <li v-for="period_subject in user.period_subjects">
                    {{ period_subject.subject.name }}
                </li>
            </ul>
        </div>
    </Authenticated>
</template>
<script>
import Authenticated from "@/Layouts/Authenticated";
// import CardLineChart from "@/components/Cards/CardLineChart.vue";
// import CardBarChart from "@/components/Cards/CardBarChart.vue";
// import CardPageVisits from "@/components/Cards/CardPageVisits.vue";
// import CardSocialTraffic from "@/components/Cards/CardSocialTraffic.vue";
// import BarcodeScanner from "@/Components/BarcodeScanner/BarcodeScanner.vue"
export default {
    name: "dashboard-page",
    components: {
        Authenticated,
        // CardLineChart,
        // CardBarChart,
        // CardPageVisits,
        // CardSocialTraffic,
        // BarcodeScanner
    },
    props: {
        user: Object,
    },
};
</script>
<!-- <div class="absolute rounded shadow top-[20px] md:top-[40px] inset-x-[16px] md:inset-x-[240px] bg-white p-6">
    <barcode-scanner/>
</div> -->
