@extends('website.layouts.master')

@section('content')
<div class="w-full lg:w-3/5 m-auto bg-white drop-shadow-md p-4 lg:p-10 min-h-[calc(100vh-4.75rem)] lg:min-h-[calc(100vh-5.5rem)]">
    <div class="mb-4">
        <p class="text-xl lg:text-2xl text-center text-emerald-600 font-serif font-bold tracking-wider">
            Hasil Seleksi Tes Penerimaan Asisten Praktikum <br class="hidden lg:block"> {{ $period->name }}
        </p>
    </div>
    <div class="w-full mb-2 pb-2 border-b-2 border-emerald-600">
        <p class="font-bold text-emerald-600 text-lg lg:text-xl mb-2">
            Daftar Mahasiswa Lolos Seleksi Tes
        </p>
        <p class="mb-2">
            Berikut adalah daftar mahasiswa yang dinyatakan lulus Seleksi Tes Penerimaan Asisten Praktikum {{ $period->name }} :
        </p>
    </div>

    <div id='pass_file_selection_registrar' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
        <table id="pass_file_selection_registrar_table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">Nama</th>
                    <th data-priority="2">NIM</th>
                    <th data-priority="3">Mata Kuliah</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tiger</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
                <tr>
                    <td>Lion</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
                <tr>
                    <td>Elephant</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
                <tr>
                    <td>Snake</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
                <tr>
                    <td>Koala</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
                <tr>
                    <td>Panda</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
                <tr>
                    <td>Gorilla</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
                <tr>
                    <td>Bear</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
                <tr>
                    <td>Zebra</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
                <tr>
                    <td>Horse</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
                <tr>
                    <td>Bird</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
                <tr>
                    <td>Fish</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
                <tr>
                    <td>Chicken</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
                <tr>
                    <td>Cat</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
                <tr>
                    <td>Dog</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
                <tr>
                    <td>Hawk</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
                <tr>
                    <td>Shark</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
                <tr>
                    <td>Buffalo</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
                <tr>
                    <td>Cow</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
                <tr>
                    <td>Spider</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
                <tr>
                    <td>Scorpion</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
                <tr>
                    <td>Bat</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
                <tr>
                    <td>Bowler</td>
                    <td>{{ rand(118140001,118140100) }}</td>
                    <td>Filsafat Titik</td>
                </tr>
            </tbody>
        </table>
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