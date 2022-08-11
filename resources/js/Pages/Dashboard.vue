<template>
    <Authenticated :psr_data="user.period_subjects">
        <div class="min-h-screen">
            <p class="text-lg text block w-full m-0 text-emerald-600 tracking-wide py-4 font-semibold">Halo, {{ user.name }}.</p>
        </div>
    </Authenticated>
</template>
<script>
import Authenticated from "@/Layouts/Authenticated";
export default {
    name: "dashboard-page",
    components: {
        Authenticated,
    },
    props: {
        user: Object,
    },
};
</script>