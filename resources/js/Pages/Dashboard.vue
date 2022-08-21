<template>
    <Authenticated :psr_data="user.period_subjects">
        <div class="min-h-screen">
            <p class="text-lg text block w-full m-0 text-emerald-600 tracking-wide py-4 font-semibold">
                Halo,<br>
                {{ user.name }}.<br>
                {{ user.nim }}
            </p>

            <div class="flex items-center p-4 mb-4 bg-amber-100 rounded-lg" role="alert" v-if="notFinishedExam > 0">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-amber-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                <div class="ml-3 text-sm font-medium text-amber-700">
                    Saat ini anda memiliki <span class="font-semibold">{{ notFinishedExam }} Ujian</span> yang belum diselesaikan, pastikan anda selalu memantau informasi pelaksanaan ujian di bagian
                    <Link class="text-amber-800 font-bold hover:text-amber-600" :href="route('user.exam.index')">
                        Ujian Seleksi
                    </Link>.
                </div>
            </div>

            <!-- <p class="text-lg font-bold mb-2">USER</p>
            <pre class="mb-3 border border-black">
                {{ JSON.stringify(user, null, "\t") }}
            </pre> -->
        </div>
    </Authenticated>
</template>
<script>
import Authenticated from "@/Layouts/Authenticated";
import { Link } from "@inertiajs/inertia-vue3";
export default {
    name: "dashboard-page",
    components: {
        Authenticated,
        Link
    },
    props: {
        user: Object,
    },
    // data() {
    //     return {
    //         tblBorder : [false, false, false, true]
    //     };
    // },
    computed: {
        notFinishedExam() {
            let data = 0;
            for (let i=0; i<this.user.period_subjects.length; i++){
                let exam_info = this.user.period_subjects[i].pivot;
                if(exam_info.is_pass_file_selection == 1 && exam_info.is_take_exam_selection == 0){
                    data++;
                }
            }
            return data; 
        },
    },
};
</script>