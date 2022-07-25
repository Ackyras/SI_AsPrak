<template>
    <Authenticated >
        <div class="min-h-screen">
            <p class="px-4 my-3 text-lg text-center uppercase tracking-wide text-emerald-600 font-bold">Data Presensi Saya</p>

            <p class="my-3 text-lg text-left uppercase tracking-wide text-emerald-600 font-bold">Presensi Kelas Saya</p>

            <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-3 items-start mb-2" v-for="psr in psrs">
                <!-- <p class="mb-2 text-base lg:col-span-3 text-left tracking-wide text-emerald-600 font-bold">{{ psr.period_subject.subject.name }}</p> -->
                <card-presence-info v-for="classroom in psr.period_subject.classrooms" :classroom-data="classroom" :subject-name="psr.period_subject.subject.name"/>
            </div>

            <p class="my-3 text-lg text-left uppercase tracking-wide text-emerald-600 font-bold">Presensi Luar Kelas Saya</p>

            <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-3 items-start mb-2" v-for="psr in psrs">
                <!-- <p class="mb-2 text-base lg:col-span-3 text-left tracking-wide text-emerald-600 font-bold">{{ psr.period_subject.subject.name }}</p> -->
                <card-presence-info v-for="classroom in psr.period_subject.classrooms" :classroom-data="classroom" :subject-name="psr.period_subject.subject.name"/>
            </div>

            <p class="text-lg font-bold mb-2">PERIOD SUBJECT REGISTRAR</p>
            <pre class="mb-3 border border-black">{{ JSON.stringify(psrs, null, '\t') }}</pre>

        </div>
    </Authenticated>
</template>
<script>
import Authenticated from "@/Layouts/Authenticated";
import CardPresenceInfo from "@/components/Cards/CardPresenceInfo.vue";

export default {
    name: "presence-index",
    data() {
        return {
            subjects : [
                {
                    name : "Rekayasa Perangkat Lunak",
                    jumlah_pertemuan : 5,
                    jumlah_kehadiran : 4,
                    detail_kehadiran : [
                        { tanggal : "Senin, 01-01-2001 11.00 - 13.00", hadir : true },
                        { tanggal : "Senin, 08-01-2001 11.00 - 13.00", hadir : false },
                        { tanggal : "Senin, 15-01-2001 11.00 - 13.00", hadir : true },
                        { tanggal : "Senin, 22-01-2001 11.00 - 13.00", hadir : true },
                        { tanggal : "Senin, 29-01-2001 11.00 - 13.00", hadir : true },
                    ]
                },
                {
                    name : "Peternakan Ikan Lele",
                    jumlah_pertemuan : 4,
                    jumlah_kehadiran : 4,
                    detail_kehadiran : [
                        { tanggal : "Selasa, 02-01-2001 13.00 - 15.00", hadir : true },
                        { tanggal : "Selasa, 09-01-2001 13.00 - 15.00", hadir : true },
                        { tanggal : "Selasa, 16-01-2001 13.00 - 15.00", hadir : true },
                        { tanggal : "Selasa, 23-01-2001 13.00 - 15.00", hadir : true },
                    ]
                },
                {
                    name : "Tinju Bebas Jalanan",
                    jumlah_pertemuan : 12,
                    jumlah_kehadiran : 8,
                    detail_kehadiran : [
                        { tanggal : "Rabu, 03-01-2001 15.00 - 17.00", hadir : true },
                        { tanggal : "Rabu, 10-01-2001 15.00 - 17.00", hadir : true },
                        { tanggal : "Rabu, 17-01-2001 15.00 - 17.00", hadir : true },
                        { tanggal : "Rabu, 24-01-2001 15.00 - 17.00", hadir : true },
                        { tanggal : "Rabu, 31-01-2001 15.00 - 17.00", hadir : true },
                        { tanggal : "Rabu, 07-02-2001 15.00 - 17.00", hadir : true },
                        { tanggal : "Rabu, 14-02-2001 15.00 - 17.00", hadir : true },
                        { tanggal : "Rabu, 21-02-2001 15.00 - 17.00", hadir : true },
                        { tanggal : "Rabu, 28-02-2001 15.00 - 17.00", hadir : false },
                        { tanggal : "Rabu, 07-03-2001 15.00 - 17.00", hadir : false },
                        { tanggal : "Rabu, 14-03-2001 15.00 - 17.00", hadir : false },
                        { tanggal : "Rabu, 21-03-2001 15.00 - 17.00", hadir : false },
                    ]
                },
            ]
        };
    },
    components: {
        CardPresenceInfo,
        Authenticated,
    },
    props: {
        user: Object,
        psrs: Object,
    },
};
</script>
