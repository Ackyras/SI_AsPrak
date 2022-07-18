@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h2 class="card-title font-weight-bold">Soal Ujian Seleksi Mata Kuliah
                    "{{ $period_subject->subject->name }}"</h2>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addQuestionFormModal">
                    <i class="mr-2 fas fa-plus"></i>
                    Tambah Soal
                </button>
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

                        <div class="d-flex justify-content-between mb-2">
                            <p style="width: 10%; font-weight: 600" class="d-block m-0">Teks Soal</p>
                            <p class="d-block m-0">:</p>
                            <p style="width: 88%" class="d-block m-0">{{ $question->text }}</p>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <p style="width: 10%; font-weight: 600" class="d-block m-0">Gambar Soal</p>
                            <p class="d-block m-0">:</p>
                            @if (rand(1,5)%2==0)
                            <p style="width: 88%" class="d-block m-0 font-italic font-weight-bold text-secondary">Tidak
                                Ada Gambar Soal</p>
                            @else
                            <div style="width: 88%">
                                <button type="button" class="btn btn-sm btn-info show-image-btn"
                                    data-file="{{ rand(1,5)%2==0 ? 'dummy/PasFoto.jpg' : 'dummy/Poster.jpeg' }}"
                                    data-toggle="modal" data-target="#showStaticDataImageModal">
                                    Lihat Gambar
                                </button>
                            </div>
                            @endif
                        </div>

                        @if ($question->choices->count() > 0)
                        <div class="d-flex justify-content-between mt-2 ">
                            <p style="width: 10%; font-weight: 600" class="d-block m-0">Pilihan</p>
                            <p class="d-block m-0">:</p>
                            <div style="width: 88%" class="">
                                <ul class="pl-4">
                                    @foreach ($question->choices as $choice)
                                    <li class="mb-2 {{ $choice->is_true ? 'text-success font-weight-bold' : '' }} ">
                                        <p class="d-block m-0 mb-1">{{ $choice->text }}</p>
                                        @if (rand(1,5)%2==0)
                                        <p style="width: 88%"
                                            class="d-block m-0 font-italic font-weight-bold text-secondary">Tidak Ada
                                            Gambar Jawaban</p>
                                        @else
                                        <div style="width: 88%">
                                            <button type="button"
                                                class="btn btn-sm {{ $choice->is_true ? 'btn-success' : 'btn-secondary' }} show-image-btn"
                                                data-file="{{ rand(1,5)%2==0 ? 'dummy/PasFoto.jpg' : 'dummy/Poster.jpeg' }}"
                                                data-toggle="modal" data-target="#showStaticDataImageModal">
                                                Lihat Gambar Jawaban
                                            </button>
                                        </div>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif

                        <div class="d-flex justify-content-between {{ $question->choices->count() > 0 ? '' : 'mt-2' }}">
                            <p style="width: 10%; font-weight: 600" class="d-block m-0">Skor</p>
                            <p class="d-block m-0">:</p>
                            <p style="width: 88%" class="d-block m-0"><span class="badge badge-success">{{
                                    $question->score }}
                                    poin</span></p>
                        </div>
                    </div>
                    <div style="width: 4.5%" class="d-flex flex-column align-items-center actions-container">
                        <!-- Edit Question Button -->
                        <button type="button" class="btn btn-sm btn-primary rounded-circle mb-2" data-toggle="modal"
                            data-target="#questionEditFormModal{{ $question->id }}">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        <!-- Edit Question Modal -->
                        <div class="modal fade" id="questionEditFormModal{{ $question->id }}" tabindex="-1"
                            data-backdrop="static" data-keyboard="false"
                            aria-labelledby="questionEditFormModalLabel{{ $question->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                <div class="modal-content" style="overflow-y:auto;">
                                    <div class="modal-header">
                                        <h4 class="modal-title font-weight-bold"
                                            id="questionEditFormModalLabel{{ $question->id }}">
                                            Ubah Soal
                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <!-- TIPE SOAL -->
                                            <div class="form-group">
                                                <label for="type">Tipe Soal</label>
                                                <input type="text" id="type" name="type"
                                                    class="form-control text-uppercase" required autocomplete="off"
                                                    placeholder="Nama mata kuliah" value="{{ $question->type }}"
                                                    readonly>
                                            </div>
                                            <!-- TEKS SOAL -->
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
                                            <!-- HAPUS KALU SUDAH TIDAK DIGUNAKAN -->
                                            @php
                                            $random = rand(1,10);
                                            @endphp
                                            <!-- GAMBAR SOAL SAAT INI -->
                                            <p class="d-block m-0 mb-2 font-weight-bold">Gambar Soal</p>
                                            <div class="mb-3">
                                                @if ($random%2==0)
                                                <p class="d-block m-0 font-italic font-weight-bold text-secondary">Belum
                                                    ada gambar soal saat ini</p>
                                                @else
                                                <button type="button" class="btn btn-sm btn-info show-image-btn"
                                                    data-file="{{ rand(1,5)%2==0 ? 'dummy/PasFoto.jpg' : 'dummy/Poster.jpeg' }}"
                                                    data-toggle="modal" data-target="#showStaticDataImageModal">
                                                    Lihat gambar saat ini
                                                </button>
                                                @endif
                                            </div>
                                            <!-- TAMBAH JIKA BELUM ADA GAMBAR SOAL / UBAH JIKA SUDAH ADA GAMBAR SOAL -->
                                            <p class="d-block m-0 mb-2 font-weight-bold">{{ $random%2==0 ? 'Tambah ' :
                                                'Ubah ' }}Gambar Soal</p>
                                            <p class="d-block m-0 mb-2 text-danger"
                                                id="editQuestionFileError_{{ $question->id }}"></p>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-secondary edit-question-file-preview"
                                                        type="button" id="editQuestionImagePreview_{{ $question->id }}"
                                                        data-toggle="modal" data-target="#showFormImageModal">
                                                        Pratinjau
                                                    </button>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file"
                                                        class="custom-file-input edit-question-file-input" name="file"
                                                        id="editQuestionFile_{{ $question->id }}">
                                                    <label class="custom-file-label"
                                                        for="editQuestionFile_{{ $question->id }}">Pilih file soal (JPG,
                                                        JPEG, PNG) </label>
                                                </div>
                                            </div>
                                            <!-- BAGIAN PILIHAN UNTUK SOAL TIPE PILIHAN BERGANDA -->
                                            @if ($question->choices->count() > 0)
                                            <p class="d-block m-0 mb-2 font-weight-bold">Pilihan Jawaban</p>
                                            <div id="question_{{ $question->id }}_choices_container">
                                                @foreach ($question->choices as $choice)
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input type="radio" required class="check-choices"
                                                                name="question_{{ $question->id }}_choices"
                                                                id="choice_{{ $choice->id }}_question_{{ $question->id }}"
                                                                value="choice_{{ $loop->index }}" {{ $choice->is_true ?
                                                            'checked' : '' }}>
                                                        </div>
                                                    </div>
                                                    <input type="text" autocomplete="off"
                                                        class="form-control {{ $choice->is_true ? 'text-primary' : '' }}"
                                                        name="choice_{{ $choice->id }}_text"
                                                        id="choice_{{ $choice->id }}_text" value="{{ $choice->text }}">
                                                </div>
                                                @php
                                                $random2 = rand(1,10);
                                                @endphp
                                                <!-- GAMBAR JAWABAN SAAT INI -->
                                                <div style="padding-left: 38px;" class="mb-2">
                                                    @if ($random2%2==0)
                                                    <p class="d-block m-0 font-italic font-weight-bold text-secondary">
                                                        Belum ada gambar jawaban saat ini</p>
                                                    @else
                                                    <button type="button" class="btn btn-sm btn-success show-image-btn"
                                                        data-file="{{ rand(1,5)%2==0 ? 'dummy/PasFoto.jpg' : 'dummy/Poster.jpeg' }}"
                                                        data-toggle="modal" data-target="#showStaticDataImageModal">
                                                        Lihat Gambar Jawaban Saat Ini
                                                    </button>
                                                    @endif
                                                </div>
                                                <div style="padding-left: 38px;" class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <button
                                                            class="btn btn-outline-secondary preview-choice-file-edit"
                                                            type="button"
                                                            id="previewChoice_{{ $question->id }}_{{ $choice->id }}_file"
                                                            data-toggle="modal" data-target="#showFormImageModal">
                                                            Pratinjau
                                                        </button>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file"
                                                            class="custom-file-input edit-question-choice-file"
                                                            id="choice_{{ $question->id }}_{{ $choice->id }}_file"
                                                            name="choice_{{ $question->id }}_{{ $choice->id }}_file">
                                                        <label class="custom-file-label"
                                                            for="choice_{{ $question->id }}_{{ $choice->id }}_file">
                                                            Pilih file jawaban (JPG, JPEG, PNG)
                                                        </label>
                                                    </div>
                                                </div>
                                                <p style="padding-left: 38px;" class="d-block m-0 my-3 text-danger"
                                                    id="choice_{{ $question->id }}_{{ $choice->id }}_file_error"></p>
                                                @endforeach
                                            </div>
                                            @endif
                                            <div class="form-group">
                                                <label for="score{{ $question->id }}">Skor Soal</label>
                                                <input type="number" id="score{{ $question->id }}" name="score"
                                                    class="form-control question-score" value="{{ $question->score }}"
                                                    required min="0">
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
                        <div class="modal fade" id="confirmDeleteQuestionModal{{ $question->id }}" tabindex="-1"
                            data-backdrop="static" data-keyboard="false"
                            aria-labelledby="confirmDeleteQuestionModalLabel{{ $question->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                <div class="modal-content" style="overflow-y:auto;">
                                    <div class="modal-header">
                                        <h4 class="modal-title font-weight-bold"
                                            id="confirmDeleteQuestionModalLabel{{ $question->id }}">
                                            Hapus Soal
                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5> Anda akan menghapus soal berikut : </h5>
                                        <div class="d-flex justify-content-between mb-2 ">
                                            <p style="width: 20%; font-weight: 600" class="d-block m-0">Tipe Soal</p>
                                            <p class="d-block m-0 ">:</p>
                                            <p style="width: 78%" class="d-block m-0 text-uppercase">{{ $question->type
                                                }}</p>
                                        </div>

                                        <div class="d-flex justify-content-between mb-2">
                                            <p style="width: 20%; font-weight: 600" class="d-block m-0">Teks Soal</p>
                                            <p class="d-block m-0">:</p>
                                            <p style="width: 78%" class="d-block m-0">{{ $question->text }}</p>
                                        </div>

                                        <div
                                            class="d-flex justify-content-between align-items-center {{ $question->choices->count() > 0 ? '' : 'mb-2' }}">
                                            <p style="width: 20%; font-weight: 600" class="d-block m-0">Gambar Soal</p>
                                            <p class="d-block m-0">:</p>
                                            @if (rand(1,5)%2==0)
                                            <p style="width: 78%"
                                                class="d-block m-0 font-italic font-weight-bold text-secondary">Tidak
                                                Ada Gambar Soal</p>
                                            @else
                                            <div style="width: 78%">
                                                <button type="button" class="btn btn-sm btn-info show-image-btn"
                                                    data-file="{{ rand(1,5)%2==0 ? 'dummy/PasFoto.jpg' : 'dummy/Poster.jpeg' }}"
                                                    data-toggle="modal" data-target="#showStaticDataImageModal">
                                                    Lihat Gambar
                                                </button>
                                            </div>
                                            @endif
                                        </div>

                                        @if ($question->choices->count() > 0)
                                        <div class="d-flex justify-content-between mt-2 ">
                                            <p style="width: 20%; font-weight: 600" class="d-block m-0">Pilihan</p>
                                            <p class="d-block m-0">:</p>
                                            <div style="width: 78%" class="">
                                                <ul class="pl-4">
                                                    @foreach ($question->choices as $choice)
                                                    <li
                                                        class="mb-2 {{ $choice->is_true ? 'text-success font-weight-bold' : '' }} ">
                                                        <p class="d-block m-0 mb-1">{{ $choice->text }}</p>
                                                        @if (rand(1,5)%2==0)
                                                        <p style="width: 78%"
                                                            class="d-block m-0 font-italic font-weight-bold text-secondary">
                                                            Tidak Ada Gambar Jawaban</p>
                                                        @else
                                                        <div style="width: 78%">
                                                            <button type="button"
                                                                class="btn btn-sm {{ $choice->is_true ? 'btn-success' : 'btn-secondary' }} show-image-btn"
                                                                data-file="{{ rand(1,5)%2==0 ? 'dummy/PasFoto.jpg' : 'dummy/Poster.jpeg' }}"
                                                                data-toggle="modal"
                                                                data-target="#showStaticDataImageModal">
                                                                Lihat Gambar Jawaban
                                                            </button>
                                                        </div>
                                                        @endif
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        @endif

                                        <div
                                            class="d-flex justify-content-between {{ $question->choices->count() > 0 ? 'mb-2' : 'my-2' }}">
                                            <p style="width: 20%; font-weight: 600" class="d-block m-0">Skor</p>
                                            <p class="d-block m-0">:</p>
                                            <p style="width: 78%" class="d-block m-0">
                                                <span class="badge badge-success">{{ $question->score }}
                                                    poin
                                                </span>
                                            </p>
                                        </div>

                                        <h5>Lanjutkan aksi ini?</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATALKAN
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

