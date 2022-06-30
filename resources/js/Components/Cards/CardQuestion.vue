<template>
    <div class="bg-white rounded drop-shadow p-3 md:p-4 mb-4">
        <div v-if="questionData.type === 'essay'">
            <label :for="'question_'+questionData.id"
            class="mb-3">
                {{ questionData.text }}
            </label>
            <textarea 
                :name="'question_'+questionData.id" 
                :id="'question_'+questionData.id"
                class="h-8"
            >
            </textarea>
            <span :id="'question_'+questionData.id+'_content'" 
                class="textarea block resize-none py-1 md:py-2 px-2 md:px-3 overflow-hidden outline-none text-emerald-800 font-semibold bg-emerald-50 border border-white focus:ring-1 lg:focus:ring-2 focus:border-white focus:ring-emerald-600 focus:ring-opacity-50-emerald-200"
                role="textbox"
                v-on:focusout="editAnswer(questionData.id)"
                contenteditable>
            </span>
        </div>
        <div v-if="questionData.type === 'pilihan berganda'">
            <p class="mb-3">{{ questionData.text }}</p>
            <div class="mb-1 text-left border ">
                <input type="radio" :id="'answer_'+questionData.id+'_1'" :name="'question_'+questionData.id" value="A"
                v-on:change="radioChange($event)">
                <label :for="'answer_'+questionData.id+'_1'" class="flex items-center gap-2 border">
                    <div class="w-5 h-5 flex flex-col items-center justify-center rounded-full border border-gray-600">
                        <div class="w-2 h-2 rounded-full bg-white"></div>
                    </div>
                    <p class="block m-0">
                        Consectetur adipisicing elit. Nemo, fugit
                    </p>
                </label>
            </div>
            <div class="mb-1 text-left border ">
                <input type="radio" :id="'answer_'+questionData.id+'_2'" :name="'question_'+questionData.id" value="B"
                v-on:change="radioChange($event)">
                <label :for="'answer_'+questionData.id+'_2'" class="flex items-center gap-2 border">
                    <div class="w-5 h-5 flex flex-col items-center justify-center rounded-full border border-gray-600">
                        <div class="w-2 h-2 rounded-full bg-white"></div>
                    </div>
                    <p class="block m-0">
                        Tempore! Vero pariatur molestias cupiditate
                    </p>
                </label>
            </div>
            <div class="mb-1 text-left border ">
                <input type="radio" :id="'answer_'+questionData.id+'_3'" :name="'question_'+questionData.id" value="C" 
                v-on:change="radioChange($event)">
                <label :for="'answer_'+questionData.id+'_3'" class="flex items-center gap-2 border">
                    <div class="w-5 h-5 flex flex-col items-center justify-center rounded-full border border-gray-600">
                        <div class="w-2 h-2 rounded-full bg-white"></div>
                    </div>
                    <p class="block m-0">
                        Odit recusandae, vel porro cumque
                    </p>
                </label>
            </div>
            <div class="mb-1 text-left border ">
                <input type="radio" :id="'answer_'+questionData.id+'_4'" :name="'question_'+questionData.id" value="D"
                v-on:change="radioChange($event)">
                <label :for="'answer_'+questionData.id+'_4'" class="flex items-center gap-2 border">
                    <div class="w-5 h-5 flex flex-col items-center justify-center rounded-full border border-white bg-emerald-600">
                        <div class="w-2 h-2 rounded-full bg-white"></div>
                    </div>
                    <p class="block m-0">
                        Est, deserunt in doloremque quam?
                    </p>
                </label>
            </div>
        </div>
    </div>
</template>
<script>
// import { useForm } from "@inertiajs/inertia-vue3";
export default {
    name: "card-exam-status",
    data() {
        return {
            
        };
    },
    methods: {
        editAnswer: function(id){
            let answer  = document.getElementById("question_"+id);
            let text    = document.getElementById("question_"+id+"_content").innerText;
            answer.value = text;
        },
        radioChange: function(event){
            console.log(event.target.value);
        }
    },
    components: {
    },
    props: {
        questionData: Object,
    },
};
</script>
