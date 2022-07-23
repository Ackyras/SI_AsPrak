<?php
    $names = array(
        "Ribka", "Julyasih", "Sidabutar", "Risno", "Putri", "Nainggolan",
        "Ultraman", "Spiderman", "Batman", "Jacob", "X-Men", "Sibarani"
    );
    $subjects = array(
        "Filsafat Jawa",
        "Filsafat Jiwa",
        "Filsafat Air",
        "Filsafat Kabel",
        "Filsafat Abu",
    );
    $classes = array(
        "RA", "RB", "RC", "RD", "TPB 1", "TPB 2", "TPB 3"
    );
    $assistants = array();

    for($i=0; $i<20; $i++){
        array_push(
            $assistant,
            (object)[
                "name"          => $names[rand(0,5)]." ".$names[rand(6,11)],
                "nim"           => rand(118140001,118140099),
                "subject"   =>  (object)[ 
                    "name"          => $subjects[rand(0,4)],
                    "classroom"     => $classes[rand(0,6)],
                    "cost"          => 100000
                ],
                "presence_count"    => rand(1,12),
            ]
        );
    }
?>

@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title font-weight-bold">Data Seluruh Pendaftar</h2>
            </div>
        </div>

        <div class="card-body">
            <div id="registrar_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <table id="registrar_table" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                    aria-describedby="registrar_table_info">
                    <thead>
                        <tr>
                            <th style="text-align: center" tabindex="0" aria-controls="registrar_table" rowspan="1" colspan="1">
                                Nama
                            </th>
                            <th style="text-align: center" tabindex="0" aria-controls="registrar_table" rowspan="1" colspan="1">
                                NIM
                            </th>
                            <th style="text-align: center" tabindex="0" aria-controls="registrar_table" rowspan="1" colspan="1">
                                Mata Kuliah - Kelas
                            </th>
                            <th style="text-align: center" tabindex="0" aria-controls="registrar_table" rowspan="1" colspan="1">
                                Tarif Honor
                            </th>
                            <th style="text-align: center" tabindex="0" aria-controls="registrar_table" rowspan="1" colspan="1">
                                Jumlah hadir
                            </th>
                            <th style="text-align: center" tabindex="0" aria-controls="registrar_table" rowspan="1" colspan="1">
                                Total
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($assistants as $assistant)
                            <tr class="">
                                <td tabindex="0">{{ $assistant->name }}</td>
                                <td>{{ $assistant->nim }}</td>
                                <td>{{ $assistant->subject->name }} - {{ $assistant->subject->classroom }}</td>
                                <td>{{ $assistant->subject->cost }}</td>
                                <td>{{ $assistant->presence_count }}</td>
                                <td>{{ $assistant->subject->cost * $assistant->presence_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="text-align: center" rowspan="1" colspan="1">Nama</th>
                            <th style="text-align: center" rowspan="1" colspan="1">NIM</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Mata Kuliah - Kelas</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Tarif Honor</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Jumlah Hadir</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Total</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        $("#registrar_table").DataTable({
            "paging": true,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": true,
            "ordering": false,
            "buttons": [{
                    extend: "copy",
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: "excel",
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: "csv",
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                "colvis"
            ]
        }).buttons().container().appendTo('#registrar_table_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection
