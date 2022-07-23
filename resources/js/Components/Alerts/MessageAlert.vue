<template>
    <!-- MESSAGES CONTAINER -->
    <div class="my-4 flex justify-between items-center p-2 text-white font-semibold drop-shadow rounded" 
        :class="{
            'bg-emerald-500': msgData.status == 'success',
            'bg-red-500': msgData.status == 'failed',
            // 'hidden': !show_message,
        }">
        <div class="w-10/11 text-sm">
            <p>
                {{ msgData.msg }}
            </p>
        </div>

        <!-- <button type="button" class="block" v-on:click="closeMessage">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </button> -->
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
