{{-- @php
$registrars = array(
(object)[
'id' => 1,
'name' => 'Pace Kimak',
'nim' => '118140088',
'subjects' => array(
(object)[
'id' => 1,
'name' => 'Filsafat Islam',
'is_pass_file' => true,
'is_pass_exam' => false
],
(object)[
'id' => 2,
'name' => 'Filsafat Hindu',
'is_pass_file' => false,
'is_pass_exam' => false
],
(object)[
'id' => 3,
'name' => 'Filsafat Budha',
'is_pass_file' => true,
'is_pass_exam' => false
],
),
],
(object)[
'id' => 2,
'name' => 'Pace Peler',
'nim' => '118140090',
'subjects' => array(
(object)[
'id' => 4,
'name' => 'Filsafat Es',
'is_pass_file' => true,
'is_pass_exam' => false
],
),
],
(object)[
'id' => 3,
'name' => 'Erdy Gaya Manalu',
'nim' => '118140069',
'subjects' => array(
(object)[
'id' => 5,
'name' => 'Kristen Berjaya',
'is_pass_file' => true,
'is_pass_exam' => false
],
(object)[
'id' => 6,
'name' => 'Kristen Itu Indah',
'is_pass_file' => true,
'is_pass_exam' => false
],
(object)[
'id' => 7,
'name' => 'Kristen Agama Nabi',
'is_pass_file' => false,
'is_pass_exam' => false
],
),
],
(object)[
'id' => 4,
'name' => 'Markus Togi Fedrian Rivaldi Sinaga',
'nim' => '118140037',
'subjects' => array(
(object)[
'id' => 1,
'name' => 'Filsafat Islam',
'is_pass_file' => false,
'is_pass_exam' => false
],
(object)[
'id' => 2,
'name' => 'Filsafat Hindu',
'is_pass_file' => false,
'is_pass_exam' => false
],
(object)[
'id' => 3,
'name' => 'Filsafat Budha',
'is_pass_file' => true,
'is_pass_exam' => false
],
),
],
(object)[
'id' => 5,
'name' => 'Erick Thohir',
'nim' => '118140037',
'subjects' => array(
(object)[
'id' => 2,
'name' => 'Filsafat Hindu',
'is_pass_file' => true,
'is_pass_exam' => false
],
),
],
);
@endphp --}}

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
                            <th style="text-align: center" tabindex="0" aria-controls="registrar_table" rowspan="1"
                                colspan="1">Nama</th>
                            <th style="text-align: center" tabindex="0" aria-controls="registrar_table" rowspan="1"
                                colspan="1">NIM</th>
                            <th style="text-align: center" tabindex="0" aria-controls="registrar_table" rowspan="1"
                                colspan="1">
                                Seleksi Berkas
                            </th>
                            <th style="text-align: center" tabindex="0" aria-controls="registrar_table" rowspan="1"
                                colspan="1">Seleksi Tes</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($registrars as $registrar)
                        <tr class="">
                            <td tabindex="0">{{ $registrar->name }}</td>
                            <td>{{ $registrar->nim }}
                            </td>
                            <td>
                                @foreach ($registrar->period_subjects as $period_subject)
                                @if ($period_subject->pivot->is_pass_file_selection)
                                <span class="badge badge-success">{{ $period_subject->subject->name }}</span>
                                @else
                                <span class="badge badge-danger">{{ $period_subject->subject->name }}</span>
                                @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($registrar->period_subjects as $period_subject)
                                @if ($period_subject->pivot->is_pass_exam_selection)
                                <span class="badge badge-success">{{ $period_subject->subject->name }}</span>
                                @else
                                <span class="badge badge-danger">{{ $period_subject->subject->name }}</span>
                                @endif
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="text-align: center" rowspan="1" colspan="1">Nama</th>
                            <th style="text-align: center" rowspan="1" colspan="1">NIM</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Seleksi Berkas</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Seleksi Tes</th>
                        </tr>
                    </tfoot>
                </table>
                <div class="pb-3">
                    <p>Keterangan :
                        <span class="badge badge-success">Lulus</span>
                        <span class="badge badge-danger">Belum/Tidak Lulus</span>
                    </p>
                </div>
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
