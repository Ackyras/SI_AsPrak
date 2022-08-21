<template>
    <Authenticated>
        <div class="min-h-[100vh-8.25rem-2px] md:min-h-[100vh-8.75rem]">

            <div class="flex lg:hidden bg-gray-200 sticky top-0 left-0 w-full z-[11] items-center justify-between p-2 rounded-b">
                <div class="w-3/5 flex gap-2 overflow-x-auto custom-scrollbar pb-1">
                    <p v-for="(answer, index) in form.answers"
                        class="block py-1 text-sm px-2 rounded"
                        :class="{
                            'bg-white text-emerald-600' : answer === null,
                            'bg-emerald-600 text-white' : answer !== null,
                        }" :key="'answerBtn_'+index">
                        {{ index + 1 }}
                    </p>
                </div>

                <div class="flex gap-2">
                    <div class="p-1 text-center text-sm font-semibold bg-white rounded drop-shadow text-gray-500">
                        {{ hours }} : {{ minutes % 60 }} : {{ seconds % 60 }}
                    </div>
                </div>
            </div>

            <div class="hidden lg:flex bg-gray-200 sticky top-[4rem] left-0 w-full z-[11] items-center justify-between p-2 rounded-b">
                <div class="w-3/5 flex gap-2 overflow-x-auto custom-scrollbar pb-1">
                    <p v-for="(answer, index) in form.answers"
                        class="block py-1 text-sm px-2 rounded"
                        :class="{
                            'bg-white text-emerald-600' : answer === null,
                            'bg-emerald-600 text-white' : answer !== null,
                        }" :key="'answer_btn_'+index">
                        {{ index + 1 }}
                    </p>
                </div>

                <div class="flex gap-2">
                    <div class="p-1 text-center text-sm font-semibold bg-white rounded drop-shadow text-gray-500">
                        {{ hours }} : {{ minutes % 60 }} : {{ seconds % 60 }}
                    </div>
                </div>
            </div>

            <p class="px-4 my-3 text-lg text-center md:text-left uppercase tracking-wide text-emerald-600 font-bold">
                Ujian {{ period_subject.subject.name }}
            </p>

            <div class="mb-4 w-full md:w-3/4 lg:w-2/3 xl:1/2 mx-auto">
                <form @submit.prevent="submit">
                    <div class="bg-white rounded drop-shadow p-3 md:p-4 mb-4" v-for="(question, index) in db_questions"
                        :key="index">
                        <!-- ESSAY -->
                        <div v-if="question.type === 'essay'" :id="'questionContainer_' + index">
                            <p class="mb-3 text-emerald-600 font-semibold">
                                Soal {{ index + 1 }}. <span class="text-gray-500 uppercase font-medium">({{ question.type
                                }})</span>
                            </p>
                            <div class="w-full lg:w-2/3 lg:m-auto mb-3 border p-4" v-if="question.image">
                                <img :src="'/storage/'+question.image" alt="" class="w-full h-auto">
                            </div>
                            <p class="mb-3">
                                {{ question.text }}
                            </p>
                            <input type="file" :name="'answer_' + index" :id="'answer_' + index"
                                @input="validateFile($event, index)"
                                class="block w-full text-xs text-emerald-700 bg-emerald-50 rounded border border-gray-300 cursor-pointer focus:outline-none" />
                        </div>
                        <!-- PILIHAN BERGANDA -->
                        <div v-if="question.type === 'pilihan berganda'" :id="'questionContainer_' + index">
                            <p class="mb-3 text-emerald-600 font-semibold">
                                Soal {{ index + 1 }}. <span class="text-gray-500 uppercase font-medium">({{ question.type
                                }})</span>
                            </p>
                            <div class="w-full lg:w-2/3 lg:m-auto mb-3 border p-4" v-if="question.image">
                                <img :src="'/storage/'+question.image" alt="" class="w-full h-auto">
                            </div>
                            <p class="mb-3">{{ question.text }}</p>
                            <div v-for="choice in question.choices" class="mb-2 w-full flex gap-3 items-start" :key="'choice_'+choice.id">
                                <input
                                    class="w-5 h-5 text-emerald-600 bg-emerald-50 border-gray-300 focus:ring-emerald-500"
                                    type="radio" :value="choice.id" :id="'answer_' + question.id + '_' + choice.id " 
                                    :name="'question_' + question.id" @input="choiceSelected($event, index)" />

                                <label :for=" 'answer_' + question.id + '_' +  choice.id  ">
                                    <div class="w-full lg:w-2/3 mb-2 border p-4" v-if="choice.image">
                                        <img :src="'/storage/'+choice.image" alt="" class="w-full h-auto">
                                    </div>
                                    {{ choice.text }}
                                </label>
                            </div>
                        </div>

                        <p class="mt-2 text-xs flex gap-2 text-red-600" v-if="question_errors_stat[index]">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <span>{{ question_errors_mssg[index] }}</span>
                        </p>
                    </div>

                    <button type="button" v-on:click="showModal"
                        class="block bg-emerald-600 hover:bg-emerald-500 text-white text-base font-bold tracking-wide uppercase py-1 px-2 rounded">
                        SUBMIT
                    </button>

                    <div v-if="show_modal" class="fixed z-[1000] inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
                        <div class="bg-white p-6 w-[22.5rem] md:w-[23rem] lg:w-[25rem] xl:w-[27.5rem]">
                            <div class="w-full flex items-center justify-between mb-4">
                                <p class="text-xl font-bold tracking-wide text-green-600 md:text-2xl">
                                    Akhiri Ujian
                                </p>
                                <button type="button" class="px-3 py-1 text-xl text-gray-600 border rounded" v-on:click="closeModal">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="w-full">
                                <div class="w-fit m-auto mb-4 text-yellow-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-28 w-28" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="w-full mb-4 text-center">
                                    <p class="text-base font-semibold text-gray-600 block m-0 mb-2">Anda yakin untuk menyimpan jawaban anda?</p>
                                </div>

                                <div class="flex justify-between items-center">
                                    <button type="button" v-on:click="closeModal" class="py-1 w-36 text-center rounded text-white font-bold text-sm mb-2 bg-gray-400">
                                        Kembali
                                    </button>
                                    <button type="submit" class="py-1 w-36 text-center rounded text-white font-bold text-sm mb-2 bg-emerald-600">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </Authenticated>
</template>
<script>
import Authenticated from "@/Layouts/Authenticated";
import CardQuestion from "@/Components/Cards/CardQuestion.vue";
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

        const show_modal = ref(false);

        const showModal = () => {
            show_modal.value = true;
        };
        const closeModal = () => {
            show_modal.value = false;
        };

        const question_errors_stat = ref([]);
        const question_errors_mssg = ref([]);

        const days = ref(0);
        const hours = ref(0);
        const minutes = ref(0);
        const seconds = ref(0);

        const deadline = new Date(props.period_subject.exam_end);
        setInterval(() => {
            const currTime = new Date();
            const timeLeft = deadline - currTime;
            seconds.value = parseInt(timeLeft / 1000);
            minutes.value = parseInt(seconds.value / 60);
            hours.value = parseInt(minutes.value / 60);
            days.value = parseInt(hours.value / 24);
        }, 1000);

        const form_fields = computed(() => {
            let answer_arr = [];
            db_questions.value.forEach((question, index) => {
                answer_arr[index] = null;
                question_id_arr.value[index] = question["id"];
                question_errors_stat.value[index] = false;
                question_errors_mssg.value[index] = "";
            });
            return answer_arr;
        });

        const form = useForm({
            questions: question_id_arr.value,
            answers: form_fields.value,
        });

        const validateFile = (event, index) => {
            question_errors_stat.value[index] = false;
            question_errors_mssg.value[index] = "";
            let allowed_type = [
                "image/png",
                "image/jpg",
                "image/jpeg",
                "application/pdf",
            ];
            let file = event.target.files[0];
            if (file) {
                let file_type = file.type;
                let file_size = file.size;
                if (allowed_type.includes(file_type)) {
                    if (file_size < 2097152) {
                        form.answers[index] = file;
                    } else {
                        event.target.value = null;
                        form.answers[index] = null;
                        question_errors_mssg.value[index] =
                            "Ukuran maksimal file 2MB";
                        question_errors_stat.value[index] = true;
                    }
                } else {
                    event.target.value = null;
                    form.answers[index] = null;
                    question_errors_mssg.value[index] =
                        "Pilih file JPG, JPEG, PNG, atau PDF";
                    question_errors_stat.value[index] = true;
                }
            }
        };

        const choiceSelected = (event, index) => {
            question_errors_stat.value[index] = false;
            question_errors_mssg.value[index] = "";
            form.answers[index] = event.target.value;
        };

        const submit = () => {
            // let null_answers = [];
            // for (let i = 0; i < db_questions.value.length; i++) {
            //     question_errors_mssg.value[i] = "";
            //     question_errors_stat.value[i] = false;
            //     if (form.answers[i] == null) {
            //         null_answers.push(i);
            //     }
            // }

            // if (null_answers.length > 0) {
            //     null_answers.forEach((element) => {
            //         question_errors_mssg.value[element] =
            //             "Jawaban tidak boleh kosong";
            //         question_errors_stat.value[element] = true;
            //     });
            // } else {
                Inertia.post(
                    route("user.take-exam.store-all", {
                        period_subject: props.period_subject.id,
                    }),
                    form
                );
            // }
        };
        return {
            db_questions,
            question_id_arr,
            question_errors_stat,
            question_errors_mssg,
            form_fields,
            form,
            submit,
            validateFile,
            choiceSelected,
            days,
            hours,
            minutes,
            seconds,
            show_modal,
            showModal,
            closeModal
        };
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