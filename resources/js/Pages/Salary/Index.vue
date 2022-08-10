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
                                    v-for="psr in psrs" :key="psr.id"
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
        },
        logoITERA() {
            let image = "data:image/png;base64,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";
            image += "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";
            return image;
        },
        currentDate(){
            let months = [
                "Januari", "Februari", "Maret", "April",
                "Mei", "Juni", "Juli", "Agustus",
                "September", "Oktober", "November", "Desember"
            ];
            const d = new Date();
            let date = d.getDate().toString() + " " + months[d.getMonth()] +" "+ d.getFullYear().toString();
            return date;
        }
    },
    methods: {
        printPdf() {
            let docDefinition = {
                info: {
                    title: 'Slip Honor ' + this.period.name,
                },
                content: [
                    // KOP DOKUMEN
                    {
                        style: 'tableStyle',
                        table: {
                            widths: [90, '*'],
                            body: [
                                [
                                    { 
                                        rowSpan: 6, 
                                        image: this.logoITERA,
                                        width: 86,
                                        margin: [ 0, 10, 0, 0 ],
                                        alignment: 'center',
                                        border: [false, false, false, true]
                                    },
                                    {   
                                        text: 'KEMENTERIAN PENDIDIKAN, KEBUDAYAAN,', 
                                        alignment: 'center', 
                                        fontSize: 14.25,
                                        border: [false, false, false, false]
                                    },
                                ],
                                [
                                    '', 
                                    {   
                                        text: 'RISET, DAN TEKNOLOGI', 
                                        alignment: 'center', 
                                        fontSize: 14.25,
                                        border: [false, false, false, false]
                                    },
                                ],
                                [
                                    '', 
                                    {   
                                        text: 'INSTITUT TEKNOLOGI SUMATERA', 
                                        alignment: 'center',
                                        bold: true,
                                        fontSize: 13,
                                        border: [false, false, false, false]
                                    },
                                ],
                                [
                                    '', 
                                    {   
                                        text: 'Jalan Terusan Ryacudu Way Hui, Kecamatan Jati Agung, Lampung Selatan 35365', 
                                        alignment: 'center',
                                        fontSize: 11,
                                        border: [false, false, false, false]
                                    },
                                ],
                                [
                                    '', 
                                    {   
                                        text: 'Telepon: (0721) 8030188', 
                                        alignment: 'center',
                                        fontSize: 11,
                                        border: [false, false, false, false]
                                    },
                                ],
                                [
                                    '', 
                                    {   
                                        text: 'Email: pusat@itera.ac.id, Website : http://itera.ac.id', 
                                        alignment: 'center',
                                        fontSize: 11,
                                        margin: [ 0, 0, 0, 15 ],
                                        border: [false, false, false, true]
                                    },
                                ],
                            ],
                        },
                    },

                    // JUDUL DOKUMEN
                    {text: 'Slip Honor '+this.period.name, style: 'title'},

                    // DATA ASISTEN PRAKTIKUM
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
                    
                    // DATA HONOR
                    {
                        style: 'tableStyle',
                        table: {
                            headerRows: 1,
                            widths: ['*', 110, 72, 72],
                            body: this.tableBody
                        },
                    },

                    // TOTAL HONOR
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

                    // TANGGAL
                    {
                        style: 'tableStyle',
                        table: {
                            headerRows: 1,
                            widths: ['*', 'auto'],
                            body:[
                                [
                                    {text: ' ',},
                                    {text: 'Lampung Selatan, '+this.currentDate, margin: [0,15,0,5]}
                                ]
                            ]
                        },
                        layout: 'noBorders'
                    },

                    // TANDA TANGAN
                    {
                        style: 'signTableStyle',
                        table: {
                            widths  : [115, '*', 130],
                            heights : [20, 70, 'auto'],
                            body: [
                                [
                                    {text: 'Diterima oleh :', alignment: 'center', border: [false, false, false, false]},
                                    {text: ' ', border: [false, false, false, false]},
                                    {text: 'Disetujui oleh :', alignment: 'center', border: [false, false, false, false]}
                                ],
                                [
                                    {text: ' ', border: [false, false, false, false]},
                                    {text: ' ', border: [false, false, false, false]},
                                    {text: ' ', border: [false, false, false, false]}
                                ],
                                [
                                    {text: 'Asisten Praktikum', alignment: 'center', border: [false, true, false, false]},
                                    {text: ' ', border: [false, false, false, false]},
                                    {text: 'Laboran Laboratorium Multimedia ITERA', alignment: 'center', border: [false, true, false, false]}
                                ],
                            ]
                        }
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
                    signTableStyle: {
                        margin: [0, 10, 0, 0]
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
