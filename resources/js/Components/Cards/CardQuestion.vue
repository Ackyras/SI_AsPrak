<template>
    <div class="bg-white rounded drop-shadow p-3 md:p-4 mb-4">
        <!-- ESSAY -->
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
        <!-- PILGAN -->
        <div v-if="questionData.type === 'pilihan berganda'">
            <p class="mb-3">{{ questionData.text }}</p>
            <div v-for="choice in questionData.choices" class="mb-2 flex gap-3 items-center">
                <input class="w-5 h-5 text-emerald-600 bg-emerald-50 border-gray-300 focus:ring-emerald-500"
                    type="radio"
                    :value="choice.id"
                    :id   = " 'answer_' + questionData.id + '_' + choice.id "
                    :name = " 'question_' + questionData.id "
                    required
                >

                <label :for="'answer_'+questionData.id+'_'+choice.id">
                    {{ choice.text }}
                </label>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "card-exam-status",
    data() {
        return {
            isChecked : false
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
