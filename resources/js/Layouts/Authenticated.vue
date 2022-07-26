<template>
    <div :class="{
        'bg-slate-50': $page.url.startsWith('/ujian-seleksi'),
    }">
        <sidebar />
        <div class="relative md:ml-64 bg-blueGray-100">
            <admin-navbar />
            <!-- <header-stats :psr="psr_data" v-if="$page.url === '/dashboard'" /> -->
            <div>
                <div class="px-4 md:px-10 md:pt-16 mx-auto w-full">
                    <!-- WARNING MESSAGE IF NOT PASS EXAM SELECTION YET -->
                    <div class="" v-if="show_exam_warning && $page.url === '/dashboard'">
                        <div class="flex justify-between items-start bg-amber-50 rounded p-2 my-4 drop-shadow">
                            <div class="flex gap-2 items-center w-10/11 md:w-11/12">
                                <span class="text-amber-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <p class="text-sm md:text-base text-gray-600 font-medium">
                                    Saat ini anda login sebagai
                                    <span class="font-semibold">Calon Asisten Praktikum</span>. Segera selesaikan
                                    <span>
                                        <Link :href="'/#'" class="font-semibold text-emerald-600 hover:text-amber-500">
                                        Ujian Seleksi
                                        </Link>
                                    </span>
                                    sebelum batas waktu yang ditentukan!
                                </p>
                            </div>
                            <button type="button" class="block" v-on:click="closeExamWarning">
                                <span class="text-gray-400 hover:text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                    <!-- MESSAGES CONTAINER -->
                    <message-alert v-if="$page.props.flash.alert" :msg-data="$page.props.flash.alert"/>
                    <!-- <div v-if="$page.props.alert"
                        class="my-4 flex justify-between items-center p-2 text-white font-semibold drop-shadow rounded" :class="{
                            'bg-emerald-500': $page.props.alert.status == 'success',
                            'bg-red-500': $page.props.alert.status == 'failed',
                            'hidden': !show_message,
                        }">
                        <div class="w-10/11 text-sm">
                            <p>
                                {{ $page.props.alert.msg }}
                            </p>
                        </div>

                        <button type="button" class="block" v-on:click="closeMessage">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                    </div> -->
                </div>
            </div>

            <div class="w-full px-4 mx-auto md:px-10">
                <!-- :class="{ 'md:mt-[4rem]': $page.url !== '/dashboard', }"> -->
                <slot />
                <footer-admin />
            </div>
        </div>
    </div>
</template>
<script>
import AdminNavbar from "@/components/Navbars/AdminNavbar.vue";
import Sidebar from "@/components/Sidebar/Sidebar.vue";
import HeaderStats from "@/components/Headers/HeaderStats.vue";
import FooterAdmin from "@/components/Footers/FooterAdmin.vue";
import MessageAlert from "@/components/Alerts/MessageAlert.vue";

export default {
    name: "admin-layout",
    data() {
        return {
            show_exam_warning: true,
            show_message: true,
        };
    },
    components: {
        AdminNavbar,
        Sidebar,
        HeaderStats,
        FooterAdmin,
        MessageAlert
    },
    methods: {
        closeExamWarning: function () {
            this.show_exam_warning = false;
        },
        closeMessage: function () {
            this.show_message = false;
        },
    },
    props: {
        psr_data: Object,
    },
};
</script>
