<template>
    <nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-50 py-4 px-6"
    >
        <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
            <!-- Toggler -->
            <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                type="button"
                v-on:click="toggleCollapseShow('bg-white m-2 py-3 px-6')"
            >
                <i class="fas fa-bars"></i>
            </button>
            <!-- Brand -->
            <button
                class="md:block text-left md:pb-2 text-gray-700 hover:text-green-600 mr-0 inline-block whitespace-nowrap text-lg font-bold p-2"
                type="button"
                v-on:click="RedirectToHome"
            >
                SIAP Terpadu
            </button>
            <!-- User -->
            <ul class="md:hidden items-center flex flex-wrap list-none">
                <li class="inline-block relative">
                    <notification-dropdown />
                </li>
                <li class="inline-block relative">
                    <user-dropdown />
                </li>
            </ul>
            <!-- Collapse -->
            <div
                class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 absolute top-0 left-0 right-0 z-50 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded"
                v-bind:class="collapseShow"
            >
                <!-- Collapse header -->
                <div
                    class="md:min-w-full md:hidden block mb-4"
                >
                    <div class="flex flex-wrap">
                        <div class="w-6/12">
                            <button
                                class="md:block text-left md:pb-2 text-gray-700 hover:text-green-600 mr-0 inline-block whitespace-nowrap text-lg font-bold p-2"
                                type="button"
                                v-on:click="RedirectToHome"
                            >
                                SIAP Terpadu
                            </button>
                        </div>
                        <div class="w-6/12 flex justify-end">
                            <button
                                type="button"
                                class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                                v-on:click="toggleCollapseShow('hidden')"
                            >
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <hr class="mb-4 md:min-w-full" />
                <!-- Heading
                <h6
                    class="md:min-w-full text-blueGray-500 text-xs uppercase font-bold block pt-1 pb-4 no-underline"
                >
                    Rekrutmen
                </h6> -->
                <!-- Navigation -->

                <ul
                    class="md:flex-col md:min-w-full flex flex-col list-none md:mb-4"
                >
                    <li class="items-center">
                        <Link href="/" class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block">
                            <i class="fas fa-clipboard-list text-blueGray-300 mr-2 text-sm"></i>
                            Tes Asisten Praktikum
                        </Link>
                    </li>

                    <li class="items-center">
                        <Link href="/" class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block">
                            <i class="fas fa-clock text-blueGray-300 mr-2 text-sm"></i>
                            Jadwal Praktikum
                        </Link>
                    </li>

                    <li class="items-center">
                        <Link href="/" class="text-blueGray-700 hover:text-blueGray-500 text-xs uppercase py-3 font-bold block">
                            <i class="fas fa-table text-blueGray-300 mr-2 text-sm"></i>
                            Data Presensi Saya
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
        };
    },
    methods: {
        toggleCollapseShow: function (classes) {
            this.collapseShow = classes;
        },
        RedirectToHome: function(){
            window.location.href = "/";
        }
    },
    components: {
        NotificationDropdown,
        UserDropdown,
        Link,
    },
};
</script>
