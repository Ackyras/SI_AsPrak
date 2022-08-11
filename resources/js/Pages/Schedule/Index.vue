<template>
    <Authenticated>
        <div class="min-h-screen">
            <p class="px-4 my-3 text-lg text-center md:text-left uppercase tracking-wide text-emerald-600 font-bold">
                Jadwal Praktikum Saya
            </p>
                
            <div v-for="(psr, index) in psrs" class="w-full mb-4" :key="psr.id">
                <div class="w-full flex justify-between items-center mb-2">
                    <p class="block m-0 text-base font-semibold text-emerald-600">
                        {{ psr.period_subject.subject.name }}
                    </p>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 items-start">
                    <card-subject-schedule v-for="schedule in psr.schedules" :schedule-data="schedule" :subject-name="psr.period_subject.subject.name" :psr-id="psr.id" :open-submission="period.is_open_for_schedule_submission" :key="schedule.id"/>
                    <card-add-schedule :subject-data="psr" :open-submission="period.is_open_for_schedule_submission" :current-schedules="schedules_ids[index]" v-if="psr.schedules.length<psr.period_subject.classrooms.length"/>
                </div>
            </div>

            <!-- <p class="text-lg font-bold mb-2">SCHEDULES IDS</p>
            <pre class="mb-3 border border-black">{{ JSON.stringify(schedules_ids, null, '\t') }}</pre>
            <p class="text-lg font-bold mb-2">PERIOD SUBJECT REGISTRAR</p>
            <pre class="mb-3 border border-black">{{ JSON.stringify(psrs, null, '\t') }}</pre>
            <p class="text-lg font-bold mb-2">PERIOD SUBJECT</p>
            <pre class="mb-3 border border-black">{{ JSON.stringify(period_subjects, null, '\t') }}</pre> -->
        </div>
    </Authenticated>
</template>
<script>
import Authenticated from "@/Layouts/Authenticated";
import CardSubjectSchedule from "@/Components/Cards/CardSubjectSchedule.vue";
import CardAddSchedule from "@/Components/Cards/CardAddSchedule.vue";

export default {
    name: "schedule-index",
    props: {
        user: Object,
        period_subjects: Object,
        psrs: Object,
        period: Object,
    },
    data() {
        return {
            allPsrs: this.psrs,
        };
    },
    components: {
        Authenticated,
        CardSubjectSchedule,
        CardAddSchedule,
    },
    computed: {
        schedules_ids() {
            let data = [];
            for (let i=0; i<this.psrs.length; i++){
                let ids = [];
                let schedules = this.psrs[i].schedules;
                for (let j=0; j<schedules.length; j++){
                    ids.push(schedules[j].classroom.id);
                }
                data.push(ids);
            }
            return data; 
        }
    },
    methods:{
        addSchedule(index){
            console.log(this.allPsrs[index]);
        }

    },
};
</script>