<!-- Add Question Modal -->
<div class="modal fade" id="addQuestionFormModal" tabindex="-1" data-backdrop="static" data-keyboard="false"
    aria-labelledby="addQuestionFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" id="addQuestionFormModalDialog">
        <div class="modal-content" id="addQuestionFormModalContent" style="overflow-y:auto;">
            <div class="modal-header">
                <h3 class="modal-title font-weight-bold" id="addQuestionFormModalLabel">Soal Baru</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" enctype="multipart/form-data"
                action="{{ route('admin.active-period.exam-selection.subject.question.store', $period_subject) }}">
                @csrf
                <div class="modal-body" id="addQuestionFormModalBody">
                    <div class="form-group">
                        <label for="question_type">Tipe Soal</label>
                        <select id="question_type" class="custom-select" name="type">
                            <option selected disabled hidden>Pilih tipe soal</option>
                            <option value="essay">ESSAY</option>
                            <option value="pilihan berganda">PILIHAN BERGANDA</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                    </div>
                    <div class="question-detail w-100" id="questionDetail"></div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Show Static Data Image Modal -->
<div class="modal" id="showStaticDataImageModal" tabindex="-1" data-backdrop="static" data-keyboard="false"
    aria-labelledby="showStaticDataImageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="showStaticDataImageModalLabel">Gambar Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex justify-content-center" id="showStaticDataImageModalContent"></div>
        </div>
    </div>
