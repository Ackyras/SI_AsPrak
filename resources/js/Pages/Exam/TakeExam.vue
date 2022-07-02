<template>
    <Authenticated :psr_data="user.period_subjects">
        <div class="min-h-[100vh-8.25rem-2px] md:min-h-[100vh-8.75rem]">
            <p class="px-4 my-3 text-lg text-center md:text-left uppercase tracking-wide text-emerald-600 font-bold">
                Ujian {{ period_subject.subject.name }}
            </p>

            <div class="mb-4 md:px-4 lg:px-[8rem]">
                <form @submit.prevent="submit">
                    <div class="flex gap-2">
                        <div>
                            <p>ID Pertanyaan</p>
                            <p v-for="(id, index) in form.questions">{{ index+1 }}. {{ id }}</p>
                            <!-- <p>Avatar</p> -->
                        </div>
                        <div>
                            <p>Jawaban Saat ini</p>
                            <p v-for="(answer, index) in form.answers">{{ index+1 }}. {{ answer }}</p>
                            <!-- <p>{{ form.avatar }}</p> -->
                        </div>
                    </div>

                    <!-- <input type="file" @input="form.avatar = $event.target.files[0]" />
                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                        {{ form.progress.percentage }}%
                    </progress> -->

                    <card-question v-for="(question, index) in db_questions" :question-data="question" v-model="form.answers[index]" />

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
import { useForm } from "@inertiajs/inertia-vue3";
import { ref, computed, } from "vue";
import { Inertia } from '@inertiajs/inertia';

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
    setup(props) {
        const db_questions = ref(props.period_subject.questions);

        const question_id_arr = ref([]);

        const form_fields = computed (() => {
            let answer_arr = [];
            db_questions.value.forEach((question,index) => {
                answer_arr[index] = null;
                question_id_arr.value[index] = question['id'];
            });
            return answer_arr;
        })

        const form = useForm({
            questions   : question_id_arr.value,
            answers     : form_fields.value,
            // avatar      : null,
        });

        const submit = () =>  {
            Inertia.post(route('user.take-exam.store-all', props.period_subject), form);
        }

        return {db_questions, question_id_arr, form_fields, form, submit};
    }
};
</script>
