<template>
    <div class="bg-white rounded drop-shadow pt-3">
        {{
            getStatus(
                subjectData.exam_start,
                subjectData.exam_end,
                subjectData.pivot.is_take_exam_selection
            )
        }}
        <div class="flex justify-between items-center mb-0.5 px-3">
            <!-- SUBJECT 'NAME' & 'EXAM DEADLINE' CONTAINER -->
            <div>
                <!-- SUBJECT NAME -->
                <p class="text-xs font-bold uppercase mb-1" v-bind:class="{
                    'text-red-600': isPastTime,
                    'text-yellow-500': isOpen,
                    'text-emerald-600': isDone,
                    'text-gray-600': isWaiting,
                }">
                    {{ subjectData.subject.name }}
                </p>
                <!-- SUBJECT EXAM DEADLINE -->
                <div class="flex gap-2 items-center">
                    <span class="text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    <p class="text-sm font-semibold text-gray-500">
                        {{ toDateFormat(subjectData.exam_start) }}
                    </p>
                </div>
            </div>
            <!-- 'EXAM STATUS' INDICATOR -->
            <span class="rounded-full bg-red-400 p-[8px] text-white" v-bind:class="{
                block: isPastTime,
                hidden: !isPastTime,
            }">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </span>
            <span class="rounded-full bg-gray-500 p-[8px] text-white" v-bind:class="{
                block: isWaiting,
                hidden: !isWaiting,
            }">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                        clip-rule="evenodd" />
                </svg>
            </span>
            <span class="rounded-full bg-yellow-300 p-[8px] text-white" v-bind:class="{
                block: isOpen,
                hidden: !isOpen,
            }">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                </svg>
            </span>
            <span class="rounded-full bg-emerald-500 p-[8px] text-white" v-bind:class="{
                block: isDone,
                hidden: !isDone,
            }">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </div>
        <div class="flex gap-2 items-center mb-2 px-3">
            <span class="text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                        clip-rule="evenodd" />
                </svg>
            </span>
            <p class="text-sm font-semibold text-gray-500">
                {{ toTimeFormat(subjectData.exam_start) }} - {{ toTimeFormat(subjectData.exam_end) }} WIB
            </p>
        </div>

        <Link :href="route('user.take.exam',subjectData.id)"
            class="flex gap-2 w-full py-2 px-3 border-t-[1px] items-center text-xs text-yellow-500 hover:bg-yellow-50 hover:text-yellow-600 font-thin rounded-b"
            v-bind:class="{
                flex: isOpen,
                hidden: !isOpen,
            }">
            <p>Selesaikan Ujian Sekarang</p>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </Link>

        <div class="gap-2 w-full py-2 px-3 border-t-[1px] items-center text-xs bg-red-50 text-red-600 font-thin rounded-b"
            v-bind:class="{
                flex: isPastTime,
                hidden: !isPastTime,
            }">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </span>
            <p>Waktu Ujian Sudah Terlewat</p>
        </div>

        <div class="gap-2 w-full py-2 px-3 border-t-[1px] items-center text-xs bg-gray-50 text-gray-600 font-thin rounded-b"
            v-bind:class="{
                flex: isWaiting,
                hidden: !isWaiting,
            }">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                </svg>
            </span>
            <p>Ujian akan dibuka pada jadwal yang ditentukan</p>
        </div>

        <div class="gap-2 w-full py-2 px-3 border-t-[1px] items-center text-xs bg-emerald-50 text-emerald-600 font-thin rounded-b"
            v-bind:class="{
                flex: isDone,
                hidden: !isDone,
            }">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                        clip-rule="evenodd" />
                </svg>
            </span>
            <p>Ujian Sudah Diselesaikan</p>
        </div>
        <!-- <p>isDone {{ isDone }}</p>
        <p>isPastTime {{ isPastTime }}</p>
        <p>isOpen {{ isOpen }}</p>
        <p>isWaiting {{ isWaiting }}</p>
        <p>is_take_exam {{ subjectData.pivot.is_take_exam_selection }}</p> -->
    </div>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
    name: "card-exam-status",
    data() {
        return {
            isPastTime: false,
            isOpen: false,
            isDone: false,
            isWaiting: true,
        };
    },
    methods: {
        toDateFormat: function (datetime) {
            let dt = new Date(datetime);

            let date = dt.getDate().toString();
            date.length < 2 && (date = "0" + date);

            let month = (dt.getMonth() + 1).toString();
            month.length < 2 && (month = "0" + month);

            let year = dt.getFullYear().toString();

            return (
                date + "/" + month + "/" + year
            );
        },
        toTimeFormat: function (datetime) {
            let dt = new Date(datetime);

            let hour = dt.getHours().toString();
            hour.length < 2 && (hour = "0" + hour);

            let minute = dt.getMinutes().toString();
            minute.length < 2 && (minute = "0" + minute);

            let second = dt.getSeconds().toString();
            second.length < 2 && (second = "0" + second);

            return ( hour + ":" + minute + ":" + second );
        },
        getStatus: function (start_time, end_time, isTakeExam) {
            let now = new Date();
            let st = new Date(start_time);
            let et = new Date(end_time);

            if (st < now && et > now && isTakeExam == 0) {
                this.isOpen = true;
                this.isWaiting = false;
            } else if (et < now && isTakeExam == 0) {
                this.isPastTime = true;
                this.isWaiting = false;
            } else if (st < now && isTakeExam != 0) {
                this.isDone = true;
                this.isWaiting = false;
            }
        },
    },
    components: {
        Link,
    },
    props: {
        subjectData: Object,
    },
};
</script>
