<template>
  <div class="relative">
    <a class="text-blueGray-500 block" href="#pablo" ref="btnDropdownRef" v-on:click="toggleDropdown($event)">
      <div class="items-center flex">
        <span class="w-10 h-10 md:w-12 md:h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full">
          <img alt="..." class="w-full rounded-full align-middle border-none shadow-lg" :src="image"/>
        </span>
      </div>
    </a>
    <div ref="popoverDropdownRef" class="absolute top-full right-0 bg-white text-base z-50 p-2 list-none text-left rounded shadow-lg min-w-48"
      v-bind:class="{
        hidden: !dropdownPopoverShow,
        block: dropdownPopoverShow,
      }"
    >
      <Link href="#" class="text-base py-2 px-2 block font-bold w-full bg-transparent text-gray-600 hover:text-emerald-600 mb-2">
          Profil Saya
      </Link>

      <button @click="logout" class="text-sm py-2 px-4 font-normal w-full flex gap-2 items-center border-[1px] border-red-500 rounded text-red-500 hover:text-white hover:border-white hover:bg-red-500">
        <span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
          </svg>
        </span>
        <p class="">
          Logout
        </p>
      </button>

    </div>
  </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';
import axios from 'axios';

import image from "@/assets/img/team-1-800x800.jpg";

export default {
  components: {Link},
  data() {
    return {
      dropdownPopoverShow: false,
      image: image,
    };
  },
  methods: {
    logout: (event) => {
      event.preventDefault();
      axios.post('/logout')
      .then(data=> window.location.href = "/");
    },
    toggleDropdown: function (event) {
      event.preventDefault();
      this.dropdownPopoverShow = !this.dropdownPopoverShow;
    },
  },
};
</script>
