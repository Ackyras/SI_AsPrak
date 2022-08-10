<template>
    <!-- MESSAGES CONTAINER -->
    <div class="my-4 flex justify-between items-center p-2 text-white font-semibold drop-shadow rounded" 
        :class="{
            'bg-emerald-500': msgData.status == 'success',
            'bg-red-500': msgData.status == 'failed',
            'bg-amber-500': msgData.status == 'warning',
            // 'hidden': !show_message,
        }">
        <div class="w-10/11 text-sm">
            <p>
                {{ msgData.msg }}
            </p>
        </div>
    </div>
</template>
<script>

export default {
    name: "admin-layout",
    props: {
        msgData: Object,
    },
    data() {
        return {
            show_message: true,
        };
    },
    methods: {
        closeMessage: function () {
            this.show_message = false;
        },
    },
};
</script>
