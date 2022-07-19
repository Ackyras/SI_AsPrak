@extends('website.layouts.master')

@section('content')
<div
    class="w-full lg:w-3/5 m-auto bg-white drop-shadow-md p-4 lg:p-10 min-h-[calc(100vh-4.75rem)] lg:min-h-[calc(100vh-5.5rem)]">
    <div class="mb-4">
        <p class="font-serif text-xl font-bold tracking-wider text-center lg:text-2xl text-emerald-600">
            Hasil Seleksi Berkas Penerimaan Asisten Praktikum <br class="hidden lg:block"> {{ $period->name }}
        </p>
    </div>
    {{-- <div class="relative w-full p-2 mx-auto mb-4 bg-gray-200 lg:w-2/3 group">
        <img src="{{ asset($period->selection_poster) }}" alt="" class="w-full">
        <div class="hidden lg:group-hover:block absolute inset-0 bg-[#00000050]"></div>
        <div class="absolute inset-0 items-center justify-center hidden lg:group-hover:flex">
            <a href="{{ asset($period->selection_poster) }}"
                class="flex items-center justify-center gap-3 py-2 pl-2 pr-4 text-white duration-300 ease-in-out rounded bg-emerald-600 hover:bg-emerald-500"
                download>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <p class="text-xl font-semibold">Download Poster</p>
            </a>
        </div>
        <a href="{{ asset($period->selection_poster) }}"
            class="flex items-center justify-center gap-3 py-2 pl-2 pr-4 mt-2 text-white duration-300 ease-in-out rounded lg:hidden bg-emerald-600 hover:bg-emerald-500"
            download>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </span>
            <p class="text-lg font-semibold">Download Poster</p>
        </a>
    </div> --}}
    <div class="w-full pb-2 mb-2 border-b-2 border-emerald-600">
        <p class="mb-2 text-lg font-bold text-emerald-600 lg:text-xl">
            Daftar Mahasiswa Lolos Seleksi Berkas
        </p>
        <p class="mb-2">
            Berikut adalah daftar mahasiswa yang dinyatakan lulus Seleksi Berkas Penerimaan Asisten Praktikum {{
            $period->name }} :
        </p>
    </div>

    <div id='pass_file_selection_registrar' class="p-8 mb-6 bg-white rounded shadow b lg:mt-0">
        <table id="pass_file_selection_registrar_table" class="stripe hover"
            style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">Nama</th>
                    <th data-priority="2">NIM</th>
                    <th data-priority="3">Mata Kuliah</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($psrs as $psr)
                <tr>
                    <td>{{ $psr->registrar->name }}</td>
                    <td>{{ $psr->registrar->nim }}</td>
                    <td>{{ $psr->period_subject->subject->name }}</td>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
    <div class="w-full pb-2 mb-2 border-t-2 border-b-2 border-emerald-600">
        <p class="mb-2">
            Untuk mahasiswa yang sudah lolos dapat mengecek email masing-masing untuk mendapatkan akun yang akan
            digunakan untuk mengikuti ujian
        </p>
    </div>
</div>
@endsection

@section('styles')
<!--Regular Datatables CSS-->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<!--Responsive Extension Datatables CSS-->
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
<style>
    .dataTables_wrapper select,
    .dataTables_wrapper .dataTables_filter input {
        color: #4a685d;
        padding-left: 1rem;
        padding-right: 1rem;
        padding-top: .5rem;
        padding-bottom: .5rem;
        line-height: 1.25;
        border-width: 2px;
        border-radius: .25rem;
        border-color: #edeef7;
        background-color: #edf7f5;
    }

    table.dataTable.hover tbody tr:hover,
    table.dataTable.display tbody tr:hover {
        background-color: #ebfffb;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        font-weight: 700;
        border-radius: .25rem;
        border: 1px solid transparent;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        color: #fff !important;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        font-weight: 700;
        border-radius: .25rem;
        background: #66eaba !important;
        border: 1px solid transparent;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        color: #fff !important;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        font-weight: 700;
        border-radius: .25rem;
        background: #66eab7 !important;
        border: 1px solid transparent;
    }

    table.dataTable.no-footer {
        border-bottom: 1px solid #e2e8f0;
        margin-top: 0.75em;
        margin-bottom: 0.75em;
    }

    table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
    table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
        background-color: #66eac7 !important;
    }
</style>
@endsection

@section('scripts')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function() {
            var table = $('#pass_file_selection_registrar_table').DataTable({
                responsive: true
            })
            .columns.adjust()
            .responsive.recalc();
        });
</script>
@endsection
