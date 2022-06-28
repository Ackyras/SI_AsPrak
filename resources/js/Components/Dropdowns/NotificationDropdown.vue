<template>
  <div class="relative">
    <button type="button" class="text-gray-600 md:text-gray-200 focus:text-emerald-600 md:focus:text-white block py-1 px-2" ref="btnDropdownRef" v-on:click="toggleDropdown($event)">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
      </svg>
    </button>
    <div ref="popoverDropdownRef" class="absolute top-full right-0 bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
      v-bind:class="{
        hidden: !dropdownPopoverShow,
        block: dropdownPopoverShow,
      }"
    >
      <a href="javascript:void(0);" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
        Action
      </a>
      <a href="javascript:void(0);" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
        Another action
      </a>
      <a href="javascript:void(0);" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
        Something else here
      </a>
      <hr class="h-0 my-2 border border-solid border-blueGray-100" />
      <a href="javascript:void(0);" class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">
        Seprated link
      </a>
    </div>
  </div>
</template>
<script>
import { createPopper } from "@popperjs/core";

export default {
  data() {
    return {
      dropdownPopoverShow: false,
    };
  },
  methods: {
    toggleDropdown: function (event) {
      event.preventDefault();
      this.dropdownPopoverShow = !this.dropdownPopoverShow;
    },
  },
};
</script>
