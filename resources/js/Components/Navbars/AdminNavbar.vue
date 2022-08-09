<template>
    <nav
        class="fixed top-0 left-0 z-10 items-center hidden w-full p-2 bg-emerald-700 md:flex md:flex-row md:flex-nowrap md:justify-start"
    >
        <div
            class="flex flex-wrap items-center justify-end w-full px-4 mx-autp md:flex-nowrap md:px-10"
        >
            <!-- User -->

            <ul class="items-center hidden gap-4 list-none md:flex">
                <li class="relative inline-block">
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
        Link,
    },
};
</script>
