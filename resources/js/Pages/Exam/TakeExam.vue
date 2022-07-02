<template>
    <Authenticated>
        <div class="min-h-[100vh-8.25rem-2px] md:min-h-[100vh-8.75rem]">
            <p
                class="px-4 my-3 text-lg text-center md:text-left uppercase tracking-wide text-emerald-600 font-bold"
            >
                Ujian {{ period_subject.subject.name }} {{ period_subject.id }}
            </p>

            <div class="mb-4 w-full md:w-3/4 lg:w-2/3 xl:1/2 mx-auto">
                <form @submit.prevent="submit">
                    <div class="flex gap-2">
                        <div>
                            <p>ID Pertanyaan</p>
                            <p v-for="(id, index) in form.questions">
                                {{ index + 1 }}. {{ id }}
                            </p>
                        </div>
                        <div>
                            <p>Jawaban Saat ini</p>
                            <p v-for="(answer, index) in form.answers">
                                {{ index + 1 }}. {{ answer }}
                            </p>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded drop-shadow p-3 md:p-4 mb-4"
                        v-for="(question, index) in db_questions"
                        :key="index"
                    >
                        <!-- ESSAY -->
                        <div v-if="question.type === 'essay'">
                            <p class="mb-3">
                                {{ question.text }}
                            </p>
                            <input
                                type="file"
                                :name="'answer_' + index"
                                :id="'answer_' + index"
                                @input="
                                    form.answers[index] = $event.target.files[0]
                                "
                                class="block w-full text-xs text-emerald-700 bg-emerald-50 rounded border border-gray-300 cursor-pointer focus:outline-none"
                                aria-describedby="file_input_help"
                            />
                            <p
                                class="mt-1 text-xs text-gray-500"
                                id="file_input_help"
                            >
                                JPG, JPEG, PNG, atau PDF (MAX. 2MB).
                            </p>
                        </div>
                        <!-- PILIHAN BERGANDA -->
                        <card-question
                            v-if="question.type === 'pilihan berganda'"
                            :question-data="question"
                            v-model="form.answers[index]"
                        />
                    </div>

                    <button
                        type="submit"
                        class="block bg-emerald-600 hover:bg-emerald-500 text-white text-base font-bold tracking-wide uppercase py-1 px-2 rounded"
                    >
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
import { ref, computed } from "vue";
import { Inertia } from "@inertiajs/inertia";

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

        const form_fields = computed(() => {
            let answer_arr = [];
            db_questions.value.forEach((question, index) => {
                answer_arr[index] = null;
                question_id_arr.value[index] = question["id"];
            });
            return answer_arr;
        });

        const form = useForm({
            questions: question_id_arr.value,
            answers: form_fields.value,
        });

        const submit = () => {
            Inertia.post(
                route("user.take-exam.store-all", props.period_subject.id),
                form
            );
        };

        return { db_questions, question_id_arr, form_fields, form, submit };
    },
};
</script>

<style>
input[type="file"]::file-selector-button,
input[type="file"]::file-selector-button:active,
input[type="file"]::file-selector-button:focus {
    background-color: #059669;
    color: white;
}
input[type="file"]::file-selector-button:hover {
    background-color: #10b981;
    color: white;
}
</style>
