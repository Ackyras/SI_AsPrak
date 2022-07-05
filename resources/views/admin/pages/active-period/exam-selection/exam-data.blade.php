@extends('admin.layouts.app')

@section('content')
    <div class="p-2">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title font-weight-bold">Data Tes Pendaftar Periode {{ $period->name }}</h2>
            </div>

            <div class="card-body">
                <div id="exam_data_table_wrapper" class="dataTables_wrapper dt-bootstrap4 w-100">
                    <table id="exam_data_table"
                        class="table table-bordered table-hover dataTable dtr-inline collapsed w-100"
                        aria-describedby="exam_data_table_info">
                        <thead>
                            <tr>
                                <th style="text-align: center" tabindex="0" aria-controls="exam_data_table"
                                    rowspan="1" colspan="1">Nama Mata Kuliah</th>
                                <th style="text-align: center" tabindex="0" aria-controls="exam_data_table"
                                    rowspan="1" colspan="1">Kuota Asisten</th>
                                <th style="text-align: center" tabindex="0" aria-controls="exam_data_table"
                                    rowspan="1" colspan="1">Jumlah Mengikuti Tes</th>
                                <th tabindex="0" aria-controls="exam_data_table" rowspan="1" colspan="1"
                                    style="width: 125px; text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($period->subjects as $subject)
                                <tr>
                                    <td tabindex="0">{{ $subject->name }}</td>
                                    <td style="text-align: center;">{{ $subject->pivot->number_of_lab_assistant }}</td>
                                    <td style="text-align: center;">random({{ rand(9,27) }})</td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a role="button"
                                                href="{{ route('admin.active-period.exam-selection.exam-data-detail', $subject->pivot->id) }}"
                                                class="btn btn-sm btn-success">Lihat Data</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="text-align: center" rowspan="1" colspan="1">Nama Mata Kuliah</th>
                                <th style="text-align: center" rowspan="1" colspan="1">Kuota Asisten</th>
                                <th style="text-align: center" rowspan="1" colspan="1">Jumlah Mengikuti Tes</th>
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
            $('#exam_data_table').DataTable({
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
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: "excel",
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: "csv",
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    "colvis"
                ]
            }).buttons().container().appendTo('#exam_data_table_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
