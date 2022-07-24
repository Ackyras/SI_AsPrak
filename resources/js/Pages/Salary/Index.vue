<template>
    <Authenticated >
        <div class="min-h-screen">
            <p class="px-4 my-3 text-lg text-center md:text-left uppercase tracking-wide text-emerald-600 font-bold">Slip Honor Asisten Praktikum</p>
        
            <div style="width:100%; margin-bottom: 0.75rem;" id="mainContent">
                <div style="background-color:white; padding:4px;" class="bg-white p-4">
                    <p style="font-size: 1rem; line-height: 1.5rem; font-weight: 700; text-align: center; margin-bottom: 0.75rem; color:#059669;">
                        SLIP HONOR : PERIODE SEMESTER 2XXX/2XXX
                    </p>

                <div style="display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:0.5rem; margin-bottom: 0.75rem; font-size: 0.875rem; line-height: 1.25rem;">
                    <p style="display:block; margin:0; font-weight: 600;">
                        Nama Asisten
                    </p>
                    <p style="display:block; margin:0; grid-column: span 2 / span 2;">
                        : Markus Togi Fedrian Rivaldi Sinaga
                    </p>
                    <p style="display:block; margin:0; font-weight: 600;">
                        Nomor Induk Mahasiswa
                    </p>
                    <p style="display:block; margin:0; grid-column: span 2 / span 2;">
                        : 118140037
                    </p>
                    <p style="display:block; margin:0; font-weight: 600;">
                        Mata Kuliah
                    </p>
                    <p style="display:block; margin:0; grid-column: span 2 / span 2;">
                        : ASD, PBO, PWL
                    </p>
                </div>
                                    
                <div style="position:relative; margin-bottom:0.75rem;">
                    <table style="width:100%; font-size: 0.875rem; line-height: 1.25rem; text-align:left; color:#6b7280;">
                        <thead style="font-size: 0.75rem; line-height: 1rem; color:#047857; background-color:#d1fae5 !important; -webkit-print-color-adjust: exact;  text-transform: uppercase;">
                            <tr>
                                <th style="padding-top:0.75rem; padding-bottom:0.75rem; padding-left:1.5rem; padding-right:1.5rem; width:40%;" scope="col" class="py-3 px-6 w-2/5"> Nama Mata Kuliah </th>
                                <th scope="col" style="padding-top:0.75rem; padding-bottom:0.75rem; padding-left:1.5rem; padding-right:1.5rem; width:20%; text-align:center;"> Jumlah Presensi </th>
                                <th scope="col" style="padding-top:0.75rem; padding-bottom:0.75rem; padding-left:1.5rem; padding-right:1.5rem; width:20%; text-align:center;"> Tarif (RP) </th>
                                <th scope="col" style="padding-top:0.75rem; padding-bottom:0.75rem; padding-left:1.5rem; padding-right:1.5rem; width:20%; text-align:center;"> Total (RP) </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-style:solid; border-bottom-width:1px; border-color:rgb(229 231 235) !important;">
                                <th scope="row" style="padding-top:0.75rem; padding-bottom:0.75rem; padding-left:1rem; padding-right:1rem; font-weight: 500; color:#111827; white-space: nowrap;">
                                    Algoritma dan Struktur Data
                                </th>
                                <td style="padding-top:0.75rem; padding-bottom:0.75rem; padding-left:1rem; padding-right:1rem; text-align:center;"> 6 </td>
                                <td style="padding-top:0.75rem; padding-bottom:0.75rem; padding-left:1rem; padding-right:1rem; text-align:center;"> 18000 </td>
                                <td style="padding-top:0.75rem; padding-bottom:0.75rem; padding-left:1rem; padding-right:1rem; text-align:center;"> 108000 </td>
                            </tr>
                            <tr style="border-style:solid; border-bottom-width:1px; border-color:rgb(229 231 235) !important;">
                                <th scope="row" style="padding-top:0.75rem; padding-bottom:0.75rem; padding-left:1rem; padding-right:1rem; font-weight: 500; color:#111827; white-space: nowrap;">
                                    Pemrograman Berorientasi Objek
                                </th>
                                <td style="padding-top:0.75rem; padding-bottom:0.75rem; padding-left:1rem; padding-right:1rem; text-align:center;"> 10 </td>
                                <td style="padding-top:0.75rem; padding-bottom:0.75rem; padding-left:1rem; padding-right:1rem; text-align:center;"> 18000 </td>
                                <td style="padding-top:0.75rem; padding-bottom:0.75rem; padding-left:1rem; padding-right:1rem; text-align:center;"> 180000 </td>
                            </tr>
                            <tr style="border-style:solid; border-bottom-width:1px; border-color:rgb(229 231 235) !important;">
                                <th scope="row" style="padding-top:0.75rem; padding-bottom:0.75rem; padding-left:1rem; padding-right:1rem; font-weight: 500; color:#111827; white-space: nowrap;"> 
                                    Pemrograman Web Lanjut 
                                </th>
                                <td style="padding-top:0.75rem; padding-bottom:0.75rem; padding-left:1rem; padding-right:1rem; text-align:center;"> 14 </td>
                                <td style="padding-top:0.75rem; padding-bottom:0.75rem; padding-left:1rem; padding-right:1rem; text-align:center;"> 18000 </td>
                                <td style="padding-top:0.75rem; padding-bottom:0.75rem; padding-left:1rem; padding-right:1rem; text-align:center;"> 252000 </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div style="display:flex; justify-content:flex-end; width:100%;">
                    <p style="display:block; width:fit-content; padding:0.5rem; background-color:#ecfdf5 !important; -webkit-print-color-adjust: exact;  color:#10b981; font-size: 1.125rem; line-height: 1.75rem;">
                    <span style="margin-right:1rem;"> Total</span>: Rp. 540.000
                    </p>
                </div>
                </div>
                </div>
            <div class="w-full mb-3" ref="mainContent">
                <div class="bg-white p-4">
                    <p class="text-base lg:text-lg font-bold text-center text-emerald-500 mb-3">
                        SLIP HONOR : PERIODE SEMESTER 2XXX/2XXX
                    </p>

                    <div class="grid grid-cols-3 gap-2 mb-3">
                        <p class="text-sm lg:text-base block m-0 font-semibold">Nama Asisten</p>
                        <p class="text-sm lg:text-base block m-0 col-span-2">: {{ user.name }}</p>
                        <p class="text-sm lg:text-base block m-0 font-semibold"><span class="lg:hidden">NIM</span> <span class="hidden lg:block">Nomor Induk Mahasiswa</span></p>
                        <p class="text-sm lg:text-base block m-0 col-span-2">: {{ user.nim }}</p>
                        <p class="text-sm lg:text-base block m-0 font-semibold">Mata Kuliah</p>
                        <p class="text-sm lg:text-base block m-0 col-span-2">: ASD, PBO, PWL</p>
                    </div>
                    
                    <div class="overflow-x-auto relative mb-3">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-emerald-700 uppercase bg-emerald-100">
                                <tr>
                                    <th scope="col" class="py-3 px-6 w-2/5"> Nama Mata Kuliah </th>
                                    <th scope="col" class="py-3 px-6 w-1/5 text-center"> Jumlah Presensi </th>
                                    <th scope="col" class="py-3 px-6 w-1/5 text-center"> Tarif (RP) </th>
                                    <th scope="col" class="py-3 px-6 w-1/5 text-center"> Total (RP) </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b">
                                    <th scope="row" class="py-3 px-4 font-medium text-gray-900 whitespace-nowrap"> Algoritma dan Struktur Data </th>
                                    <td class="py-3 px-4 text-center"> 6 </td>
                                    <td class="py-3 px-4 text-center"> 18000 </td>
                                    <td class="py-3 px-4 text-center"> 108000 </td>
                                </tr>
                                <tr class="bg-white border-b">
                                    <th scope="row" class="py-3 px-4 font-medium text-gray-900 whitespace-nowrap"> Pemrograman Berorientasi Objek </th>
                                    <td class="py-3 px-4 text-center"> 10 </td>
                                    <td class="py-3 px-4 text-center"> 18000 </td>
                                    <td class="py-3 px-4 text-center"> 180000 </td>
                                </tr>
                                <tr class="bg-white border-b">
                                    <th scope="row" class="py-3 px-4 font-medium text-gray-900 whitespace-nowrap"> Pemrograman Web Lanjut </th>
                                    <td class="py-3 px-4 text-center"> 14 </td>
                                    <td class="py-3 px-4 text-center"> 18000 </td>
                                    <td class="py-3 px-4 text-center"> 252000 </td>
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
                <button type="button" v-on:click="printPdf"
                    class="block py-2 px-3 text-white font-bold bg-emerald-600 hover:bg-emerald-500 uppercase">
                    CETAK SLIP HONOR
                </button>
            </div>
            
            <p class="text-lg font-bold mb-2">USER</p>
            <pre class="mb-3 border border-black">{{ JSON.stringify(user, null, '\t') }}</pre>
            
            <p class="text-lg font-bold mb-2">REGISTRAR</p>
            <pre class="mb-3 border border-black">{{ JSON.stringify(registrar, null, '\t') }}</pre>
        </div>
    </Authenticated>
</template>
<script>
import Authenticated from "@/Layouts/Authenticated";

export default {
    name: "dashboard-page",
    data(){
        return{
            
        };
    },
    methods: {
        printPdf () {
            let content = this.$refs.mainContent;
            console.log(content);
        }
    },
    components: {
        Authenticated,
    },
    props: {
        user: Object,
        registrar: Object,
    },
};
</script>
