<template>
    <div
        :class="{
            'bg-slate-50': $page.url.startsWith('/ujian-seleksi'),
        }"
    >
        <sidebar />
        <div class="relative md:ml-64 bg-blueGray-100">
            <admin-navbar />
            <header-stats :psr="psr_data" v-if="$page.url === '/dashboard'" />
            <!-- <alert-info /> -->
            <div
                class="w-full px-4 mx-auto border-red-600 md:px-10 border-3"
                :class="{
                    'md:mt-[4rem]': $page.url !== '/dashboard',
                }"
            >
                <div v-if="$page.props.alert" class="alert">
                    <div
                        v-if="$page.props.alert.status == 'succes'"
                        class="success"
                    >
                        {{ $page.props.alert.msg }}
                    </div>
                    <div
                        v-if="$page.props.alert.status == 'failed'"
                        class="danger"
                    >
                        {{ $page.props.alert.msg }}
                    </div>
                    {{ $page.props.alert.msg }}
                </div>
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
// import AlertInfo from "@/components/AlertInfo.vue";

export default {
    name: "admin-layout",
    components: {
        AdminNavbar,
        Sidebar,
        HeaderStats,
        FooterAdmin,
    },
    props: {
        psr_data: Object,
    },
};
</script>
