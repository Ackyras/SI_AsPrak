@extends('admin.layouts.app')

@section('content')
    <div class="p-2">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title font-weight-bold">Data Tes Mata Kuliah XXXX YYYY</h2>
            </div>

            <div class="card-body">
                <div id="exam_data_table_wrapper" class="dataTables_wrapper dt-bootstrap4 w-100">
                    <table id="exam_data_table"
                        class="table table-bordered table-hover dataTable dtr-inline collapsed w-100"
                        aria-describedby="exam_data_table_info">
                        <thead>
                            <tr>
                                <th style="text-align: center" tabindex="0" aria-controls="exam_data_table"
                                    rowspan="1" colspan="1">Nama</th>
                                <th style="text-align: center" tabindex="0" aria-controls="exam_data_table"
                                    rowspan="1" colspan="1">NIM</th>
                                <th style="text-align: center" tabindex="0" aria-controls="exam_data_table"
                                    rowspan="1" colspan="1">Waktu Pengerjaan</th>
                                <th tabindex="0" aria-controls="exam_data_table" rowspan="1" colspan="1"
                                    style="width: 125px; text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td tabindex="0">Nama Orang {{ rand(1,22) }}</td>
                                <td style="text-align: center;">1181400{{ rand(11,99) }}</td>
                                <td style="text-align: center;">0{{ rand(0,1) }}:{{ rand(11,59) }}:{{ rand(11,59) }}</td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a role="button"
                                            target="_blank"
                                            href="{{ route('admin.active-period.exam-selection.registrar-exam-data', [1,1]) }}"
                                            class="btn btn-sm btn-success">Periksa Jawaban</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td tabindex="0">Nama Orang {{ rand(1,22) }}</td>
                                <td style="text-align: center;">1181400{{ rand(11,99) }}</td>
                                <td style="text-align: center;">0{{ rand(0,1) }}:{{ rand(11,59) }}:{{ rand(11,59) }}</td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a role="button"
                                            target="_blank"
                                            href="{{ route('admin.active-period.exam-selection.registrar-exam-data', [1,1]) }}"
                                            class="btn btn-sm btn-success">Periksa Jawaban</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td tabindex="0">Nama Orang {{ rand(1,22) }}</td>
                                <td style="text-align: center;">1181400{{ rand(11,99) }}</td>
                                <td style="text-align: center;">0{{ rand(0,1) }}:{{ rand(11,59) }}:{{ rand(11,59) }}</td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a role="button"
                                            target="_blank"
                                            href="{{ route('admin.active-period.exam-selection.registrar-exam-data', [1,1]) }}"
                                            class="btn btn-sm btn-success">Periksa Jawaban</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td tabindex="0">Nama Orang {{ rand(1,22) }}</td>
                                <td style="text-align: center;">1181400{{ rand(11,99) }}</td>
                                <td style="text-align: center;">0{{ rand(0,1) }}:{{ rand(11,59) }}:{{ rand(11,59) }}</td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a role="button"
                                            target="_blank"
                                            href="{{ route('admin.active-period.exam-selection.registrar-exam-data', [1,1]) }}"
                                            class="btn btn-sm btn-success">Periksa Jawaban</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td tabindex="0">Nama Orang {{ rand(1,22) }}</td>
                                <td style="text-align: center;">1181400{{ rand(11,99) }}</td>
                                <td style="text-align: center;">0{{ rand(0,1) }}:{{ rand(11,59) }}:{{ rand(11,59) }}</td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a role="button"
                                            target="_blank"
                                            href="{{ route('admin.active-period.exam-selection.registrar-exam-data', [1,1]) }}"
                                            class="btn btn-sm btn-success">Periksa Jawaban</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td tabindex="0">Nama Orang {{ rand(1,22) }}</td>
                                <td style="text-align: center;">1181400{{ rand(11,99) }}</td>
                                <td style="text-align: center;">0{{ rand(0,1) }}:{{ rand(11,59) }}:{{ rand(11,59) }}</td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a role="button"
                                            target="_blank"
                                            href="{{ route('admin.active-period.exam-selection.registrar-exam-data', [1,1]) }}"
                                            class="btn btn-sm btn-success">Periksa Jawaban</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="text-align: center" rowspan="1" colspan="1">Nama</th>
                                <th style="text-align: center" rowspan="1" colspan="1">NIM</th>
                                <th style="text-align: center" rowspan="1" colspan="1">Waktu Pengerjaan</th>
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
