<template>
  <!-- Header -->
  <div class="bg-emerald-600 md:pt-24 pb-6 pt-6">
    <div class="px-4 md:px-10 mx-auto w-full">
      
      <!-- INFO MESSAGE IF NOT PASS EXAM SELECTION YET -->
      <div class="px-4 mb-4">
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
        <!-- SUBJECT 1 -->
        <div class="bg-white rounded drop-shadow pt-3">
          <div class="flex justify-between items-center mb-3 px-3">
            <!-- SUBJECT 'NAME' & 'EXAM DEADLINE' CONTAINER -->
            <div>
              <!-- SUBJECT NAME -->
              <p class="text-xs font-bold uppercase text-red-600 mb-0.5">Algoritma Struktur Data</p>
              <!-- SUBJECT EXAM DEADLINE -->
              <div class="flex gap-2 items-center">
                <span class="text-gray-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                  </svg>
                </span>
                <p class="text-base font-semibold text-gray-500">22/02/2022</p>
              </div>
            </div>
            <!-- 'IS TAKE EXAM' INDICATOR -->
            <span class="block rounded-full bg-red-400 p-[10px] text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </span>
            <!-- <span class="block rounded-full bg-gray-400 p-[10px] text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
              </svg>
            </span> -->
          </div>
          
          <!-- <Link class="flex gap-2 w-full py-2 px-3 border-t-[1px] items-center text-xs text-emerald-400 hover:bg-emerald-50 hover:text-emerald-600 font-thin rounded-b">
            <p>Lakukan Ujian Sekarang</p>
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </span>
          </Link> -->
          
          <div class="flex gap-2 w-full py-2 px-3 border-t-[1px] items-center text-xs bg-red-50 text-red-600 font-thin rounded-b">
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </span>
            <p>Waktu Ujian Sudah Terlewat</p>
          </div>
        </div>
        
        <!-- SUBJECT 2 -->
        <div class="bg-white rounded drop-shadow pt-3">
          <div class="flex justify-between items-center mb-3 px-3">
            <!-- SUBJECT 'NAME' & 'EXAM DEADLINE' CONTAINER -->
            <div>
              <!-- SUBJECT NAME -->
              <p class="text-xs font-bold uppercase text-yellow-500 mb-0.5">Proyek Teknologi Informasi</p>
              <!-- SUBJECT EXAM DEADLINE -->
              <div class="flex gap-2 items-center">
                <span class="text-gray-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                  </svg>
                </span>
                <p class="text-base font-semibold text-gray-500">22/02/2022</p>
              </div>
            </div>
            <!-- 'IS TAKE EXAM' INDICATOR -->
            <span class="block rounded-full bg-yellow-300 p-[10px] text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
              </svg>
            </span>
          </div>
          
          <Link class="flex gap-2 w-full py-2 px-3 border-t-[1px] items-center text-xs text-yellow-500 hover:bg-yellow-50 hover:text-yellow-600 font-thin rounded-b">
            <p>Selesaikan Ujian Sekarang</p>
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </span>
          </Link>
        </div>

        <!-- SUBJECT 3 -->
        <div class="bg-white rounded drop-shadow pt-3">
          <div class="flex justify-between items-center mb-3 px-3">
            <!-- SUBJECT 'NAME' & 'EXAM DEADLINE' CONTAINER -->
            <div>
              <!-- SUBJECT NAME -->
              <p class="text-xs font-bold uppercase text-emerald-600 mb-0.5">Pemrograman Web Lanjut</p>
              <!-- SUBJECT EXAM DEADLINE -->
              <div class="flex gap-2 items-center">
                <span class="text-gray-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                  </svg>
                </span>
                <p class="text-base font-semibold text-gray-500">22/02/2022</p>
              </div>
            </div>
            <!-- 'IS TAKE EXAM' INDICATOR -->
            <!-- <span class="block rounded-full bg-gray-400 p-[10px] text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
              </svg>
            </span> -->
            <span class="block rounded-full bg-emerald-500 p-[10px] text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
              </svg>
            </span>
          </div>
          
          <!-- <Link class="flex gap-2 w-full py-2 px-3 border-t-[1px] items-center text-xs text-emerald-400 hover:bg-emerald-50 hover:text-emerald-600 font-thin rounded-b">
            <p>Lakukan Ujian Sekarang</p>
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </span>
          </Link> -->
          <div class="flex gap-2 w-full py-2 px-3 border-t-[1px] items-center text-xs bg-emerald-50 text-emerald-600 font-thin rounded-b">
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
              </svg>
            </span>
            <p>Ujian Sudah Diselesaikan</p>
          </div>

        </div>

      </div>

    </div>
  </div>
</template>

<script>
import CardStats from "@/components/Cards/CardStats.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    CardStats,
    Link,
  },
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