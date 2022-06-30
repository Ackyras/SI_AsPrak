<template>
    <Authenticated :psr_data="user.period_subjects">
        <div class="">
            <p class="px-4 my-3 text-lg text-center md:text-left uppercase tracking-wide text-emerald-600 font-bold">Ujian {{ period_subject.subject.name }}</p>
            
            <div class="mb-4 md:px-4 lg:px-[8rem]">
                <form @submit.prevent="">
                    <card-question v-for="question in period_subject.questions" :question-data="question" />
                    <button type="submit" 
                        class="block bg-emerald-600 hover:bg-emerald-500 text-white text-base font-bold tracking-wide uppercase py-1 px-2 rounded">
                        SUBMIT
                    </button>
                </form>
            </div>

        </div>
    </Authenticated>
</template>
<script>
import Authenticated from "@/Layouts/Authenticated";
import CardQuestion from "@/components/Cards/CardQuestion.vue";

export default {
    name: "dashboard-page",
    components: {
        CardQuestion,
        Authenticated,
    },
    props: {
        user: Object,
        period_subject: Object,
    },
};
</script>
