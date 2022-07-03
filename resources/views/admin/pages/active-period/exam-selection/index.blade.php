@extends('admin.layouts.app')

@section('content')
    <div class="p-2">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title font-weight-bold">Data Soal dan Kunci Jawaban Mata Kuliah Periode {{ $period->name }}</h2>
            </div>

            <div class="card-body">
                <div id="period_subject_table_wrapper" class="dataTables_wrapper dt-bootstrap4 w-100">
                    <table id="period_subject_table"
                        class="table table-bordered table-hover dataTable dtr-inline collapsed w-100"
                        aria-describedby="period_subject_table_info">
                        <thead>
                            <tr>
                                <th style="text-align: center" tabindex="0" aria-controls="period_subject_table"
                                    rowspan="1" colspan="1">Nama Mata Kuliah</th>
                                <th style="text-align: center" tabindex="0" aria-controls="period_subject_table"
                                    rowspan="1" colspan="1">Kuota Asisten</th>
                                <th style="text-align: center" tabindex="0" aria-controls="period_subject_table"
                                    rowspan="1" colspan="1">Tanggal Awal Ujian</th>
                                <th style="text-align: center" tabindex="0" aria-controls="period_subject_table"
                                    rowspan="1" colspan="1">Tanggal Akhir Ujian</th>
                                <th tabindex="0" aria-controls="period_subject_table" rowspan="1" colspan="1"
                                    style="width: 125px; text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($period->subjects as $subject)
                                <tr>
                                    <td tabindex="0">{{ $subject->name }}</td>
                                    <td style="text-align: center;">{{ $subject->pivot->number_of_lab_assistant }}</td>
                                    <td style="text-align: center;">{{ $subject->pivot->exam_start }}</td>
                                    <td style="text-align: center;">{{ $subject->pivot->exam_end }}</td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a role="button"
                                                href="{{ route('admin.active-period.exam-selection.subject.question.index', $subject->pivot->id) }}"
                                                class="btn btn-sm btn-success">Lihat Soal dan Kunci</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="text-align: center" rowspan="1" colspan="1">Nama Mata Kuliah</th>
                                <th style="text-align: center" rowspan="1" colspan="1">Kuota Asisten</th>
                                <th style="text-align: center" rowspan="1" colspan="1">Tanggal Awal Ujian</th>
                                <th style="text-align: center" rowspan="1" colspan="1">Tanggal Akhir Ujian</th>
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
            }).buttons().container().appendTo('#period_subject_table_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
