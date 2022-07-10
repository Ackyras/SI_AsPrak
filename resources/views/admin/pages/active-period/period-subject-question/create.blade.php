@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h2 class="card-title font-weight-bold">Buat Soal Ujian Seleksi Mata Kuliah "{{ $period_subject->subject->name }}"</h2>
            </div>

            <div class="mb-3 w-100 d-flex justify-content-between align-items-center p-2 px-4 bg-light shadow-sm rounded">
                <div class="">
                    <h4 class="d-block text-center m-0 mb-1" id="questions_count">1</h5>
                    <p class="d-block text-center m-0 font-weight-bold">Jumlah Soal</p>
                </div>
                <div class="">
                    <h4 class="d-block text-center m-0 mb-1" id="scores_count">0</h5>
                    <p class="d-block text-center m-0 font-weight-bold">Total Skor</p>
                </div>
                <div class="">
                    <button type="button" class="btn btn-primary" id="addQuestionBtn">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>

            <form action="{{ route('admin.active-period.exam-selection.subject.question.store', [$period_subject]) }}" method="POST">
                @csrf
                <div class="w-100" id="questions_container">
                    <div class="bg-white rounded shadow-sm d-flex justify-content-between p-3 mb-3 question_container" id="question_0_container">
                        <div style="width: 89%; border-left: solid 5px #059669" class="pl-3">
                            <div class="form-group">
                                <label for="questionType_0">Tipe Soal</label>
                                <select name="questionType_0" id="questionType_0" class="custom-select select-question-type">
                                    <option selected disabled hidden>Pilih tipe soal</option>
                                    <option value="essay">Essay</option>
                                    <option value="pilihan berganda">Pilihan Berganda</option>
                                </select>
                            </div>
                            <div class="question-detail w-100" id="questionDetail_0"></div>
                        </div>
                        <div style="width: 10%" class="d-flex flex-column justify-content-center align-items-center">
                            <button type="button" class="d-block btn btn-danger rounded-circle delete-question-btn" id="deleteQuestion_0">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="w-100 d-flex justify-content-end">
                    <div class="w-25">
                        <button type="submit" class="btn btn-block btn-success">
                            SIMPAN SOAL DAN KUNCI
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        // CHOOSE QUSTION TYPE
        $("#questions_container").on("change", 
            ".select-question-type",    
            function (event) {
                let id = $(this).attr("id").split("_")[1];
                // $(this).attr("disabled", true);
                $("#questionDetail_"+id).html("");
                let question_text = ""
                    + "<div class=\"form-group\">"
                        + "<label for=\"questionText_"+id+"\">Teks Soal</label>"
                        + "<textarea id=\"questionText_"+id+"\" name=\"questionText_"+id+"\" class=\"d-none\" required>"
                        + "</textarea>"
                        + "<span id=\"questionTextContent_"+id+"\" class=\"d-block w-100 py-1 px-2 overflow-hidden rounded border question-text-content\" role=\"textbox\" contenteditable>"
                        + "</span>"
                    + "</div>"
                + "";
                $("#questionDetail_"+id).append(question_text);
                if($(this).val() == "pilihan berganda"){
                    let choices_section = ""
                        + "<p class=\"d-block m-0 mb-2 font-weight-bold\">Pilihan Jawaban</p>"
                        + "<div id=\"question_"+id+"_choices_container\">"
                            + "<div class=\"d-flex justify-content-between align-items-center mb-2\" id=\"choice_0_question_"+id+"_container\">"
                                + "<div style=\"width: 90%\" class=\"input-group\">"
                                    + "<div class=\"input-group-prepend\">"
                                        + "<div class=\"input-group-text\">"
                                            + "<input type=\"radio\" required name=\"question_"+id+"_choices\" value=\"choice_0\">"
                                        + "</div>"
                                    + "</div>"
                                    + "<input type=\"text\" required autocomplete=\"off\" class=\"form-control\" name=\"choice_0_question_"+id+"_text\" id=\"choice_0_question_"+id+"_text\">"
                                + "</div>"
                                + "<div style=\"width: 9.9%\" class=\"d-flex flex-column justify-content-center align-items-center\"></div>"
                            + "</div>"
                        + "</div>"
                        + "<button id=\"addQuestion_"+id+"_Choice\" type=\"button\" class=\"btn btn-sm btn-secondary pl-2 pr-3 mb-3 add-question-choice\">"
                            + "<i class=\"fas fa-plus mr-2\"></i>"
                            + "Tambah Pilihan"
                        + "</button>"
                    + "";
                    $("#questionDetail_"+id).append(choices_section);
                }
                let question_score = ""
                    + "<div class=\"form-group mb-0\">"
                        + "<label for=\"questionScore_"+id+"\">Skor Soal</label>"
                        + "<input type=\"number\" id=\"questionScore_"+id+"\" name=\"questionScore_"+id+"\" class=\"form-control question-score\" required min=\"0\">"
                    + "</div>"
                + "";
                $("#questionDetail_"+id).append(question_score);
            }
        );
        // AUTO GROWING TEXT AREA
        $("#questions_container").on(
            "keyup", 
            ".question_container .question-detail .form-group .question-text-content", 
            function (event) { 
                let id = $(this).attr("id").split("_")[1];
                let questionTextContent = event.target.innerText;
                $("#questionText_"+id).val(questionTextContent);
            }
        );
        // ADD NEW QUESTIOM
        $("#addQuestionBtn").click(function (event) { 
            event.preventDefault();
            let question_count = $("#questions_container .question_container").length;
            let question_id = 0;
            if( question_count > 0) {
                question_id = parseInt($("#questions_container .question_container").last().attr("id").split("_")[1]) + 1;
            }
            let new_question = ""
                + "<div class=\"bg-white rounded shadow-sm d-flex justify-content-between p-3 mb-3 question_container\" id=\"question_"+question_id+"_container\">"
                    + "<div style=\"width: 89%; border-left: solid 5px #059669\" class=\"pl-3\">"
                        + "<div class=\"form-group\">"
                            + "<label for=\"questionType_"+question_id+"\">Tipe Soal</label>"
                            + "<select name=\"questionType_"+question_id+"\" id=\"questionType_"+question_id+"\" class=\"custom-select select-question-type\">"
                                + "<option selected disabled hidden>Pilih tipe soal</option>"
                                + "<option value=\"essay\">Essay</option>"
                                + "<option value=\"pilihan berganda\">Pilihan Berganda</option>"
                            + "</select>"
                        + "</div>"
                        + "<div class=\"question-detail w-100\" id=\"questionDetail_"+question_id+"\"></div>"
                    + "</div>"
                    + "<div style=\"width: 10%\" class=\"d-flex flex-column justify-content-center align-items-center\">"
                        + "<button  type=\"button\" class=\"d-block btn btn-danger rounded-circle delete-question-btn\" id=\"deleteQuestion_"+question_id+"\">"
                            + "<i class=\"fas fa-times\"></i>"
                        + "</button>"
                    + "</div>"
                + "</div>"
            + "";
            $("#questions_container").append(new_question);
            let n = $("#questions_container .question_container").length;
            $("#questions_count").text(n);
        });
        // DELETE QUESTION
        $("#questions_container").on("click", ".question_container .delete-question-btn", function (event) {
            let id = $(this).attr("id").split("_")[1];
            $("#question_"+id+"_container").remove();
            let n = $("#questions_container .question_container").length;
            $("#questions_count").text(n);
            let all_score_fields = $(".question-score");
            let count = $(".question-score").length;
            let total_score = 0;
            for(let i=0; i<count; i++){
                let score_field = $(".question-score")[i];
                total_score += parseInt(score_field.value);
            }
            $("#scores_count").text(total_score);
        });
        // ADD NEW CHOICE FOR "MULTIPLE CHOICES"-TYPED QUESTION
        $("#questions_container").on(
            "click", 
            ".question_container .question-detail .add-question-choice", 
            function (event) { 
                let question_id = $(this).attr("id").split("_")[1];
                let choice_id = parseInt($("#question_"+question_id+"_choices_container input[type=text]").last().attr("id").split("_")[1]);
                choice_id += 1;
                let new_choice = ""
                    + "<div class=\"d-flex justify-content-between align-items-center mb-2\" id=\"choice_"+choice_id+"_question_"+question_id+"_container\">"
                        + "<div style=\"width: 90%\" class=\"input-group\">"
                            + "<div class=\"input-group-prepend\">"
                                + "<div class=\"input-group-text\">"
                                    + "<input type=\"radio\" required name=\"question_"+question_id+"_choices\" value=\"choice_"+choice_id+"\">"
                                + "</div>"
                            + "</div>"
                            + "<input type=\"text\" required autocomplete=\"off\" class=\"form-control\" name=\"choice_"+choice_id+"_question_"+question_id+"_text\" id=\"choice_"+choice_id+"_question_"+question_id+"_text\">"
                        + "</div>"
                        + "<div style=\"width: 9.9%\" class=\"d-flex flex-column justify-content-center align-items-center\">"
                            + "<button type=\"button\" class=\"btn btn-block delete-question-choice-btn\" id=\"deleteChoice_"+choice_id+"_Question_"+question_id+"\">"
                                + "<i class=\"fas fa-times text-secondary\" id=\"iconDeleteChoice_"+choice_id+"_Question_"+question_id+"\"></i>"
                            + "</button>"
                        + "</div>"
                    + "</div>"
                + "";
                $("#question_"+question_id+"_choices_container").append(new_choice);
            }
        );
        // DELETE CHOICE FROM "MULTIPLE CHOICES"-TYPED QUESTION
        $("#questions_container").on(
            "click", 
            ".question_container .question-detail .delete-question-choice-btn", 
            function (event) { 
                let choice_id = $(this).attr("id").split("_")[1];
                let question_id = $(this).attr("id").split("_")[3];
                $("#choice_"+choice_id+"_question_"+question_id+"_container").remove();
            }
        );
        // GET TOTAL SCORE
        $("#questions_container").on("change", 
            ".question-score",
            function (event) {
                let all_score_fields = $(".question-score");
                let count = $(".question-score").length;
                let total_score = 0;
                for(let i=0; i<count; i++){
                    let score_field = $(".question-score")[i];
                    total_score += parseInt(score_field.value);
                }
                $("#scores_count").text(total_score);
            }
        );
    });
</script>
@endsection