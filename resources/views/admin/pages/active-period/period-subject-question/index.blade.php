@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h2 class="card-title font-weight-bold">Soal Ujian Seleksi {{ $period_subject->subject->name }}</h2>
                {{-- <a role="button"
                    href="{{ route('admin.data-master.period.subject.question.create'), [ $period, $subject] }}"
                    class="d-block btn btn-success" data-toggle="modal" data-target="#subjectFormModal"> --}}
                    <a 
                        {{-- href="{{ route('admin.data-master.period.subject.question.create', [$period, $subject]) }}" --}}
                        class="btn btn-success">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Soal
                    </a>
            </div>

            <div class="">
                <div>
                    @forelse ($period_subject->questions as $question)
                    <div style=" border-left: 5px solid #34d399; background-color: #ecfdf5"
                        class="d-flex justify-content-between mb-4 p-2">
                        <p style="width: 3.5%" class="d-block font-weight-bold text-center m-0 ">
                            {{ $loop->index+1 }}
                        </p>
                        <div style="width: 96%;" class="pl-2">
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
                                        @foreach($question->choices as $choice)
                                        <li class="mb-2 {{ $choice->is_true ? 'text-success font-weight-bold':''}} ">
                                            {{ $choice->text }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif

                            <div
                                class="d-flex justify-content-between {{ $question->choices->count() > 0 ? '' : 'mt-2'}}">
                                <p style="width: 10%; font-weight: 600" class="d-block m-0">Skor</p>
                                <p class="d-block m-0">:</p>
                                <p style="width: 88%" class="d-block m-0"><span class="badge badge-success">{{
                                        $question->score }} poin</span></p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p style="border-left: 5px solid #34d399; background-color: #ecfdf5;" class="d-block m-0 p-2">Belum Ada Soal</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
</script>
@endsection