</div>

<!-- Show Form-Input Image Modal -->
<div class="modal" id="showFormImageModal" tabindex="-1" data-backdrop="static" data-keyboard="false"
    aria-labelledby="showFormImageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="showFormImageModalLabel">Pratinjau Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex justify-content-center" id="showFormImageModalContent"></div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
            // AUTO GROWING TEXT AREA ON "EDIT QUESTION MODAL"
            $(".question-text-content").keyup(function (event) {
                let id = $(this).attr("id").split("_")[1];
                $("#text_"+id).val($(this).text());
            });
            // CHANGE CHECKED TRUE CHOICE ON "EDIT QUESTION MODAL"
            $(".check-choices").change(function () {
                let id = $(this).attr("id").split("_")[1];
                let question_id = $(this).attr("id").split("_")[3];
                $("#question_"+question_id+"_choices_container > .input-group > input[type=text]").removeClass("text-primary");
                $("#choice_"+id+"_text").addClass("text-primary");
            });
            // CHOOSE QUESTION TYPE ON "ADD QUESTION MODAL"
            $("#question_type").change(function () {
                $("#questionDetail").html("");
                let question_text = ""
                    + "<div class=\"form-group\" id=\"questionTextSection\">"
                        + "<label for=\"newQuestionText\">Teks Soal</label>"
                        + "<textarea id=\"newQuestionText\" name=\"text\" class=\"d-none\">"
                        + "</textarea>"
                        + "<span id=\"questionTextContent\" class=\"d-block w-100 py-1 px-2 overflow-hidden rounded border new-question-text-content\" role=\"textbox\" contenteditable>"
                        + "</span>"
                    + "</div>"
                    + "<p class=\"d-block m-0 mb-2 font-weight-bold\">Gambar Soal</p>"
                    + "<p class=\"d-block m-0 mb-2 text-danger\" id=\"questionFileError\"></p>"
                    + "<div class=\"input-group mb-3\">"
                        + "<div class=\"input-group-prepend\">"
                            + "<button class=\"btn btn-outline-secondary\" type=\"button\" id=\"questionImagePreview\" data-toggle=\"modal\" data-target=\"#showFormImageModal\">Pratinjau</button>"
                        + "</div>"
                        + "<div class=\"custom-file\">"
                            + "<input type=\"file\" class=\"custom-file-input\" name=\"image\" id=\"questionFile\">"
                            + "<label class=\"custom-file-label\" for=\"questionFile\">Pilih file soal (JPG, JPEG, PNG) </label>"
                        + "</div>"
                    + "</div>"
                + "";
                $("#questionDetail").append(question_text);
                if($(this).val() == "pilihan berganda"){
                    let choices_section = ""
                        + "<p class=\"d-block m-0 mb-2 font-weight-bold\">Pilihan Jawaban</p>"
                        + "<div id=\"question_choices_container\">"
                            + "<div class=\"w-100 mb-2 choice-container\" id=\"choice_0_container\">"
                                + "<div class=\"d-flex justify-content-between align-items-center mb-1\">"
                                    + "<div style=\"width: 90%\" class=\"input-group\">"
                                        + "<div class=\"input-group-prepend\">"
                                            + "<div class=\"input-group-text\">"
                                                + "<input type=\"radio\" required class=\"new-question-choices\" name=\"question_choices\" id=\"choice_0_radio\" value=\"0\">"
                                            + "</div>"
                                        + "</div>"
                                        + "<input type=\"text\" autocomplete=\"off\" class=\"form-control\" name=\"choice_0_text\" id=\"new_question_choice_0_text\">"
                                    + "</div>"
                                    + "<div style=\"width: 9.9%\" class=\"d-flex flex-column justify-content-center align-items-center\"></div>"
                                + "</div>"
                                + "<div class=\"d-flex justify-content-between align-items-center\">"
                                    + "<div style=\"width: 90%; padding-left:38px;\" class=\"input-group\">"
                                        + "<div class=\"input-group-prepend\">"
                                            + "<button class=\"btn btn-outline-secondary preview-choice-file\" type=\"button\" id=\"previewChoice_0_file\" data-toggle=\"modal\" data-target=\"#showFormImageModal\">Pratinjau</button>"
                                        + "</div>"
                                        + "<div class=\"custom-file\">"
                                            + "<input type=\"file\" class=\"custom-file-input\" id=\"choice_0_file\" name=\"choice_0_file\">"
                                            + "<label class=\"custom-file-label\" for=\"choice_0_file\">Pilih file jawaban (JPG, JPEG, PNG) </label>"
                                        + "</div>"
                                    + "</div>"
                                + "</div>"
                                + "<div class=\"d-flex justify-content-between align-items-center my-1\">"
                                    + "<div style=\"width: 90%; padding-left:38px;\" class=\"input-group\">"
                                        + "<p class=\"d-block m-0 text-danger\" id=\"choice_0_file_error\"></p>"
                                    + "</div>"
                                + "</div>"
                            + "</div>"
                        + "</div>"
                        + "<button id=\"add_new_question_choice\" type=\"button\" class=\"btn btn-sm btn-secondary pl-2 pr-3 mb-3 add-new-choice\">"
                            + "<i class=\"fas fa-plus mr-2\"></i>"
                            + "Tambah Pilihan"
                        + "</button>"
                    + "";
                    $("#questionDetail").append(choices_section);
                }
                let question_score = ""
                    + "<div class=\"form-group mb-0\">"
                        + "<label for=\"questionScore\">Skor Soal</label>"
                        + "<input type=\"number\" id=\"questionScore\" name=\"score\" class=\"form-control question-score\" required min=\"0\">"
                    + "</div>"
                + "";
                $("#questionDetail").append(question_score);
            });
            // AUTO GROWING TEXT AREA ON "ADD QUESTION MODAL"
            $("#questionDetail").keyup(
                "#questionTextSection #questionTextContent",
                function (event) {
                    if(event.target.classList.contains("new-question-text-content")){
                        let text = event.target.innerText;
                        $("#newQuestionText").val(text);
                    }
                }
            );
            // ADD NEW CHOICE ON "ADD QUESTION MODAL"
            $("#questionDetail").on(
                "click",
                "#add_new_question_choice",
                function () {
                    let choice_id = parseInt($("#question_choices_container input[type=text]").last().attr("id").split("_")[3]);
                    choice_id += 1;
                    let new_choice = ""
                        + "<div class=\"w-100 mb-2 choice-container\" id=\"choice_"+choice_id+"_container\">"
                            + "<div class=\"d-flex justify-content-between align-items-center mb-1 choice-text-section\">"
                                + "<div style=\"width: 90%\" class=\"input-group\">"
                                    + "<div class=\"input-group-prepend\">"
                                        + "<div class=\"input-group-text\">"
                                            + "<input type=\"radio\" required class=\"new-question-choices\" name=\"question_choices\" id=\"choice_"+choice_id+"_radio\" value=\""+choice_id+"\">"
                                        + "</div>"
                                    + "</div>"
                                    + "<input type=\"text\" autocomplete=\"off\" class=\"form-control\" name=\"choice_"+choice_id+"_text\" id=\"new_question_choice_"+choice_id+"_text\">"
                                + "</div>"
                                + "<div style=\"width: 9.9%\" class=\"d-flex flex-column justify-content-center align-items-center delete-choice-btn-container\">"
                                    + "<button type=\"button\" class=\"btn btn-block delete-choice-btn\" id=\"deleteChoice_"+choice_id+"\">"
                                        + "<i class=\"fas fa-times text-secondary\" id=\"iconDeleteChoice_"+choice_id+"\"></i>"
                                    + "</button>"
                                + "</div>"
                            + "</div>"
                            + "<div class=\"d-flex justify-content-between align-items-center\">"
                                + "<div style=\"width: 90%; padding-left:38px;\" class=\"input-group\">"
                                    + "<div class=\"input-group-prepend\">"
                                        + "<button class=\"btn btn-outline-secondary preview-choice-file\" type=\"button\" id=\"previewChoice_"+choice_id+"_file\" data-toggle=\"modal\" data-target=\"#showFormImageModal\">Pratinjau</button>"
                                    + "</div>"
                                    + "<div class=\"custom-file\">"
                                        + "<input type=\"file\" class=\"custom-file-input\" id=\"choice_"+choice_id+"_file\" name=\"choice_"+choice_id+"_file\">"
                                        + "<label class=\"custom-file-label\" for=\"choice_"+choice_id+"_file\">Pilih file jawaban (JPG, JPEG, PNG) </label>"
                                    + "</div>"
                                + "</div>"
                            + "</div>"
                            + "<div class=\"d-flex justify-content-between align-items-center my-1\">"
                                + "<div style=\"width: 90%; padding-left:38px;\" class=\"input-group\">"
                                    + "<p class=\"d-block m-0 text-danger\" id=\"choice_"+choice_id+"_file_error\"></p>"
                                + "</div>"
                            + "</div>"
                        + "</div>"
                    + "";
                    $("#question_choices_container").append(new_choice);
                }
            );
            // DELETE CHOICE ON "ADD QUESTION MODAL"
            $("#questionDetail").on(
                "click",
                "#question_choices_container .choice-container .choice-text-section .delete-choice-btn-container .delete-choice-btn",
                function () {
                    let choice_id = $(this).attr("id").split("_")[1];
                    $("#choice_"+choice_id+"_container").remove();
                }
            );
            // INPUT FILE VALIDATION ON "ADD QUESTION MODAL"
            $("#questionDetail").on(
                "change",
                "input[type=file]",
                function (event) {
                    let fileError;
                    if($(this).attr("id").includes("_")) {
                        let id = $(this).attr("id").split("_")[1];
                        fileError = document.getElementById("choice_"+id+"_file_error");
                    }else{
                        fileError = document.getElementById("questionFileError");
                    }
                    let inputField     = document.getElementById($(this).attr("id"));
                    let inputFieldFile = inputField.files[0];
                    let label          = $(this).siblings()[0];
                    if(inputFieldFile){
                        let allowedExtension = ["image/jpeg", "image/png", "image/jpg"];
                        if( allowedExtension.includes(inputFieldFile.type) ){
                            if( inputFieldFile.size < 2097152 ){
                                fileError.innerText = "";
                                label.innerText = inputFieldFile.name;
                            }else{
                                fileError.innerText = "";
                                label.innerText = "Pilih file gambar (JPG, JPEG, PNG) maks. 2MB";
                                fileError.innerText = "Mohon pilih file berukuran maks. 2MB";
                                inputField.value = null;
                            }
                        }else{
                            fileError.innerText = "";
                            label.innerText = "Pilih file gambar (JPG, JPEG, PNG) maks. 2MB";
                            fileError.innerText = "Mohon pilih file gambar (JPG, JPEG, atau PNG)";
                            inputField.value = null;
                        }
                    }
                }
            );
            // INPUT FILE VALIDATION FOR QUESTION ON "EDIT QUESTION MODAL"
            $(".edit-question-file-input").on("change", function (event) {
                let id          = $(this).attr("id").split("_")[1];
                let fileError   = document.getElementById("editQuestionFileError_"+id);

                let inputField     = document.getElementById($(this).attr("id"));
                let inputFieldFile = inputField.files[0];
                let label          = $(this).siblings()[0];

                if(inputFieldFile){
                    let allowedExtension = ["image/jpeg", "image/png", "image/jpg"];
                    if( allowedExtension.includes(inputFieldFile.type) ){
                        if( inputFieldFile.size < 2097152 ){
                            fileError.innerText = "";
                            label.innerText = inputFieldFile.name;
                        }else{
                            fileError.innerText = "";
                            label.innerText = "Pilih file gambar (JPG, JPEG, PNG) maks. 2MB";
                            fileError.innerText = "Mohon pilih file berukuran maks. 2MB";
                            inputField.value = null;
                        }
                    }else{
                        fileError.innerText = "";
                        label.innerText = "Pilih file gambar (JPG, JPEG, PNG) maks. 2MB";
                        fileError.innerText = "Mohon pilih file gambar (JPG, JPEG, atau PNG)";
                        inputField.value = null;
                    }
                }
            });
            // INPUT FILE VALIDATION FOR CHOICES ON "EDIT QUESTION MODAL"
            $(".edit-question-choice-file").on("change", function (event) {
                let question_id = $(this).attr("id").split("_")[1];
                let id          = $(this).attr("id").split("_")[2];
                let fileError   = document.getElementById("choice_"+question_id+"_"+id+"_file_error");

                let inputField     = document.getElementById($(this).attr("id"));
                let inputFieldFile = inputField.files[0];
                let label          = $(this).siblings()[0];

                if(inputFieldFile){
                    let allowedExtension = ["image/jpeg", "image/png", "image/jpg"];
                    if( allowedExtension.includes(inputFieldFile.type) ){
                        if( inputFieldFile.size < 2097152 ){
                            fileError.innerText = "";
                            label.innerText = inputFieldFile.name;
                        }else{
                            fileError.innerText = "";
                            label.innerText = "Pilih file gambar (JPG, JPEG, PNG) maks. 2MB";
                            fileError.innerText = "Mohon pilih file berukuran maks. 2MB";
                            inputField.value = null;
                        }
                    }else{
                        fileError.innerText = "";
                        label.innerText = "Pilih file gambar (JPG, JPEG, PNG) maks. 2MB";
                        fileError.innerText = "Mohon pilih file gambar (JPG, JPEG, atau PNG)";
                        inputField.value = null;
                    }
                }
            });
            // CHANGE CHECKED TRUE CHOICE ON "ADD QUESTION MODAL"
            $("#questionDetail").on(
                "change",
                ".new-question-choices",
                function () {
                    let id = $(this).attr("id").split("_")[1];
                    $("#question_choices_container .choice-container input[type=text]").removeClass("text-primary");
                    $("#new_question_choice_"+id+"_text").addClass("text-primary");
                }
            );
            // QUESTION IMAGE PREVIEW ON "ADD QUESTION MODAL"
            $("#questionDetail").on(
                "click",
                "#questionImagePreview",
                function (event) {
                    let inputField     = document.getElementById("questionFile");
                    let inputFieldFile = inputField.files[0];
                    let element;
                    if (inputFieldFile) {
                        element = `
                            <div style="width: 87.5%" class="mx-auto">
                                <img src="`+URL.createObjectURL(inputFieldFile)+`" class="w-100 h-auto">
                            </div>
                        `;
                    }else{
                        element = `
                            <div style="width:75%; aspect-ratio:1/1;" class="mx-auto d-flex flex-column justify-content-center align-items-center">
                                <h6 class=\"d-block m-0 text-center text-secondary\">Belum ada file gambar yang dipilih.</h6>
                            </div>
                        `;
                    }
                    let modal = $("#showFormImageModal");
                    modal.find('.modal-body').html(element);
                }
            );
            // QUESTION IMAGE PREVIEW ON "EDIT QUESTION MODAL"
            $(".edit-question-file-preview").on(
                "click",
                function (event) {
                    let id = $(this).attr("id").split("_")[1];
                    let inputField     = document.getElementById("editQuestionFile_"+id);
                    let inputFieldFile = inputField.files[0];
                    let element;
                    if (inputFieldFile) {
                        element = `
                            <div style="width: 87.5%" class="mx-auto">
                                <img src="`+URL.createObjectURL(inputFieldFile)+`" class="w-100 h-auto">
                            </div>
                        `;
                    }else{
                        element = `
                            <div style="width:75%; aspect-ratio:1/1;" class="mx-auto d-flex flex-column justify-content-center align-items-center">
                                <h6 class=\"d-block m-0 text-center text-secondary\">Belum ada file gambar yang dipilih.</h6>
                            </div>
                        `;
                    }
                    let modal = $("#showFormImageModal");
                    modal.find('.modal-body').html(element);
                }
            );
            // CHOICE IMAGE PREVIEW ON "ADD QUESTION MODAL"
            $("#questionDetail").on(
                "click",
                ".preview-choice-file",
                function (event) {
                    let id = $(this).attr("id").split("_")[1];
                    let inputField     = document.getElementById("choice_"+id+"_file");
                    let inputFieldFile = inputField.files[0];
                    let element;
                    if (inputFieldFile) {
                        element = `
                            <div style="width: 87.5%" class="mx-auto">
                                <img src="`+URL.createObjectURL(inputFieldFile)+`" class="w-100 h-auto">
                            </div>
                        `;
                    }else{
                        element = `
                            <div style="width:75%; aspect-ratio:1/1;" class="mx-auto d-flex flex-column justify-content-center align-items-center">
                                <h6 class=\"d-block m-0 text-center text-secondary\">Belum ada file gambar yang dipilih.</h6>
                            </div>
                        `;
                    }
                    let modal = $("#showFormImageModal");
                    modal.find('.modal-body').html(element);
                }
            );
            // CHOICE IMAGE PREVIEW ON "ADD QUESTION MODAL"
            $(".preview-choice-file-edit").on(
                "click",
                function (event) {
                    let question_id = $(this).attr("id").split("_")[1];
                    let id          = $(this).attr("id").split("_")[2];

                    let inputField     = document.getElementById("choice_"+question_id+"_"+id+"_file");
                    let inputFieldFile = inputField.files[0];
                    let element;
                    if (inputFieldFile) {
                        element = `
                            <div style="width: 87.5%" class="mx-auto">
                                <img src="`+URL.createObjectURL(inputFieldFile)+`" class="w-100 h-auto">
                            </div>
                        `;
                    }else{
                        element = `
                            <div style="width:75%; aspect-ratio:1/1;" class="mx-auto d-flex flex-column justify-content-center align-items-center">
                                <h6 class=\"d-block m-0 text-center text-secondary\">Belum ada file gambar yang dipilih.</h6>
                            </div>
                        `;
                    }
                    let modal = $("#showFormImageModal");
                    modal.find('.modal-body').html(element);
                }
            );
            // IMAGE PREVIEW MODAL FOR PRELOADED DATA
            $(".show-image-btn").on("click", function (event) {
                if(event.target.classList.contains('show-image-btn')){
                    event.preventDefault();
                    let btn = event.target;
                    let file = btn.getAttribute("data-file");
                    let modal = $("#showStaticDataImageModal");
                    let img_element = `<div style="width: 87.5%" class="mx-auto"> <img src="{{ asset('storage/`+file+`') }}" class="w-100 h-auto"></div>`;
                    modal.find('.modal-body').html(img_element);
                }
            });
        });
</script>
@endsection
