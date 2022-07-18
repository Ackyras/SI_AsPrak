@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title font-weight-bold">Data Tes Mata Kuliah {{ $period_subject->subject->name }}</h2>
        </div>

        <div class="card-body">
            <div id="exam_data_table_wrapper" class="dataTables_wrapper dt-bootstrap4 w-100">
                <table id="exam_data_table"
                    class="table table-bordered table-hover dataTable dtr-inline collapsed w-100"
                    aria-describedby="exam_data_table_info">
                    <thead>
                        <tr>
                            <th style="text-align: center" tabindex="0" aria-controls="exam_data_table" rowspan="1"
                                colspan="1">Nama</th>
                            <th style="text-align: center" tabindex="0" aria-controls="exam_data_table" rowspan="1"
                                colspan="1">NIM</th>
                            <th style="text-align: center" tabindex="0" aria-controls="exam_data_table" rowspan="1"
                                colspan="1">Skor Pilihan Ganda</th>
                            <th style="text-align: center" tabindex="0" aria-controls="exam_data_table" rowspan="1"
                                colspan="1">Skor Essay</th>
                            <th style="text-align: center" tabindex="0" aria-controls="exam_data_table" rowspan="1"
                                colspan="1">Skor Total</th>
                            <th style="text-align: center" tabindex="0" aria-controls="exam_data_table" rowspan="1"
                                colspan="1">Status Kelulusan</th>
                            <th tabindex="0" aria-controls="exam_data_table" rowspan="1" colspan="1"
                                style="width: 125px; text-align: center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($period_subject_registrar as $psr)
                        <tr>
                            <td tabindex="0">{{ $psr->registrar->name }}</td>
                            <td style="text-align: center;">{{ $psr->registrar->nim }}</td>
                            <td style="text-align: center;">{{ $psr->essay_score }} / {{ $period_subject->essay_score }}
                            </td>
                            <td style="text-align: center;">{{ $psr->choice_score }} / {{ $period_subject->choice_score
                                }}
                            </td>
                            <td style="text-align: center;">{{ $psr->choice_score + $psr->essay_score }} / {{
                                $period_subject->questions_sum_score }}</td>
                            <td style="text-align: center;">
                                {{ $psr->is_pass_exam_selection ? 'Lulus' : 'Gagal' }}
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a role="button" target="_blank"
                                        href="{{ route('admin.active-period.exam-selection.registrar-exam-data', [$period_subject,$psr->id]) }}"
                                        class="btn btn-sm btn-info">Periksa Jawaban</a>
                                    <form
                                        action="{{ route('admin.active-period.exam-selection.registrar.update-status', [$period_subject, $psr->id]) }}"
                                        method="post">
                                        @csrf
                                        <button type="submit" name="is_pass_exam_selection"
                                            value="{{ $psr->is_pass_exam_selection ? 0 : 1 }}"
                                            class="btn btn-sm btn-{{ $psr->is_pass_exam_selection ? 'danger' : 'success' }}">Nyatakan
                                            {{ $psr->is_pass_exam_selection ? 'tidak' : '' }} lulus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="text-align: center" rowspan="1" colspan="1">
                                Nama
                            </th>
                            <th style="text-align: center" rowspan="1" colspan="1">
                                NIM
                            </th>
                            <th style="text-align: center" rowspan="1" colspan="1">
                                Skor Pilihan Ganda
                            </th>
                            <th style="text-align: center" rowspan="1" colspan="1">
                                Skor Essay
                            </th>
                            <th style="text-align: center" rowspan="1" colspan="1">
                                Skor Total
                            </th>
                            <th style="text-align: center" rowspan="1" colspan="1">
                                Status Kelulusan
                            </th>
                            <th style="text-align: center" rowspan="1" colspan="1">
                                Aksi
                            </th>
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
