@extends('admin.layouts.app')

@section('content')
    <div class="p-2">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title font-weight-bold">Data Asisten Praktikum Mata Kuliah {{ $period_subject->subject->name }} Periode {{ $period->name }}</h2>
            </div>

            <div class="card-body">
                <div id="period_subject_table_wrapper" class="dataTables_wrapper dt-bootstrap4 w-100">
                    <table id="period_subject_table"
                        class="table table-bordered table-hover dataTable dtr-inline collapsed w-100"
                        aria-describedby="period_subject_table_info">
                        <thead>
                            <tr>
                                <th  tabindex="0" aria-controls="period_subject_table"
                                    rowspan="1" colspan="1">Nama Asisten</th>
                                <th style="text-align: center" tabindex="0" aria-controls="period_subject_table"
                                    rowspan="1" colspan="1">NIM</th>
                                <th style="text-align: center" tabindex="0" aria-controls="period_subject_table"
                                    rowspan="1" colspan="1">Jumlah Kehadiran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($psrs as $psr)
                                <tr>
                                    <td tabindex="0">{{ $psr->registrar->name }}</td>
                                    <td>{{ $psr->registrar->nim }}</td>
                                    <td style="text-align: center;">{{ $psr->presences_count }}</td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(function() {
            $('#period_subject_table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
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
            }).buttons().container().appendTo('#period_subject_table_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
