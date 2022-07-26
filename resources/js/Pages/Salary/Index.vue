<template>
    <Authenticated>
        <div class="min-h-screen">
            <p
                class="px-4 my-3 text-lg text-center md:text-left uppercase tracking-wide text-emerald-600 font-bold"
            >
                Slip Honor Asisten Praktikum
            </p>

            <div class="w-full mb-3">
                <div class="bg-white p-4">
                    <p
                        class="text-base lg:text-lg font-bold text-center uppercase text-emerald-500 mb-3"
                    >
                        SLIP HONOR : PERIODE {{ period.name }}
                    </p>

                    <div class="grid grid-cols-3 gap-2 mb-3">
                        <p class="text-sm lg:text-base block m-0 font-semibold">
                            Nama Asisten
                        </p>
                        <p class="text-sm lg:text-base block m-0 col-span-2">
                            : {{ user.name }}
                        </p>
                        <p class="text-sm lg:text-base block m-0 font-semibold">
                            <span class="lg:hidden">NIM</span>
                            <span class="hidden lg:block"
                                >Nomor Induk Mahasiswa</span
                            >
                        </p>
                        <p class="text-sm lg:text-base block m-0 col-span-2">
                            : {{ user.nim }}
                        </p>
                        <p class="text-sm lg:text-base block m-0 font-semibold">
                            Mata Kuliah
                        </p>
                        <p class="text-sm lg:text-base block m-0 col-span-2">
                            : {{ concateNames }}
                        </p>
                    </div>

                    <div class="overflow-x-auto relative mb-3">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead
                                class="text-xs text-emerald-700 uppercase bg-emerald-100"
                            >
                                <tr>
                                    <th scope="col" class="py-3 px-6 w-2/5">
                                        Nama Mata Kuliah
                                    </th>
                                    <th
                                        scope="col"
                                        class="py-3 px-6 w-1/5 text-center"
                                    >
                                        Jumlah Presensi
                                    </th>
                                    <th
                                        scope="col"
                                        class="py-3 px-6 w-1/5 text-center"
                                    >
                                        Tarif (RP)
                                    </th>
                                    <th
                                        scope="col"
                                        class="py-3 px-6 w-1/5 text-center"
                                    >
                                        Total (RP)
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    class="bg-white border-b"
                                    v-for="psr in psrs"
                                >
                                    <th
                                        scope="row"
                                        class="py-3 px-4 font-medium text-gray-900 whitespace-nowrap"
                                    >
                                        {{ psr.period_subject.subject.name }}
                                    </th>
                                    <td class="py-3 px-4 text-center">
                                        {{ psr.presences_count }}
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        {{ period.honor }}
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        {{ psr.presences_count * period.honor }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="flex justify-end">
                        <p
                            class="block w-fit p-2 bg-emerald-50 text-gray-500 text-lg"
                        >
                            <span class="mr-4">Total</span>: Rp.
                            {{ totalSalary }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="w-full flex justify-end" id="slipHonor">
                <button
                    type="button"
                    v-on:click="printPdf"
                    class="flex gap-2 items-center text-sm py-2 px-3 text-white font-bold bg-emerald-600 hover:bg-emerald-500 uppercase"
                >
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    <p>CETAK SLIP HONOR</p>
                </button>
            </div>

            <!-- <p class="text-lg font-bold mb-2">USER</p>
            <pre class="mb-3 border border-black">{{
                JSON.stringify(user, null, "\t")
            }}</pre>

            <p class="text-lg font-bold mb-2">PSRS</p>
            <pre class="mb-3 border border-black">{{
                JSON.stringify(psrs, null, "\t")
            }}</pre> -->
        </div>
    </Authenticated>
</template>
<script>
import Authenticated from "@/Layouts/Authenticated";
import pdfMake from "pdfmake/build/pdfmake";
import pdfFonts from "pdfmake/build/vfs_fonts";
pdfMake.vfs = pdfFonts.pdfMake.vfs;

export default {
    name: "dashboard-page",
    data() {
        return {
            tblBorder : [false, false, false, true]
        };
    },
    props: {
        user: Object,
        period: Object,
        psrs: Object,
    },
    computed: {
        totalSalary() {
            let total = 0;
            for (let i = 0; i < this.psrs.length; i++) {
                total += this.psrs[i].presences_count * this.period.honor;
            }
            return total;
        },
        concateNames() {
            let name = "";
            for (let i = 0; i < this.psrs.length; i++) {
                name += this.psrs[i].period_subject.subject.name;
                if (i != this.psrs.length - 1) {
                    name += ", ";
                }
            }
            return name;
        },
        tableBody() {
            let body = [
                [
                    {text: 'Mata Kuliah',       style: 'tableHeader', margin: [8,8], border: this.tblBorder}, 
                    {text: 'Jumlah Presensi',   style: 'tableHeader', margin: [8,8], alignment: 'center', border: this.tblBorder}, 
                    {text: 'Tarif (RP)',        style: 'tableHeader', margin: [8,8], alignment: 'center', border: this.tblBorder},
                    {text: 'Total (RP)',        style: 'tableHeader', margin: [8,8], alignment: 'center', border: this.tblBorder}
                ]
            ];
            for(let i = 0; i < this.psrs.length; i++) {
                let row = [
                    {text: this.psrs[i].period_subject.subject.name, margin: [4,6,0,6], border: this.tblBorder}, 
                    {text: this.psrs[i].presences_count, style: 'tableContent', border: this.tblBorder},
                    {text: this.period.honor, style: 'tableContent', border: this.tblBorder},
                    {text: this.psrs[i].presences_count * this.period.honor, style: 'tableContent', border: this.tblBorder},
                ];
                body.push(row);
            }
            return body;
        }
    },
    methods: {
        printPdf() {
            let docDefinition = {
                info: {
                    title: 'Slip Honor ' + this.period.name,
                },
                content: [
                    {text: 'Slip Honor '+this.period.name, style: 'title'},

                    {
                        style: 'personalInfo',
                        table: {
                            widths: [135, 5, '*'],
                            body: [
                                [
                                    {text: 'Nama Asisten', margin: [0, 5], bold: true}, 
                                    {text: ':', margin: [0, 5]}, 
                                    {text: this.user.name, margin: [0, 5]}
                                ],
                                [
                                    {text: 'Nomor Induk Mahasiswa', margin: [0, 5], bold: true}, 
                                    {text: ':', margin: [0, 5]},
                                    {text: this.user.nim, margin: [0, 5]}
                                ],
                                [
                                    {text: 'Mata Kuliah', margin: [0, 5], bold: true}, 
                                    {text: ':', margin: [0, 5]},
                                    {text: this.concateNames, margin: [0, 5]}
                                ],
                            ],
                        },
                        layout: 'noBorders'
                    },
                    
                    {
                        style: 'tableStyle',
                        table: {
                            headerRows: 1,
                            widths: ['*', 110, 72, 72],
                            body: this.tableBody
                        },
                    },

                    {
                        style: 'tableStyle',
                        table: {
                            headerRows: 1,
                            widths: ['*', 'auto'],
                            body:[
                                [
                                    {text: ' ',},
                                    {text: 'Total : Rp.'+this.totalSalary, style: 'totalSalaryContainer', margin: [5,10,5,10]}
                                ]
                            ]
                        },
                        layout: 'noBorders'
                    },
                    
                ],
                styles: {
                    title: {
                        fontSize: 18,
                        bold: true,
                        margin: [0, 0, 0, 10],
                        alignment: 'center',
                        color: '#059669'
                    },
                    header: {
                        fontSize: 18,
                        bold: true,
                        margin: [0, 0, 0, 10]
                    },
                    tableStyle: {
                        margin: [0, 5, 0, 15]
                    },
                    personalInfo: {
                        margin: [0, 5, 0, 15],
                    },
                    tableHeader: {
                        bold: true,
                        fontSize: 12,
                        color: '#047857',
                        fillColor : '#d1fae5'
                    },
                    totalSalaryContainer: {
                        bold: true,
                        fontSize: 14,
                        color: '#047857',
                        fillColor : '#d1fae5'
                    },
                    tableContent: {
                        alignment: 'center', 
                        margin: [6,6], 
                    }
                },
            };

            const pdf = pdfMake.createPdf(docDefinition)
            pdf.download('Slip Honor Asisten Praktikum.pdf')

        },
    },
    components: {
        Authenticated,
    },
};
</script>
