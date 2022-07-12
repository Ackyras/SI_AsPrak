<template>
    <Authenticated :psr_data="user.period_subjects">
        <div class="min-h-screen border-3 border-purple-500">
            <p>{{ user.name }}</p>
            <ul>
                <!-- <li v-for="period_subject in user.period_subjects">
                    {{ period_subject.subject.name }}
                </li> -->
            </ul>
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