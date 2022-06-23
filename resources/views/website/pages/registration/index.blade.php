@php
    $subjects = array(
        (object)[
        "id" => 1,
        "name" => "Algoritma Pemrograman 2",
        "number_of_lab_assistant" => 4,
        "exam_start" => "2022/02/15 00:00:00",
        "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
        "id" => 2,
        "name" => "Algoritma Pemrograman 1",
        "number_of_lab_assistant" => 4,
        "exam_start" => "2022/02/15 00:00:00",
        "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
        "id" => 3,
        "name" => "PKS 1",
        "number_of_lab_assistant" => 4,
        "exam_start" => "2022/02/15 00:00:00",
        "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
        "id" => 4,
        "name" => "PKS 2",
        "number_of_lab_assistant" => 4,
        "exam_start" => "2022/02/15 00:00:00",
        "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
        "id" => 5,
        "name" => "Algoritma dan Struktur Data",
        "number_of_lab_assistant" => 4,
        "exam_start" => "2022/02/15 00:00:00",
        "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
        "id" => 6,
        "name" => "Pemrograman Berbasis Objek",
        "number_of_lab_assistant" => 4,
        "exam_start" => "2022/02/15 00:00:00",
        "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
        "id" => 7,
        "name" => "Basis Data",
        "number_of_lab_assistant" => 4,
        "exam_start" => "2022/02/15 00:00:00",
        "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
        "id" => 8,
        "name" => "Manajemen Basis Data",
        "number_of_lab_assistant" => 4,
        "exam_start" => "2022/02/15 00:00:00",
        "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
        "id" => 9,
        "name" => "Dasar Rekayasa Perangkat Lunak",
        "number_of_lab_assistant" => 4,
        "exam_start" => "2022/02/15 00:00:00",
        "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
        "id" => 10,
        "name" => "Rekayasa Perangkat Lunak",
        "number_of_lab_assistant" => 4,
        "exam_start" => "2022/02/15 00:00:00",
        "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
        "id" => 11,
        "name" => "Manajemen Proyek Teknologi Informasi",
        "number_of_lab_assistant" => 4,
        "exam_start" => "2022/02/15 00:00:00",
        "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
        "id" => 12,
        "name" => "Proyek Teknologi Informasi",
        "number_of_lab_assistant" => 4,
        "exam_start" => "2022/02/15 00:00:00",
        "exam_end" => "2022/02/22 23:59:00",
        ],
        (object)[
        "id" => 13,
        "name" => "Interaksi Manusia dan Komputer",
        "number_of_lab_assistant" => 4,
        "exam_start" => "2022/02/15 00:00:00",
        "exam_end" => "2022/02/22 23:59:00",
        ],
    );
@endphp
@extends('website.layouts.master')

