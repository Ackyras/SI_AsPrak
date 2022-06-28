<template>
    <nav class="shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-50 py-2 px-6 md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden">
        <div class="px-0 flex flex-wrap items-center justify-between w-full mx-auto md:flex-col md:items-stretch md:min-h-full md:flex-nowrap">
            <!-- SIDEBAR TOGGLER -->
            <button type="button" v-on:click="toggleCollapseShow('bg-white m-2 py-3 px-6')"
                class="cursor-pointer text-black opacity-50 md:hidden px-2 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
            >
                <i class="fas fa-bars"></i>
            </button>

            <!-- LOGO -->
            <button type="button" v-on:click="RedirectToHome"
                class="md:block text-left md:pb-2 text-gray-700 hover:text-green-600 mr-0 inline-block whitespace-nowrap text-lg font-bold pt-2"
            >
                SIAP Terpadu
            </button>

            <!-- USER SECTION -->
            <ul class="md:hidden items-center flex gap-2 list-none">
                <li class="inline-block relative">
                    <notification-dropdown />
                </li>
                <li class="inline-block relative">
                    <user-dropdown />
                </li>
            </ul>

            <!-- SIDEBAR COLLAPSE -->
            <div v-bind:class="collapseShow" 
                class="absolute top-0 left-0 right-0 z-50 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4"
            >
                <!-- SIDEBAR COLLAPSE HEADER -->
                <div class="md:min-w-full md:hidden block mb-4">
                    <div class="flex flex-wrap items-center">
                        <div class="w-6/12">
                            <button type="button" v-on:click="RedirectToHome"
                                class="md:block text-left md:pb-2 text-gray-700 hover:text-green-600 mr-0 inline-block whitespace-nowrap text-lg font-bold p-2"
                            >
                                SIAP Terpadu
                            </button>
                        </div>
                        <div class="w-6/12 flex justify-end">
                            <button type="button" v-on:click="toggleCollapseShow('hidden')"
                                class="cursor-pointer text-black opacity-50 md:hidden px-2 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                            >
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <hr class="mb-4 md:min-w-full" />

                <ul class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4">
                    <li>
                        <Link class="flex gap-2 items-center text-gray-700 hover:text-emerald-500 text-xs md:text-sm uppercase py-3 font-bold block" 
                            :href="route('user.dashboard')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <p>
                                Dashboard
                            </p>
                        </Link>
                    </li>
                    <li>
                        <a class="flex cursor-pointer justify-between items-center text-gray-700 hover:text-emerald-500 text-xs md:text-sm uppercase py-3 font-bold block" 
                            v-on:click="toggleCollapse($event)" ref="btnCollapseRef">
                            <span class="flex gap-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                                </svg>
                                <p>
                                    Ujian Seleksi
                                </p>
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" v-bind:class="{ 'rotate-0': !collapseLink, 'rotate-180': collapseLink, }">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <ul class="flex-col pl-4 bg-emerald-50"
                        v-bind:class="{
                            hidden: !collapseLink,
                            flex: collapseLink,
                        }"
                    >
                        <li>
                            <Link class="flex gap-2 items-center text-gray-700 hover:text-emerald-500 text-xs md:text-sm uppercase py-3 font-bold block" 
                                :href="route('user.dashboard')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                                <p>
                                    Seleksi 1
                                </p>
                            </Link>
                        </li>
                        <li>
                            <Link class="flex gap-2 items-center text-gray-700 hover:text-emerald-500 text-xs md:text-sm uppercase py-3 font-bold block" 
                                :href="route('user.dashboard')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                                <p>
                                    Seleksi 2
                                </p>
                            </Link>
                        </li>
                        <li>
                            <Link class="flex gap-2 items-center text-gray-700 hover:text-emerald-500 text-xs md:text-sm uppercase py-3 font-bold block" 
                                :href="route('user.dashboard')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                                <p>
                                    Seleksi 3
                                </p>
                            </Link>
                        </li>
                    </ul>
                    <li>
                        <Link class="flex gap-2 items-center text-gray-700 hover:text-emerald-500 text-xs md:text-sm uppercase py-3 font-bold block" 
                            :href="route('user.dashboard')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                            </svg>
                            <p>
                                Jadwal Praktikum
                            </p>
                        </Link>
                    </li>
                    <li>
                        <Link class="flex gap-2 items-center text-gray-700 hover:text-emerald-500 text-xs md:text-sm uppercase py-3 font-bold block" 
                            :href="route('user.dashboard')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd" />
                            </svg>
                            <p>
                                Data Presensi Saya
                            </p>
                        </Link>
                    </li>

                    <li class="items-center">
                        <button>
                            Scan Barcode
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
import NotificationDropdown from "@/components/Dropdowns/NotificationDropdown.vue";
import UserDropdown from "@/components/Dropdowns/UserDropdown.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    data() {
        return {
            collapseShow: "hidden",
            collapseLink: false,
        };
    },
    methods: {
        toggleCollapseShow: function (classes) {
            this.collapseShow = classes;
        },
        RedirectToHome: function(){
            window.location.href = "/";
        },
        toggleCollapse: function (event) {
            event.preventDefault();
            this.collapseLink = !this.collapseLink;
        },
    },
    components: {
        NotificationDropdown,
        UserDropdown,
        Link,
    },
};
</script>
