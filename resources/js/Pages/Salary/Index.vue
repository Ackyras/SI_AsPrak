<template>
    <Authenticated >
        <div class="min-h-screen">
            <p class="px-4 my-3 text-lg text-center md:text-left uppercase tracking-wide text-emerald-600 font-bold">Slip Honor Asisten Praktikum</p>
            
            
            <div class="w-full mb-3">
                <div class="bg-white p-4">
                    <p class="text-base lg:text-lg font-bold text-center text-emerald-500 mb-3">
                        SLIP HONOR : PERIODE SEMESTER 2XXX/2XXX
                    </p>

                    <div class="grid grid-cols-3 gap-2 mb-3">
                        <p class="text-sm lg:text-base block m-0 font-semibold">Nama Asisten</p>
                        <p class="text-sm lg:text-base block m-0 col-span-2">: Ribka Julyasih Sidabutar</p>
                        <p class="text-sm lg:text-base block m-0 font-semibold"><span class="lg:hidden">NIM</span> <span class="hidden lg:block">Nomor Induk Mahasiswa</span></p>
                        <p class="text-sm lg:text-base block m-0 col-span-2">: 1181400125</p>
                        <p class="text-sm lg:text-base block m-0 font-semibold">Mata Kuliah</p>
                        <p class="text-sm lg:text-base block m-0 col-span-2">: ASD, PBO, PWL</p>
                    </div>
                    
                    <div class="overflow-x-auto relative mb-3">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-emerald-700 uppercase bg-emerald-100">
                                <tr>
                                    <th scope="col" class="py-3 px-6 w-2/5">
                                        Nama Mata Kuliah
                                    </th>
                                    <th scope="col" class="py-3 px-6 w-1/5 text-center">
                                        Jumlah Presensi
                                    </th>
                                    <th scope="col" class="py-3 px-6 w-1/5 text-center">
                                        Tarif (RP)
                                    </th>
                                    <th scope="col" class="py-3 px-6 w-1/5 text-center">
                                        Total (RP)
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b">
                                    <th scope="row" class="py-3 px-4 font-medium text-gray-900 whitespace-nowrap">
                                        Algoritma dan Struktur Data
                                    </th>
                                    <td class="py-3 px-4 text-center">
                                        6
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        18000
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        108000
                                    </td>
                                </tr>
                                <tr class="bg-white border-b">
                                    <th scope="row" class="py-3 px-4 font-medium text-gray-900 whitespace-nowrap">
                                        Pemrograman Berorientasi Objek
                                    </th>
                                    <td class="py-3 px-4 text-center">
                                        10
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        18000
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        180000
                                    </td>
                                </tr>
                                <tr class="bg-white border-b">
                                    <th scope="row" class="py-3 px-4 font-medium text-gray-900 whitespace-nowrap">
                                        Pemrograman Web Lanjut
                                    </th>
                                    <td class="py-3 px-4 text-center">
                                        14
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        18000
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        252000
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="flex justify-end">
                        <p class="block w-fit p-2 bg-emerald-50 text-gray-500 text-lg"><span class="mr-4">Total</span>: Rp. 540.000</p>
                    </div>
                </div>
            </div>
            

            <div class="w-full flex justify-end" id="slipHonor">
                <button type="button"
                    class="block py-2 px-3 text-white font-bold bg-emerald-600 hover:bg-emerald-500 uppercase" 
                >
                    CETAK SLIP HONOR
                </button>
            </div>
        </div>
    </Authenticated>
</template>
<script>
import Authenticated from "@/Layouts/Authenticated";
// import html2canvas from "html2canvas";
// import jsPDF from "jsPDF";

export default {
    name: "dashboard-page",
    data(){
        return{
            
        };
    },
    methods: {
        // makePDF(){
        //     window.html2canvas = html2canvas;
        //     var doc = new jsPDF("p","pt","a4");
        //     doc.html(document.querySelector("#slipHonor"), {
        //         callback: function(pdf){
        //             pdf.save("Slip Gaji");
        //         }
        //     });
        // }
    },
    components: {
        Authenticated,
    },
    props: {
        user: Object,
    },
};
</script>
