@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title font-weight-bold">Detail Hasil Tes</h2>
        </div>

        <div class="card-body">
            <!-- DATA PENDAFTAR -->
            <div style="background-color: #f9fafb" class="p-3 mb-3 border rounded shadow-sm w-100">
                <!-- NAMA PENDAFTAR -->
                <h6 class="mb-3 d-flex w-100 justify-content-between">
                    <span style="width: 15%; font-weight: 600" class="m-0 d-block">Nama Pendaftar</span>
                    <span style="width: 84%" class="m-0 d-block">: {{ $psr->registrar->name }}</span>
                </h6>
                <!-- NIM PENDAFTAR -->
                <h6 class="mb-3 d-flex w-100 justify-content-between">
                    <span style="width: 15%; font-weight: 600" class="m-0 d-block">NIM Pendaftar</span>
                    <span style="width: 84%" class="m-0 d-block">: {{ $psr->registrar->nim }}</span>
                </h6>
                <!-- MATA KULIAH -->
                <h6 class="mb-3 d-flex w-100 justify-content-between">
                    <span style="width: 15%; font-weight: 600" class="m-0 d-block">Mata Kuliah</span>
                    <span style="width: 84%" class="m-0 d-block">: {{ $period_subject->subject->name }}</span>
                </h6>
                <!-- SKOR PILIHAN GANDA -->
                <h6 class="mb-3 d-flex w-100 justify-content-between">
                    <span style="width: 15%; font-weight: 600" class="m-0 d-block">Skor Pilihan Ganda</span>
                    <span style="width: 84%" class="m-0 d-block">: {{ $psr->choice_score }} /
                        {{ $period_subject->choice_score }}</span>
                </h6>
                <!-- SKOR ESSAY -->
                <h6 class="mb-3 d-flex w-100 justify-content-between">
                    <span style="width: 15%; font-weight: 600" class="m-0 d-block">Skor Essay</span>
                    <span style="width: 84%" class="m-0 d-block">: {{ $psr->essay_score }} /
                        {{ $period_subject->essay_score }}</span>
                </h6>
                <!-- SKOR TOTAL -->
                <h6 class="mb-3 d-flex w-100 justify-content-between">
                    <span style="width: 15%; font-weight: 600" class="m-0 d-block">Skor Total</span>
                    <span style="width: 84%" class="m-0 d-block">: {{ $psr->choice_score + $psr->essay_score }} /
                        {{ $period_subject->questions_sum_score }}</span>
                </h6>
            </div>

            @forelse ($period_subject->questions as $question)
            @if ($question->type == 'essay')
            <div class="p-3 mb-3 bg-white rounded shadow-sm w-100">
                <!-- QUESTION TEXT -->
                <h6 class="mb-3 d-block">
                    {{ $question->text }}
                </h6>
                <!-- VIEW ANSWER MODAL BUTTON -->
                @if ($psr->answers->contains($question)) <button style="background-color: #10b981; color: #fff"
                    type="button" class="mb-3 btn btn-sm" data-toggle="modal"
                    data-target="#viewAnswerImageModal_{{ $question->id }}">
                    <i class="mr-2 fas fa-eye"></i>
                    Lihat Jawaban
                </button>
                <div class="modal fade" id="viewAnswerImageModal_{{ $question->id }}" tabindex="-1"
                    data-backdrop="static" data-keyboard="false"
                    aria-labelledby="viewAnswerImageModalLabel_{{ $question->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title font-weight-bold"
                                    id="viewAnswerImageModalLabel_{{ $question->id }}">Jawaban

                                </h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if ($psr->answers->find($question)->pivot->extension == 'pdf')
                                {{ $psr->answers->find($question)->pivot->extension }}
                                <embed src="{{ asset('storage/'. $psr->answers->find($question)->pivot->file) }}"
                                    type="application/pdf" width="640" height="720">
                                @else
                                {{ $psr->answers->find($question)->pivot->extension }}
                                <img style="width: 87.5%" class="mx-auto d-block"
                                    src="{{ asset('storage/'. $psr->answers->find($question)->pivot->file) }}" alt="">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <button disabled style="background-color: #10b981; color: #fff" type="button" class="mb-3 btn btn-sm"
                    data-toggle="modal" data-target="#viewAnswerImageModal_{{ $question->id }}">
                    <i class="mr-2 fas fa-eye"></i>
                    Lihat Jawaban
                    <small>
                        Peserta tidak menjawab
                    </small>
                    @endif
                </button>
                <div style="width: 25%; background-color: #f3f4f6"
                    class="p-2 d-flex justify-content-between align-items-center">
                    @if ($psr->answers->contains($question))
                    <h6 class="m-0 d-block text-success">
                        <span style="font-weight: 600">Skor :
                            {{ $psr->answers->find($question)->pivot->score }}
                            / {{ $question->score }}</span>
                    </h6>
                    @else
                    <h6 class="m-0 d-block text-danger">
                        <span style="font-weight: 600">Peserta tidak memberikan jawaban <small>(Skor
                                otomatis bernilai
                                0)</small></span>
                    </h6>
                    @endif
                    <button @disabled(!$psr->answers->contains($question)) type="button"
                        class="btn btn-sm btn-primary"
                        data-toggle="modal" data-target="#scoreModal_{{ $question->id }}">
                        Ubah Skor
                    </button>
                    <div class="modal fade" id="scoreModal_{{ $question->id }}" tabindex="-1" data-backdrop="static"
                        data-keyboard="false" aria-labelledby="scoreModalLabel_{{ $question->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title font-weight-bold" id="scoreModalLabel_{{ $question->id }}">
                                        Skor Jawaban Soal
                                        No.1</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST"
                                    action="{{ route('admin.active-period.exam-selection.registrar.update-score', [$period_subject, $psr, $psr->answers->find($question)->pivot->id]) }}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="score">Skor</label>
                                            <input type="number" id="score" name="score" class="form-control" required
                                                autocomplete="off" value="{{ $psr->answers->contains($question) }}"
                                                min="0" max="{{ $question->score }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">SIMPAN
                                            PERUBAHAN</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="p-3 mb-3 bg-white rounded shadow-sm w-100">
                <h6 class="mb-3 d-block">
                    {{ $question->text }}
                </h6>
                <ul class="pl-4">
                    @forelse ($question->choices as $choice)
                    @if ($psr->answers->where('id', $question->id)->first())
                    <li class="mb-2
                        @if ($psr->answers->where('id', $question->id)->first())
                            @if ($psr->answers->where('id', $question->id)->first()->pivot->choice_id == $choice->id && $choice->is_true)
                                font-weight-bolder text-success
                            @else
                                @if($psr->answers->where('id', $question->id)->first()->pivot->choice_id == $choice->id)
                                    font-weight-bolder text-danger
                                @else
                                    @if($choice->is_true)
                                    font-weight-bolder text-info
                                    @endif
                                @endif
                            @endif
                        @endif
                    ">
                        {{ $choice->option }}.) {{ $choice->text }}
                    </li>
                    @else
                    <li class="mb-2
                        @if ($choice->is_true)
                            font-weight-bolder text-info
                        @endif
                    ">
                        {{ $choice->option }}.) {{ $choice->text }}
                    </li>
                    @endif
                    @empty
                    @endforelse
                </ul>
                <div style="width: 25%; background-color: #fee2e215"
                    class="p-2 d-flex justify-content-between align-items-center">
                    @if ($psr->answers->where('id', $question->id)->first()->score = $question->score)
                    <h6 class="m-0 d-block text-success">
                        <span style="font-weight: 600">Skor : </span>{{ $psr->answers->where('id',
                        $question->id)->first()->score }} / {{ $question->score }}
                    </h6>
                    @elseif ($psr->answers->where('id', $question->id)->first()->score < $question->score)
                        <h6 class="m-0 d-block text-warning">
                            <span style="font-weight: 600">Skor : </span>{{ $psr->answers->where('id',
                            $question->id)->first()->score }} / {{ $question->score }}
                        </h6>
                        @elseif($psr->answers->where('id', $question->id)->first()->score == 0)
                        <h6 class="m-0 d-block text-danger">
                            <span style="font-weight: 600">Skor : </span>{{ $psr->answers->where('id',
                            $question->id)->first()->score }} / {{ $question->score }}
                        </h6>
                        @endif
                </div>
            </div>
            @endif

            @empty
            @endforelse
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script></script>
@endsection
