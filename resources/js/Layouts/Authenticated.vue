<template>
    <div :class="{ 
        'bg-slate-50': $page.url.startsWith('/ujian-seleksi') 
    }">
        <sidebar />
        <div class="relative md:ml-64 bg-blueGray-100">
            <admin-navbar />
            <header-stats :psr="psr_data" v-if="$page.url === '/dashboard'"/>
            <div class="px-4 md:px-10 mx-auto w-full border-3 border-red-600"
                :class="{ 
                    'md:mt-[4rem]': $page.url !== '/dashboard',
                }"
            >
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
export default {
    name: "admin-layout",
    components: {
        AdminNavbar,
        Sidebar,
        HeaderStats,
        FooterAdmin,
    },
    props:{
        psr_data : Object
    }
};
</script>
