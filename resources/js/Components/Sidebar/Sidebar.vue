<template>
    <nav
        class="relative z-50 flex flex-wrap items-center justify-between px-6 py-2 bg-white drop-shadow md:drop-shadow-none md:w-64 md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden"
    >
        <div
            class="flex flex-wrap items-center justify-between w-full px-0 mx-auto md:flex-col md:items-stretch md:min-h-full md:flex-nowrap"
        >
            <!-- SIDEBAR TOGGLER -->
            <button
                type="button"
                v-on:click="toggleCollapseShow('bg-white m-2 py-3 px-6')"
                class="px-2 py-1 text-xl leading-none text-black bg-transparent border border-transparent border-solid rounded opacity-50 cursor-pointer md:hidden"
            >
                <i class="fas fa-bars"></i>
            </button>

            <!-- LOGO -->
            <button
                type="button"
                v-on:click="RedirectToHome"
                class="flex flex-col justify-center pt-2 mr-0 text-sm font-bold text-left text-gray-700 md:block md:pb-2 hover:text-green-600"
            >
                <span class="block m-0">Laboratorium Multimedia</span>
                <span class="block m-0">Institut Teknologi Sumatera</span>
            </button>

            <!-- USER SECTION -->
            <ul class="flex items-center gap-2 list-none md:hidden">
                <li class="relative inline-block">
                    <user-dropdown />
                </li>
            </ul>

            <!-- SIDEBAR COLLAPSE -->
            <div
                v-bind:class="collapseShow"
                class="absolute top-0 left-0 right-0 z-50 items-center flex-1 h-auto overflow-x-hidden overflow-y-auto rounded md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4"
            >
                <!-- SIDEBAR COLLAPSE HEADER -->
                <div class="block mb-4 md:min-w-full md:hidden">
                    <div class="flex flex-wrap items-center">
                        <div class="w-6/12">
                            <button
                                type="button"
                                v-on:click="RedirectToHome"
                                class="flex flex-col justify-center p-2 mr-0 text-xs font-bold text-left text-gray-700 md:pb-2 hover:text-green-600"
                            >
                                <span class="block m-0">Laboratorium Multimedia</span>
                                <span class="block m-0">Institut Teknologi Sumatera</span>
                            </button>
                        </div>
                        <div class="flex justify-end w-6/12">
                            <button
                                type="button"
                                v-on:click="toggleCollapseShow('hidden')"
                                class="px-2 py-1 text-xl leading-none text-black bg-transparent border border-transparent border-solid rounded opacity-50 cursor-pointer md:hidden"
                            >
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <hr class="mb-4 md:min-w-full" />

                <ul
                    class="flex flex-col list-none md:flex-col md:min-w-full md:mb-4"
                >
                    <!-- DASHBOARD -->
                    <li>
                        <Link
                            class="flex items-center w-full gap-2 px-2 py-2 mb-2 text-xs font-bold text-gray-700 uppercase hover:text-emerald-500 md:text-sm"
                            :href="route('user.dashboard')"
                            :class="{
                                'text-emerald-500':
                                    $page.url.startsWith('/user/dashboard'),
                            }"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 md:w-5 md:h-5"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            <p class="block m-0">Dashboard</p>
                        </Link>
                    </li>
                    <!-- UJIAN SELEKSI -->
                    <li v-if="$page.props.this_period.is_exam_selection_over === 0">
                        <Link
                            class="flex items-center w-full gap-2 px-2 py-2 mb-2 text-xs font-bold text-gray-700 uppercase hover:text-emerald-500 md:text-sm"
                            :href="route('user.exam.index')"
                            :class="{
                                'text-emerald-500':
                                    $page.url.startsWith('/user/ujian-seleksi'),
                            }"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 md:w-5 md:h-5"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                <path
                                    fill-rule="evenodd"
                                    d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            <p class="block m-0">Ujian Seleksi</p>
                        </Link>
                    </li>
                    <!-- JADWAL PRAKTIKUM -->
                    <li v-if="$page.props.this_period.is_exam_selection_over === 1">
                        <Link
                            class="flex items-center w-full gap-2 px-2 py-2 mb-2 text-xs font-bold text-gray-700 uppercase hover:text-emerald-500 md:text-sm"
                            :href="route('user.schedule')"
                            :class="{
                                'text-emerald-500':
                                    $page.url.startsWith('/user/schedule'),
                            }"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 md:w-5 md:h-5"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            <p class="block m-0">Jadwal Praktikum</p>
                        </Link>
                    </li>
                    <!-- DATA PRESENSI -->
                    <li v-if="$page.props.this_period.is_exam_selection_over === 1">
                        <Link
                            class="flex items-center w-full gap-2 px-2 py-2 mb-2 text-xs font-bold text-gray-700 uppercase hover:text-emerald-500 md:text-sm"
                            :href="route('user.presence.index')"
                            :class="{
                                'text-emerald-500':
                                    $page.url.startsWith('/user/presence'),
                            }"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 md:w-5 md:h-5"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            <p class="block m-0">Data Presensi</p>
                        </Link>
                    </li>
                    <!-- DATA HONOR -->
                    <li v-if="$page.props.this_period.is_exam_selection_over === 1">
                        <Link
                            class="flex items-center w-full gap-2 px-2 py-2 mb-2 text-xs font-bold text-gray-700 uppercase hover:text-emerald-500 md:text-sm"
                            :href="route('user.salary.index')"
                            :class="{
                                'text-emerald-500':
                                    $page.url.startsWith('/user/salary'),
                            }"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 md:h-5 md:w-5"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"
                                />
                                <path
                                    fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            <p class="block m-0">Honor Saya</p>
                        </Link>
                    </li>
                    <!-- SCAN QR CODE -->
                    <li v-if="$page.props.this_period.is_exam_selection_over === 1">
                        <button
                            type="button"
                            class="flex gap-2 justify-center items-center text-white bg-emerald-500 text-xs md:text-sm uppercase py-[6px] w-full font-bold hover:bg-emerald-600 drop-shadow-sm rounded"
                            v-on:click="showReader"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-4 h-4 md:w-5 md:h-5"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M3 4a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm2 2V5h1v1H5zM3 13a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1v-3zm2 2v-1h1v1H5zM13 3a1 1 0 00-1 1v3a1 1 0 001 1h3a1 1 0 001-1V4a1 1 0 00-1-1h-3zm1 2v1h1V5h-1z"
                                    clip-rule="evenodd"
                                />
                                <path
                                    d="M11 4a1 1 0 10-2 0v1a1 1 0 002 0V4zM10 7a1 1 0 011 1v1h2a1 1 0 110 2h-3a1 1 0 01-1-1V8a1 1 0 011-1zM16 9a1 1 0 100 2 1 1 0 000-2zM9 13a1 1 0 011-1h1a1 1 0 110 2v2a1 1 0 11-2 0v-3zM7 11a1 1 0 100-2H4a1 1 0 100 2h3zM17 13a1 1 0 01-1 1h-2a1 1 0 110-2h2a1 1 0 011 1zM16 17a1 1 0 100-2h-3a1 1 0 100 2h3z"
                                />
                            </svg>
                            <p class="block m-0">Scan QR Code</p>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ---------------------------------------- -->
    <!-- ---------------------------------------- -->
    <!-- ------------ QR CODE READER ------------ -->
    <!-- ---------------------------------------- -->
    <!-- ---------------------------------------- -->

    <div
        v-if="show_reader"
        class="fixed z-[1000] inset-0 flex items-center justify-center bg-gray-600 bg-opacity-75"
    >
        <!-- <div class="rounded shadow bg-white p-6 absolute inset-x-[1rem] md:inset-x-[5rem] lg:inset-x-[18.75rem] xl:inset-x-[25rem] inset-y-auto"> -->
        <div
            class="rounded shadow bg-white p-6 w-[22.5rem] md:w-[23rem] lg:w-[25rem] xl:w-[27.5rem]"
        >
            <!-- <barcode-scanner/> -->
            <div class="flex items-center justify-between mb-4">
                <p
                    class="text-xl font-bold tracking-wide text-green-600 md:text-2xl"
                >
                    Scan Barcode
                </p>
                <button
                    type="button"
                    class="px-3 py-1 text-xl text-gray-600 border rounded"
                    v-on:click="closeReader"
                >
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="relative w-full aspect-square">
                <div
                    v-if="is_loading"
                    class="absolute z-[1010] inset-0 bg-gray-50 flex items-center justify-center"
                >
                    <img class="animate-spin w-7 h-7" :src="loading" />
                </div>
                <div
                    v-if="is_error"
                    class="absolute inset-0 flex flex-col items-center justify-center gap-2 p-4 bg-gray-50"
                >
                    <!-- <p>{{ error_message }}</p> -->
                    <p class="text-lg font-semibold text-center text-red-500">
                        ERROR!
                    </p>
                    <p class="text-center text-red-500">{{ error_msg }}</p>
                </div>
                <qrcode-stream
                    :camera="camera_status"
                    @decode="onDecode"
                    @init="onInit"
                />
            </div>
        </div>
    </div>
