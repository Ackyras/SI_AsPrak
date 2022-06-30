<template>
    <div class="bg-white rounded drop-shadow p-3 md:p-4 mb-4">
        <label :for="'question_'+questionData.id"
        class="mb-3">
            {{ questionData.text }}
        </label>
        <div v-if="questionData.type === 'essay'">
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
            pilgan
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
    },
    components: {
    },
    props: {
        questionData: Object,
    },
};
</script>
