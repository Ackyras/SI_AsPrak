@extends('layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title font-weight-bold">Data Mata Kuliah Periode {{ $period->name }}</h2>
        </div>

        <div class="card-body">
            <table id="period_subject_table" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                aria-describedby="period_subject_table_info">
                <thead>
                    <tr>
                        <th tabindex="0" aria-controls="period_subject_table" rowspan="1" colspan="1">Nama Mata Kuliah
                        </th>
                        <th tabindex="0" aria-controls="period_subject_table" rowspan="1" colspan="1">Kuota Asisten</th>
                        <th tabindex="0" aria-controls="period_subject_table" rowspan="1" colspan="1">Tanggal Awal Ujian
                        </th>
                        <th tabindex="0" aria-controls="period_subject_table" rowspan="1" colspan="1">Tanggal Akhir
                            Ujian</th>
                        <th tabindex="0" aria-controls="period_subject_table" rowspan="1" colspan="1">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($period->subjects as $subject)
                    <tr>
                        <td tabindex="0">{{ $subject->name }}</td>
                        <td>{{ $subject->pivot->number_of_lab_assistant }}</td>
                        {{-- <td>{{ $subject->pivot->exam_start }}</td>
                        <td>{{ $subject->pivot->exam_end }}</td> --}}
                        <td>{{ \Carbon\Carbon::parse($subject->pivot->exam_start)->toDayDateTimeString() }}</td>
                        <td>{{ \Carbon\Carbon::parse($subject->pivot->exam_end)->toDayDateTimeString() }}</td>
                        <td> <a href="#">Detail</a> </td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th rowspan="1" colspan="1">Nama Mata Kuliah</th>
                        <th rowspan="1" colspan="1">Kuota Asisten</th>
                        <th rowspan="1" colspan="1">Tanggal Awal Ujian</th>
                        <th rowspan="1" colspan="1">Tanggal Akhir Ujian</th>
                        <th rowspan="1" colspan="1">Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function () {
            $('#period_subject_table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
</script>
@endsection