</template>

<script>
import NotificationDropdown from "@/components/Dropdowns/NotificationDropdown.vue";
import UserDropdown from "@/components/Dropdowns/UserDropdown.vue";
import image from "@/assets/img/loading.png";
import {
    QrcodeStream,
    QrcodeDropZone,
    QrcodeCapture,
} from "vue3-qrcode-reader";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import { ref, computed } from "vue";
import { Inertia } from "@inertiajs/inertia";
// import BarcodeScanner from "@/Components/BarcodeScanner/BarcodeScanner.vue"

export default {
    components: {
        NotificationDropdown,
        UserDropdown,
        Link,
        QrcodeStream,
        QrcodeDropZone,
        QrcodeCapture,
    },
    setup() {
        // Sidebar Data
        const collapseShow = ref("hidden");
        const collapseLink = ref(false);

        // QR Reader Data
        const camera_status = ref("auto");
        const show_reader = ref(false);
        const loading = ref(image);
        const is_loading = ref(false);
        const is_error = ref(false);
        const error_msg = ref("");
        const is_success = ref(false);
        const is_failed = ref(false);
        const result = ref("");

        const form = useForm({
            token: null,
        });

        const toggleCollapseShow = (classes) => {
            collapseShow.value = classes;
        };
        const RedirectToHome = () => {
            window.location.href = "/";
        };
        const toggleCollapse = (event) => {
            event.preventDefault();
            collapseLink.value = !collapseLink.value;
        };
        const showReader = () => {
            camera_status.value = "auto";
            show_reader.value = true;
        };
        const closeReader = () => {
            show_reader.value = false;
            is_error.value = false;
            camera_status.value = "off";
        };
        const onDecode = (token) => {
            form.token = token;
            camera_status.value = "off";
            show_reader.value = false;
            Inertia.post(route("user.presence.store"), form);
        };

        const onInit = async (promise) => {
            is_loading.value = true;
            try {
                await promise;
            } catch (error) {
                is_error.value = true;
                if (error.name === "NotAllowedError") {
                    error_msg.value =
                        "Anda harus mengizinkan akses kamera perangkat anda";
                } else if (error.name === "NotFoundError") {
                    error_msg.value =
                        "Tidak ada kamera yang dapat dideteksi pada perangkat anda";
                } else if (error.name === "NotSupportedError") {
                    error_msg.value = "Secure context required";
                } else if (error.name === "NotReadableError") {
                    error_msg.value =
                        "Pastikan kamera anda tidak sedang dgunakan";
                } else if (error.name === "OverconstrainedError") {
                    error_msg.value =
                        "Kamera anda tidak mendukung untuk melakukan pemindaian";
                } else if (error.name === "StreamApiNotSupportedError") {
                    error_msg.value =
                        "Browser anda tidak mendukung untuk melakukan pemindaian";
                } else if (error.name === "InsecureContextError") {
                    error_msg.value =
                        "ERROR: Camera access is only permitted in secure context. Use HTTPS or localhost rather than HTTP";
                } else {
                    error_msg.value = `ERROR: Camera error (${error.name})`;
                }
            } finally {
                is_loading.value = false;
            }
        };

        return {
            collapseShow,
            collapseLink,
            camera_status,
            show_reader,
            loading,
            is_loading,
            is_error,
            error_msg,
            is_success,
            is_failed,
            result,
            toggleCollapseShow,
            RedirectToHome,
            toggleCollapse,
            showReader,
            closeReader,
            onDecode,
            onInit,
        };
    },
};
</script>
