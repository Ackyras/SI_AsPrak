<template>
    <nav class="fixed bg-emerald-700 top-0 left-0 w-full z-10 md:flex-row md:flex-nowrap md:justify-start hidden md:flex items-center p-2">
        <div class="w-full mx-autp items-center flex justify-end md:flex-nowrap flex-wrap md:px-10 px-4">
            <!-- User -->
            <ul class="hidden items-center md:flex gap-4 list-none">
                <li class="inline-block relative">
                    <notification-dropdown />
                </li>
                <li class="inline-block relative">
                    <user-dropdown />
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
import UserDropdown from "@/components/Dropdowns/UserDropdown.vue";
import NotificationDropdown from "@/components/Dropdowns/NotificationDropdown.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        UserDropdown,
        NotificationDropdown,
        Link
    },
};
</script>
