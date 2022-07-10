@extends('admin.layouts.app')

@section('content')
    <div class="p-2">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="card-title font-weight-bold">Soal Ujian Seleksi Mata Kuliah
                        "{{ $period_subject->subject->name }}"</h2>
                    <a href="{{ route('admin.active-period.exam-selection.subject.question.create', [$period_subject]) }}"
                        class="btn btn-success">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Soal
                    </a>
                </div>
                <div id="questions_container">
                    @forelse ($period_subject->questions as $question)
                        <div style=" border-left: 5px solid #34d399;"
                            class="d-flex justify-content-between mb-4 p-2 rounded shadow-sm bg-white question-contaier">
                            <p style="width: 3.5%" class="d-block font-weight-bold text-center m-0 ">
                                {{ $loop->index + 1 }}
                            </p>
                            <div style="width: 90%;" class="pl-2">
                                <div class="d-flex justify-content-between mb-2 ">
                                    <p style="width: 10%; font-weight: 600" class="d-block m-0">Tipe Soal</p>
                                    <p class="d-block m-0 ">:</p>
                                    <p style="width: 88%" class="d-block m-0 text-uppercase">{{ $question->type }}</p>
                                </div>

                                <div class="d-flex justify-content-between ">
                                    <p style="width: 10%; font-weight: 600" class="d-block m-0">Teks Soal</p>
                                    <p class="d-block m-0">:</p>
                                    <p style="width: 88%" class="d-block m-0">{{ $question->text }}</p>
                                </div>

                                @if ($question->choices->count() > 0)
                                    <div class="d-flex justify-content-between mt-2 ">
                                        <p style="width: 10%; font-weight: 600" class="d-block m-0">Pilihan</p>
                                        <p class="d-block m-0">:</p>
                                        <div style="width: 88%" class="">
                                            <ul class="pl-4">
                                                @foreach ($question->choices as $choice)
                                                    <li
                                                        class="mb-2 {{ $choice->is_true ? 'text-success font-weight-bold' : '' }} ">
                                                        {{ $choice->text }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif

                                <div
                                    class="d-flex justify-content-between {{ $question->choices->count() > 0 ? '' : 'mt-2' }}">
                                    <p style="width: 10%; font-weight: 600" class="d-block m-0">Skor</p>
                                    <p class="d-block m-0">:</p>
                                    <p style="width: 88%" class="d-block m-0"><span
                                            class="badge badge-success">{{ $question->score }}
                                            poin</span></p>
                                </div>
                            </div>
                            <div style="width: 4.5%" class="d-flex flex-column align-items-center actions-container">
                                <!-- Edit Question Button -->
                                <button type="button" class="btn btn-sm btn-primary rounded-circle mb-2"
                                    data-toggle="modal" data-target="#questionEditFormModal{{ $question->id }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <!-- Edit Question Modal -->
                                <div class="modal fade" id="questionEditFormModal{{ $question->id }}" tabindex="-1"
                                    data-backdrop="static" data-keyboard="false"
                                    aria-labelledby="questionEditFormModalLabel{{ $question->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold"
                                                    id="questionEditFormModalLabel{{ $question->id }}">
                                                    Ubah Soal
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="name">Tipe Soal</label>
                                                        <input type="text" id="name" name="name"
                                                            class="form-control text-uppercase" required autocomplete="off"
                                                            placeholder="Nama mata kuliah"
                                                            value="{{ $question->type }}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text_{{ $question->id }}">Teks Soal</label>
                                                        <textarea id="text_{{ $question->id }}" name="text" class="d-none">
                                                            {{ $question->text }}
                                                        </textarea>
                                                        <span id="textContent_{{ $question->id }}" 
                                                            class="d-block w-100 py-1 px-2 overflow-hidden rounded border question-text-content" 
                                                            role="textbox" contenteditable>
                                                            {{ $question->text }}
                                                        </span>
                                                    </div>
                                                    @if ($question->choices->count() > 0)
                                                        <p class="d-block m-0 mb-2 font-weight-bold">Pilihan Jawaban</p>
                                                        <div id="question_{{ $question->id }}_choices_container">
                                                            @foreach ($question->choices as $choice)
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <input type="radio" required class="check-choices" name="question_{{ $question->id }}_choices" 
                                                                                id="choice_{{ $choice->id }}_question_{{ $question->id }}" value="choice_{{ $loop->index }}" {{ $choice->is_true ? 'checked' : '' }}>
                                                                        </div>
                                                                    </div>
                                                                    <input type="text" required autocomplete="off" class="form-control {{ $choice->is_true ? 'text-primary' : '' }}" 
                                                                        name="choice_{{ $choice->id }}_text" 
                                                                        id="choice_{{ $choice->id }}_text"
                                                                        value="{{ $choice->text }}">
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                    <div class="form-group">
                                                        <label for="score{{ $question->id }}">Skor Soal</label>
                                                        <input type="number" id="score{{ $question->id }}" name="score" class="form-control question-score" value="{{ $question->score }}" required min="0">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">
                                                        SIMPAN PERUBAHAN
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete Question Button -->
                                <button type="button" class="btn btn-sm btn-danger rounded-circle" data-toggle="modal"
                                data-target="#confirmDeleteQuestionModal{{ $question->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <!-- Delete Subject Modal -->
                                <div class="modal fade" id="confirmDeleteQuestionModal{{ $question->id }}"
                                    tabindex="-1" data-backdrop="static" data-keyboard="false"
                                    aria-labelledby="confirmDeleteQuestionModalLabel{{ $question->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold"
                                                    id="confirmDeleteQuestionModalLabel{{ $question->id }}">
                                                    Hapus Soal
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>
                                                    Yakin untuk menghapus soal
                                                    <br>
                                                    "<span class="text-info">{{ $question->text }}</span>" 
                                                    @if ($question->choices->count() > 0)
                                                        beserta pilihan jawabannya
                                                    @endif ?
                                                </h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">BATALKAN
                                                </button>
                                                <button type="button" class="btn btn-danger">
                                                    HAPUS DATA
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p style="border-left: 5px solid #34d399; background-color: #ecfdf5;" class="d-block m-0 p-2">
                            Belum Ada Soal</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $(".question-text-content").keyup(function (event) { 
                let id = $(this).attr("id").split("_")[1];
                $("#text_"+id).val($(this).text());
            });
            $(".check-choices").change(function () {
                let id = $(this).attr("id").split("_")[1];
                let question_id = $(this).attr("id").split("_")[3];
                $("#question_"+question_id+"_choices_container > .input-group > input[type=text]").removeClass("text-primary");
                $("#choice_"+id+"_text").addClass("text-primary");
            });
        });
    </script>
@endsection
