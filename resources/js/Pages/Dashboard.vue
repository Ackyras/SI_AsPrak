<template>
    <Authenticated>
        <!-- <div class="absolute rounded shadow top-[20px] md:top-[40px] inset-x-[16px] md:inset-x-[240px] bg-white p-6">
            <barcode-scanner/>
        </div> -->
        <div class="min-h-[1000px] border-3 border-purple-500"></div>

    </Authenticated>
</template>
<script>
import CardLineChart from "@/components/Cards/CardLineChart.vue";
import CardBarChart from "@/components/Cards/CardBarChart.vue";
import CardPageVisits from "@/components/Cards/CardPageVisits.vue";
import CardSocialTraffic from "@/components/Cards/CardSocialTraffic.vue";
import Authenticated from "@/Layouts/Authenticated";
import BarcodeScanner from "@/Components/BarcodeScanner/BarcodeScanner.vue"
export default {
    name: "dashboard-page",
    components: {
        CardLineChart,
        CardBarChart,
        CardPageVisits,
        CardSocialTraffic,
        Authenticated,
        BarcodeScanner
    },
};
</script>