@section('content')
<div class="w-full lg:w-3/5 m-auto bg-white drop-shadow-md p-4 lg:p-10">
    <div class="mb-4">
        <p class="text-2xl lg:text-3xl text-center text-emerald-600 font-serif font-bold tracking-wider">Form
            Pendaftaran <br class="lg:hidden">Asisten Praktikum</p>
    </div>
    <form action="" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mb-6" x-data="{
                }">
            <!-- NAMA -->
            <div class="mb-4">
                <label class="block w-full text-gray-500 mb-2 text-lg font-semibold" for="name">Nama Lengkap</label>
                <div class="relative">
                    <input
                        class="w-full py-1 px-2 lg:py-2 lg:px-3 text-emerald-800 font-semibold bg-emerald-50 border border-white focus:ring-1 lg:focus:ring-2 focus:border-white focus:ring-emerald-600 focus:ring-opacity-50-emerald-200"
                        type="text" name="name" id="name" autocomplete="off" required />
                    <div id="nameAllowed" class="hidden absolute top-0 right-0 text-emerald-400 m-1 bg-emerald-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div id="nameError" class="hidden absolute top-0 right-0 text-red-400 m-1 bg-emerald-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <p id="nameErrorMsg" class="hidden mt-1 w-fit py-1 px-2 rounded-sm text-xs font-thin border-[1px] text-red-600 bg-red-50 border-red-400"></p>
            </div>
            <!-- NIM -->
            <div class="mb-4">
                <label class="block w-full text-gray-500 mb-2 text-lg font-semibold" for="nim">Nomor Induk
                    Mahasiswa</label>
                <div class="relative">
                    <input
                        class="w-full py-1 px-2 lg:py-2 lg:px-3 text-emerald-800 font-semibold bg-emerald-50 border border-white focus:ring-1 lg:focus:ring-2 focus:border-white focus:ring-emerald-600 focus:ring-opacity-50-emerald-200"
                        type="text" name="nim" id="nim" autocomplete="off" required />
                    <div id="nimAllowed" class="hidden absolute top-0 right-0 text-emerald-400 m-1 bg-emerald-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div id="nimError" class="hidden absolute top-0 right-0 text-red-400 m-1 bg-emerald-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <p id="nimErrorMsg" class="hidden mt-1 w-fit py-1 px-2 rounded-sm text-xs font-thin border-[1px] text-red-600 bg-red-50 border-red-400"></p>
            </div>
            <!-- EMAIL -->
            <div class="mb-4">
                <label class="block w-full text-gray-500 mb-2" for="email">
                    <p class="text-lg font-semibold">Alamat Email</p>
                    <p class="text-xs lg:text-sm font-thin">Gunakan alamat email ITERA untuk memudahkan kami mengirim informasi kepada anda</p>
                </label>
                <div class="relative">
                    <input
                        class="w-full py-1 px-2 lg:py-2 lg:px-3 text-emerald-800 font-semibold bg-emerald-50 border border-white focus:ring-1 lg:focus:ring-2 focus:border-white focus:ring-emerald-600 focus:ring-opacity-50-emerald-200"
                        type="email" name="email" id="email" autocomplete="off" required />
                    <div id="emailAllowed" class="hidden absolute top-0 right-0 text-emerald-400 m-1 bg-emerald-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div id="emailError" class="hidden absolute top-0 right-0 text-red-400 m-1 bg-emerald-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <p id="emailErrorMsg" class="hidden mt-1 w-fit py-1 px-2 rounded-sm text-xs font-thin border-[1px] text-red-600 bg-red-50 border-red-400"></p>
            </div>
            <!-- SUBJECT -->
            <div class="mb-4">
                <p class="block w-full text-gray-500 text-lg font-semibold">Pilihan Mata Kuliah</p>
                <div class="px-2 mt-2">
                    @foreach ($period->subjects as $subject)
                    <input type="checkbox" id="subject_{{ $subject->id }}" name="subject[]" value="{{ $subject->id }}"
                        class="subject-checkbox hidden">
                    <label for="subject_{{ $subject->id }}" class="flex items-center gap-2 mb-2">
                        <div id="cbcontainer_{{ $subject->id }}" class="p-0.5 border-2 border-white">
                            <div id="cbchecklist_{{ $subject->id }}" class="text-white border-2 border-emerald-600 bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <p id="subjectname_{{ $subject->id }}" class="text-base text-gray-500">
                            {{ $subject->name }}
                        </p>
                    </label>
                    @endforeach
                </div>
                <p id="subjectErrorMsg" class="hidden mt-1 w-fit py-1 px-2 rounded-sm text-xs font-thin border-[1px] text-red-600 bg-red-50 border-red-400">
                    Anda hanya dapat memilih <span class="font-semibold">maksimal 3</span> mata kuliah
                </p>
            </div>
            <!-- CV -->
            <div class="mb-4">
                <p class="block w-full text-gray-500 mb-2 text-lg font-semibold">Curriculum Vitae</p>
                <input type="file" name="cv" id="cv" class="hidden" required />
                <p id="cvnamecontainer"
                    class="hidden w-fit border-2 py-1 px-2 gap-2 items-center bg-emerald-50 border-emerald-400 text-emerald-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span id="cvname" class="max-w-[240px] truncate">
                        Nama File
                    </span>
                </p>
                <p id="cverrorcontainer"
                    class="hidden w-fit mb-2 border-2 py-1 px-2 gap-2 items-center bg-red-50 border-red-400 text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <span id="cverror" class="max-w-[240px] truncate">
                        Pesan Error
                    </span>
                </p>
                <label class="w-fit block" for="cv">
                    <p id="ganticv"
                        class="hidden cursor-pointer mt-2 px-1 italic font-bold tracking-wider text-sm text-gray-400 hover:text-gray-500">
                        Ganti File
                    </p>
                    <div id="pilihcv"
                        class="flex border cursor-pointer items-center py-1 pl-3 pr-5 gap-3 text-emerald-600 hover:bg-emerald-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                        <p class="font-bold">
                            Pilih File
                        </p>
                    </div>
                </label>
            </div>
            <!-- KHS -->
            <div class="mb-4">
                <p class="block w-full text-gray-500 mb-2 text-lg font-semibold">Kartu Hasil Studi</p>
                <input type="file" name="khs" id="khs" class="hidden" required />
                <p id="khsnamecontainer"
                    class="hidden w-fit border-2 py-1 px-2 gap-2 items-center bg-emerald-50 border-emerald-400 text-emerald-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span id="khsname" class="max-w-[240px] truncate">
                        Nama File
                    </span>
                </p>
                <p id="khserrorcontainer"
                    class="hidden w-fit mb-2 border-2 py-1 px-2 gap-2 items-center bg-red-50 border-red-400 text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <span id="khserror" class="max-w-[240px] truncate">
                        Pesan Error
                    </span>
                </p>
                <label class="w-fit block" for="khs">
                    <p id="gantikhs"
                        class="hidden cursor-pointer mt-2 px-1 italic font-bold tracking-wider text-sm text-gray-400 hover:text-gray-500">
                        Ganti File
                    </p>
                    <div id="pilihkhs"
                        class="flex border cursor-pointer items-center py-1 pl-3 pr-5 gap-3 text-emerald-600 hover:bg-emerald-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                        <p class="font-bold">
                            Pilih File
                        </p>
                    </div>
                </label>
            </div>
            <!-- TRANSKRIP -->
            <div class="mb-4">
                <p class="block w-full text-gray-500 mb-2 text-lg font-semibold">Transkrip Nilai Terbaru</p>
                <input type="file" name="transkrip" id="transkrip" class="hidden" required />
                <p id="transkripnamecontainer"
                    class="hidden w-fit border-2 py-1 px-2 gap-2 items-center bg-emerald-50 border-emerald-400 text-emerald-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span id="transkripname" class="max-w-[240px] truncate">
                        Nama File
                    </span>
                </p>
                <p id="transkriperrorcontainer"
                    class="hidden w-fit mb-2 border-2 py-1 px-2 gap-2 items-center bg-red-50 border-red-400 text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <span id="transkriperror" class="max-w-[240px] truncate">
                        Pesan Error
                    </span>
                </p>
                <label class="w-fit block" for="transkrip">
                    <p id="gantitranskrip"
                        class="hidden cursor-pointer mt-2 px-1 italic font-bold tracking-wider text-sm text-gray-400 hover:text-gray-500">
                        Ganti File
                    </p>
                    <div id="pilihtranskrip"
                        class="flex border cursor-pointer items-center py-1 pl-3 pr-5 gap-3 text-emerald-600 hover:bg-emerald-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                        <p class="font-bold">
                            Pilih File
                        </p>
                    </div>
                </label>
            </div>
        </div>
        <div class="border">
            <button type="submit"
                class="text-2xl py-2 block w-full text-center bg-emerald-500 hover:bg-emerald-600 text-white font-extrabold font-serif tracking-wider uppercase">
                Daftar
            </button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    function print(data){
            console.log(data);
        }

        $(document).ready(function () {
            // NAMA
            $("#name").focusout(function (e) { 
                e.preventDefault();

                let name = document.getElementById("name").value;
                $("#nameAllowed").addClass("hidden");
                $("#nameError").addClass("hidden");
                $("#nameErrorMsg").addClass("hidden");

                if (name.length <= 0){
                    $("#nameError").removeClass("hidden");
                    $("#nameErrorMsg").text("Nama tidak boleh kosong");
                    $("#nameErrorMsg").removeClass("hidden");
                }else{
                    $("#nameAllowed").removeClass("hidden");
                }
                
            });

            // NIM
            $("#nim").focusout(function (e) { 
                e.preventDefault();

                let nimRegex = /^([\d]{8,9})$/;

                let nim = document.getElementById("nim").value;
                $("#nimAllowed").addClass("hidden");
                $("#nimError").addClass("hidden");
                $("#nimErrorMsg").addClass("hidden");

                if ( nim.length <= 0 ){
                    $("#nimError").removeClass("hidden");
                    $("#nimErrorMsg").text("NIM tidak boleh kosong");
                    $("#nimErrorMsg").removeClass("hidden");
                }else if( nim.length > 9 || !(nim.match(nimRegex)) ){
                    $("#nimError").removeClass("hidden");
                    $("#nimErrorMsg").text("NIM tidak valid");
                    $("#nimErrorMsg").removeClass("hidden");
                }
                else{
                    $("#nimAllowed").removeClass("hidden");
                }
                
            });

            // EMAIL
            $("#email").focusout(function (e) { 
                e.preventDefault();

                let emailRegex =  /^([a-z]{3,})\.([\d]{8,9})@student\.itera\.ac\.id$/;

                let email = document.getElementById("email").value;
                $("#emailAllowed").addClass("hidden");
                $("#emailError").addClass("hidden");
                $("#emailErrorMsg").addClass("hidden");

                if ( email.length <= 0 ){
                    $("#emailError").removeClass("hidden");
                    $("#emailErrorMsg").text("Email tidak boleh kosong");
                    $("#emailErrorMsg").removeClass("hidden");
                }else if( !(email.match(emailRegex)) ){
                    $("#emailError").removeClass("hidden");
                    $("#emailErrorMsg").text("Gunakan email ITERA yang valid");
                    $("#emailErrorMsg").removeClass("hidden");
                }
                else{
                    $("#emailAllowed").removeClass("hidden");
                }
                
            });

            // CHECKBOX PILIH MATA KULIAH
            const limit = 3;
            $('input.subject-checkbox').on('change', function(evt) {
                $("#subjectErrorMsg").addClass("hidden");
                if($(this).siblings(':checked').length >= limit) {
                    this.checked = false;
                    $("#subjectErrorMsg").removeClass("hidden");
                }
                let id = $(this).attr('id').split('_')[1];
                if(this.checked){
                    $('#cbcontainer_'+id).removeClass('border-white');
                    $('#cbcontainer_'+id).addClass('border-emerald-600');
                    $('#cbchecklist_'+id).removeClass('bg-white');
                    $('#cbchecklist_'+id).addClass('bg-emerald-600');
                    $('#subjectname_'+id).removeClass('text-gray-500');
                    $('#subjectname_'+id).addClass('text-emerald-600');
                }else{
                    $('#cbcontainer_'+id).removeClass('border-emerald-600');
                    $('#cbcontainer_'+id).addClass('border-white');
                    $('#cbchecklist_'+id).removeClass('bg-emerald-600');
                    $('#cbchecklist_'+id).addClass('bg-white');
                    $('#subjectname_'+id).removeClass('text-emerald-600');
                    $('#subjectname_'+id).addClass('text-gray-500');
                }
            });

            // INPUT FILE 'CV'
            $("#cv").change(function (e) {
                e.preventDefault();
                let cv     = document.getElementById("cv");
                let cvFile = document.getElementById("cv").files[0];
                if(cvFile){
                    let fileExt = cvFile.name.split(".")[1];
                    print(fileExt);
                    if (fileExt === "pdf") {
                        if(cvFile.size < 1000000){
                            if($("#cverrorcontainer").hasClass("flex")){
                                $("#cverrorcontainer").removeClass("flex");
                                $("#cverrorcontainer").addClass("hidden");
                            }
                            if($("#cvnamecontainer").hasClass("hidden")){
                                $("#cvnamecontainer").removeClass("hidden");
                                $("#cvnamecontainer").addClass("flex");
                            }
                            if($("#ganticv").hasClass("hidden")){
                                $("#ganticv").removeClass("hidden");
                                $("#ganticv").addClass("block");
                            }
                            if($("#pilihcv").hasClass("flex")){
                                $("#pilihcv").removeClass("flex");
                                $("#pilihcv").addClass("hidden");
                            }
                            $("#cvname").text(cvFile.name);
                        }else{
                            if($("#cverrorcontainer").hasClass("hidden")){
                                $("#cverrorcontainer").removeClass("hidden");
                                $("#cverrorcontainer").addClass("flex");
                            }
                            if($("#cvnamecontainer").hasClass("flex")){
                                $("#cvnamecontainer").removeClass("flex");
                                $("#cvnamecontainer").addClass("hidden");
                            }
                            if($("#ganticv").hasClass("block")){
                                $("#ganticv").removeClass("block");
                                $("#ganticv").addClass("hidden");
                            }
                            if($("#pilihcv").hasClass("hidden")){
                                $("#pilihcv").removeClass("hidden");
                                $("#pilihcv").addClass("flex");
                            }
                            $("#cverror").text("Ukuran maksimal file 1MB");
                            cv.value = null
                        }
                    }else{
                        if($("#cverrorcontainer").hasClass("hidden")){
                            $("#cverrorcontainer").removeClass("hidden");
                            $("#cverrorcontainer").addClass("flex");
                        }
                        if($("#cvnamecontainer").hasClass("flex")){
                            $("#cvnamecontainer").removeClass("flex");
                            $("#cvnamecontainer").addClass("hidden");
                        }
                        if($("#ganticv").hasClass("block")){
                            $("#ganticv").removeClass("block");
                            $("#ganticv").addClass("hidden");
                        }
                        if($("#pilihcv").hasClass("hidden")){
                            $("#pilihcv").removeClass("hidden");
                            $("#pilihcv").addClass("flex");
                        }
                        $("#cverror").text("Hanya dapat menerima file .pdf");
                        cv.value = null
                    }
                }
            });

            // INPUT FILE 'KHS'
            $("#khs").change(function (e) {
                e.preventDefault();
                let khs     = document.getElementById("khs");
                let khsFile = document.getElementById("khs").files[0];
                if(khsFile){
                    let fileExt = khsFile.name.split(".")[1];
                    print(fileExt);
                    if (fileExt === "pdf") {
                        if(khsFile.size < 1000000){
                            if($("#khserrorcontainer").hasClass("flex")){
                                $("#khserrorcontainer").removeClass("flex");
                                $("#khserrorcontainer").addClass("hidden");
                            }
                            if($("#khsnamecontainer").hasClass("hidden")){
                                $("#khsnamecontainer").removeClass("hidden");
                                $("#khsnamecontainer").addClass("flex");
                            }
                            if($("#gantikhs").hasClass("hidden")){
                                $("#gantikhs").removeClass("hidden");
                                $("#gantikhs").addClass("block");
                            }
                            if($("#pilihkhs").hasClass("flex")){
                                $("#pilihkhs").removeClass("flex");
                                $("#pilihkhs").addClass("hidden");
                            }
                            $("#khsname").text(khsFile.name);
                        }else{
                            if($("#khserrorcontainer").hasClass("hidden")){
                                $("#khserrorcontainer").removeClass("hidden");
                                $("#khserrorcontainer").addClass("flex");
                            }
                            if($("#khsnamecontainer").hasClass("flex")){
                                $("#khsnamecontainer").removeClass("flex");
                                $("#khsnamecontainer").addClass("hidden");
                            }
                            if($("#gantikhs").hasClass("block")){
                                $("#gantikhs").removeClass("block");
                                $("#gantikhs").addClass("hidden");
                            }
                            if($("#pilihkhs").hasClass("hidden")){
                                $("#pilihkhs").removeClass("hidden");
                                $("#pilihkhs").addClass("flex");
                            }
                            $("#khserror").text("Ukuran maksimal file 1MB");
                            khs.value = null
                        }
                    }else{
                        if($("#khserrorcontainer").hasClass("hidden")){
                            $("#khserrorcontainer").removeClass("hidden");
                            $("#khserrorcontainer").addClass("flex");
                        }
                        if($("#khsnamecontainer").hasClass("flex")){
                            $("#khsnamecontainer").removeClass("flex");
                            $("#khsnamecontainer").addClass("hidden");
                        }
                        if($("#gantikhs").hasClass("block")){
                            $("#gantikhs").removeClass("block");
                            $("#gantikhs").addClass("hidden");
                        }
                        if($("#pilihkhs").hasClass("hidden")){
                            $("#pilihkhs").removeClass("hidden");
                            $("#pilihkhs").addClass("flex");
                        }
                        $("#khserror").text("Hanya dapat menerima file .pdf");
                        khs.value = null
                    }
                }
            });

            // INPUT FILE 'TRANSKRIP'
            $("#transkrip").change(function (e) {
                e.preventDefault();
                let transkrip     = document.getElementById("transkrip");
                let transkripFile = document.getElementById("transkrip").files[0];
                if(transkripFile){
                    let fileExt = transkripFile.name.split(".")[1];
                    print(fileExt);
                    if (fileExt === "pdf") {
                        if(transkripFile.size < 1000000){
                            if($("#transkriperrorcontainer").hasClass("flex")){
                                $("#transkriperrorcontainer").removeClass("flex");
                                $("#transkriperrorcontainer").addClass("hidden");
                            }
                            if($("#transkripnamecontainer").hasClass("hidden")){
                                $("#transkripnamecontainer").removeClass("hidden");
                                $("#transkripnamecontainer").addClass("flex");
                            }
                            if($("#gantitranskrip").hasClass("hidden")){
                                $("#gantitranskrip").removeClass("hidden");
                                $("#gantitranskrip").addClass("block");
                            }
                            if($("#pilihtranskrip").hasClass("flex")){
                                $("#pilihtranskrip").removeClass("flex");
                                $("#pilihtranskrip").addClass("hidden");
                            }
                            $("#transkripname").text(transkripFile.name);
                        }else{
                            if($("#transkriperrorcontainer").hasClass("hidden")){
                                $("#transkriperrorcontainer").removeClass("hidden");
                                $("#transkriperrorcontainer").addClass("flex");
                            }
                            if($("#transkripnamecontainer").hasClass("flex")){
                                $("#transkripnamecontainer").removeClass("flex");
                                $("#transkripnamecontainer").addClass("hidden");
                            }
                            if($("#gantitranskrip").hasClass("block")){
                                $("#gantitranskrip").removeClass("block");
                                $("#gantitranskrip").addClass("hidden");
                            }
                            if($("#pilihtranskrip").hasClass("hidden")){
                                $("#pilihtranskrip").removeClass("hidden");
                                $("#pilihtranskrip").addClass("flex");
                            }
                            $("#transkriperror").text("Ukuran maksimal file 1MB");
                            transkrip.value = null
                        }
                    }else{
                        if($("#transkriperrorcontainer").hasClass("hidden")){
                            $("#transkriperrorcontainer").removeClass("hidden");
                            $("#transkriperrorcontainer").addClass("flex");
                        }
                        if($("#transkripnamecontainer").hasClass("flex")){
                            $("#transkripnamecontainer").removeClass("flex");
                            $("#transkripnamecontainer").addClass("hidden");
                        }
                        if($("#gantitranskrip").hasClass("block")){
                            $("#gantitranskrip").removeClass("block");
                            $("#gantitranskrip").addClass("hidden");
                        }
                        if($("#pilihtranskrip").hasClass("hidden")){
                            $("#pilihtranskrip").removeClass("hidden");
                            $("#pilihtranskrip").addClass("flex");
                        }
                        $("#transkriperror").text("Hanya dapat menerima file .pdf");
                        transkrip.value = null
                    }
                }
            });
        });
</script>
@endsection
