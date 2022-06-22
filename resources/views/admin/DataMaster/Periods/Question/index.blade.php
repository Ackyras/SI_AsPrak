@extends('layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title font-weight-bold">Soal {{ $periodsubject->subject->name }}</h2>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#subjectFormModal">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Soal
                </button>
            </div>

            <div class="card-body">
                <div id="period_subject_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    @forelse ($periodsubject->questions as $question)
                    <div class="row mb-3">
                        <div class="col-1 mb-1">
                            {{ $loop->index }}
                        </div>
                        <div class="col mt-2">
                            <div>
                                {{ $question->text }}
                            </div>
                            @if ($question->choices)
                            <div>
                                @forelse($question->choices as $choice)
                                <p class="{{ $choice->is_true ? 'text-green-400':''}} ">
                                    {{ $choice->text }}
                                </p>
                                @empty
                                @endforelse
                            </div>

                            @endif
                        </div>
                    </div>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Subject Modal -->
<div class="modal fade" id="subjectFormModal" tabindex="-1" data-backdrop="static" data-keyboard="false"
    aria-labelledby="subjectFormModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title font-weight-bold" id="subjectFormModalLabel">Mata Kuliah Baru</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST"
                action="{{ route('admin.data.master.period.subject.question.store', [$periodsubject->period, $periodsubject->subject, $periodsubject]) }}">
                @csrf
                <div class="modal-body">
                    {{-- <div class="form-group">
                        <label for="subject_id">Nama mata kuliah</label>
                        <select id="name" class="custom-select" name="subject_id">
                            <option selected disabled hidden>Pilih mata kuliah</option>
                            @forelse ($allsubjects as $subject)
                            <option value="{{ $subject->id }}" {{ old('subject_id')==$subject->id ? 'selected':'' }} >{{
                                $subject->name }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="number_of_lab_assistant">Kuota asisten praktikum</label>
                        <input type="text" id="number_of_lab_assistant" name="number_of_lab_assistant"
                            class="form-control" required value="{{ old('number_of_lab_assistant') }}"
                            autocomplete="off" placeholder="(masukkan angka)">
                    </div>
                    <div class="form-group">
                        <label for="exam_start">Tanggal mulai ujian</label>
                        <input type="datetime-local" id="exam_start" name="exam_start" class="form-control" required
                            value="{{ old('exam_start') }}" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="exam_end">Tanggal selesai ujian</label>
                        <input type="datetime-local" id="exam_end" name="exam_end" class="form-control" required
                            value="{{ old('exam_end') }}" autocomplete="off">
                    </div> --}}
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function () {
            $('#period_subject_table').DataTable({
                "paging"        : true,
                "lengthChange"  : false,
                "searching"     : true,
                "ordering"      : true,
                "info"          : true,
                "autoWidth"     : false,
                "responsive"    : true,
                "buttons"       : [
                    { extend: "copy",   exportOptions: { columns: [ 0, 1, 2, 3 ] } },
                    { extend: "excel",  exportOptions: { columns: [ 0, 1, 2, 3 ] } },
                    { extend: "csv",    exportOptions: { columns: [ 0, 1, 2, 3 ] } },
                    { extend: 'pdf',    exportOptions: { columns: [ 0, 1, 2, 3 ] } },
                    { extend: 'print',  exportOptions: { columns: [ 0, 1, 2, 3 ] } },
                    "colvis"
                ]
            }).buttons().container().appendTo('#period_subject_table_wrapper .col-md-6:eq(0)');
        });
</script>
@endsection
