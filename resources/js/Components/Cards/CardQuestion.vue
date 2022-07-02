<template>
    <div class="bg-white rounded drop-shadow p-3 md:p-4 mb-4">
        <!-- ESSAY -->
        <div v-if="questionData.type === 'essay'">
            <label :for="'question_' + questionData.id" class="mb-3">
                {{ questionData.text }}
            </label>
            <textarea
                :name="'question_' + questionData.id"
                :id="'question_' + questionData.id"
                class="h-8"
                required
                :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
            >
            </textarea>
        </div>
        
        <!-- PILGAN -->
        <div v-if="questionData.type === 'pilihan berganda'">
            <p class="mb-3">{{ questionData.text }}</p>
            <div
                v-for="choice in questionData.choices"
                class="mb-2 flex gap-3 items-center"
            >
                <input
                    class="w-5 h-5 text-emerald-600 bg-emerald-50 border-gray-300 focus:ring-emerald-500"
                    type="radio"
                    :value="choice.id"
                    :id="'answer_' + questionData.id + '_' + choice.id"
                    :name="'question_' + questionData.id"
                    v-model="modelValue"
                    @input="$emit('update:modelValue', $event.target.value)"
                    required
                />

                <label :for="'answer_' + questionData.id + '_' + choice.id">
                    {{ choice.text }}
                </label>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "card-exam-status",
    props: {
        questionData : Object,
        modelValue   : String,
    },
    emits: ["update:modelValue"],
};
</script>
