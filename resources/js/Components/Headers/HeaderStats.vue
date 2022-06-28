<template>
  <!-- Header -->
  <div class="bg-emerald-600 md:pt-24 pb-6 pt-6">
    <div class="px-4 md:px-10 mx-auto w-full">
      
      <!-- INFO MESSAGE IF NOT PASS EXAM SELECTION YET -->
      <div class="px-4 mb-4"
        v-bind:class="{
            'block'      : isWaiting,
            'hidden'     : !isWaiting,
        }"
      >
        <div class="flex gap-2 items-center bg-amber-100 rounded p-2 drop-shadow">
          <span class="text-amber-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
            </svg>
          </span>
          <p class="text-sm md:text-base text-gray-600 font-medium">
            Saat ini anda login sebagai <span class="font-semibold">Calon Asisten Praktikum</span>.
            Segera selesaikan
            <span>
              <Link :href="'/#'" class="font-semibold text-emerald-600 hover:text-amber-500">
                Ujian Seleksi
              </Link>
            </span> sebelum batas waktu yang ditentukan!
          </p>
        </div>
      </div>
      <!-- SUBJECTS' EXAM STATUS -->
      <div class="grid grid-cols-1 md:grid-cols-3 px-4 gap-4 mb-4">
        <card-exam-status v-for="data in psr" :subject-data="data"/>
      </div>

    </div>
  </div>
</template>

<script>
import CardExamStatus from "@/components/Cards/CardExamStatus.vue";
import CardStats from "@/components/Cards/CardStats.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    CardExamStatus,
    CardStats,
    Link,
  },
  props:{
      psr: Object
  }
};
</script>


<!-- Card stats -->
<!-- <div class="flex flex-wrap">
  <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
    <card-stats
      statSubtitle="TRAFFIC"
      statTitle="350,897"
      statArrow="up"
      statPercent="3.48"
      statPercentColor="text-emerald-500"
      statDescripiron="Since last month"
      statIconName="far fa-chart-bar"
      statIconColor="bg-red-500"
    />
  </div>
  <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
    <card-stats
      statSubtitle="NEW USERS"
      statTitle="2,356"
      statArrow="down"
      statPercent="3.48"
      statPercentColor="text-red-500"
      statDescripiron="Since last week"
      statIconName="fas fa-chart-pie"
      statIconColor="bg-orange-500"
    />
  </div>
  <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
    <card-stats
      statSubtitle="SALES"
      statTitle="924"
      statArrow="down"
      statPercent="1.10"
      statPercentColor="text-orange-500"
      statDescripiron="Since yesterday"
      statIconName="fas fa-users"
      statIconColor="bg-pink-500"
    />
  </div>
  <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
    <card-stats
      statSubtitle="PERFORMANCE"
      statTitle="49,65%"
      statArrow="up"
      statPercent="12"
      statPercentColor="text-emerald-500"
      statDescripiron="Since last month"
      statIconName="fas fa-percent"
      statIconColor="bg-emerald-500"
    />
  </div>
</div> -->