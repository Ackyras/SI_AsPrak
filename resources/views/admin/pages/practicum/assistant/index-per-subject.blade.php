@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title font-weight-bold">Data Seluruh Asisten Praktikum</h2>
            </div>
        </div>

        <div class="card-body">
            <div id="subject_assistant_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="btn-group mb-2">
                    <button style="background-color: #9ca3af;" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Filter Data
                    </button>
                    <div class="dropdown-menu">
                    <a href="{{ route('admin.practicum.lab-assistant.index') }}"
                        class="dropdown-item {{ request()->routeIs('admin.practicum.lab-assistant.index') ? 'bg-info' : '' }}">
                        Berdasarkan Nama Asisten
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('admin.berdasarkan-kelas-xxx-yyy-zzz') }}">Mata Kuliah A</a>
                    <a class="dropdown-item" href="{{ route('admin.berdasarkan-kelas-xxx-yyy-zzz') }}">Mata Kuliah B</a>
                    <a class="dropdown-item" href="{{ route('admin.berdasarkan-kelas-xxx-yyy-zzz') }}">Mata Kuliah C</a>
                    </div>
                </div>
                <table id="subject_assistant_table" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                    aria-describedby="subject_assistant_table_info">
                    <thead>
                        <tr>
                            <th style="text-align: center" tabindex="0" aria-controls="subject_assistant_table" rowspan="1"
                                colspan="1">Nama</th>
                            <th style="text-align: center" tabindex="0" aria-controls="subject_assistant_table" rowspan="1"
                                colspan="1">NIM</th>
                            <th style="text-align: center" tabindex="0" aria-controls="subject_assistant_table" rowspan="1"
                                colspan="1">
                                Keaktifan
                            </th>
                            <th tabindex="0" aria-controls="period_subject_table" rowspan="1" colspan="1"
                                style="width: 90px; text-align: center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="">
                            <td tabindex="0">Marihot</td>
                            <td>118140XXX</td>
                            <td>69%</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a role="button" href=""class="btn btn-sm btn-success">Lihat Detail</a>
                                </div>
                            </td>
                        </tr>
                        <tr class="">
                            <td tabindex="0">Maria</td>
                            <td>118140YYY</td>
                            <td>79%</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a role="button" href=""class="btn btn-sm btn-success">Lihat Detail</a>
                                </div>
                            </td>
                        </tr>
                        <tr class="">
                            <td tabindex="0">Maringan</td>
                            <td>118140ZZZ</td>
                            <td>89%</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a role="button" href=""class="btn btn-sm btn-success">Lihat Detail</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="text-align: center" rowspan="1" colspan="1">Nama</th>
                            <th style="text-align: center" rowspan="1" colspan="1">NIM</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Keaktifan</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Aksi</th>
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
        $("#subject_assistant_table").DataTable({
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
        }).buttons().container().appendTo('#subject_assistant_table_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection