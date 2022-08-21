@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title font-weight-bold">Data Presensi Asisten Praktikum Mata Kuliah {{
                    $period_subject->subject->name }}</h2>
            </div>
        </div>

        <div class="card-body">
            <div id="period_subject_table_wrapper" class="dataTables_wrapper dt-bootstrap4 w-100">
                <table id="period_subject_table"
                    class="table table-bordered table-hover dataTable dtr-inline collapsed w-100"
                    aria-describedby="period_subject_table_info">
                    <thead>
                        <tr>
                            <th style="text-align: center" tabindex="0" aria-controls="period_subject_table" rowspan="1"
                                colspan="1">Nama Kelas</th>
                            <th style="text-align: center" tabindex="0" aria-controls="period_subject_table" rowspan="1"
                                colspan="1">Jumlah Asisten</th>
                            <th tabindex="0" aria-controls="period_subject_table" rowspan="1" colspan="1"
                                style="width: 125px; text-align: center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($period_subject->classrooms as $classroom)
                        <tr>
                            <td tabindex="0">Kelas {{ $classroom->name }}</td>
                            <td style="text-align: center;">{{ $classroom->schedule ?
                                $classroom->schedule->psrs_count : 0}}</td>
                            <td>
                                @if ($classroom->schedule)
                                <a href="{{ route('admin.assistant.presence-show-assistant', [$period_subject, $classroom]) }}"
                                    class="btn btn-sm btn-block btn-success">Lihat Detail</a>
                                @else
                                <button disabled="disabled" class="btn btn-sm btn-block btn-secondary">Belum ada
                                    asisten</button>
                                @endif
                            </td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="text-align: center" rowspan="1" colspan="1">Nama Kelas</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Jumlah Asisten</th>
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
                            columns: [0, 1]
                        }
                    },
                    {
                        extend: "excel",
                        exportOptions: {
                            columns: [0, 1]
                        }
                    },
                    {
                        extend: "csv",
                        exportOptions: {
                            columns: [0, 1]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0, 1]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1]
                        }
                    },
                    "colvis"
                ]
            }).buttons().container().appendTo('#period_subject_table_wrapper .col-md-6:eq(0)');
        });
</script>
@endsection
