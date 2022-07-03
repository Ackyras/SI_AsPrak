@extends('admin.layouts.app')

@section('content')
    <div class="p-2">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title font-weight-bold">Data Tes Nama Orang - (NIM ORANG)</h2>
            </div>

            <div class="card-body">
                <div class="border w-100 p-3 mb-3 rounded">
                    <h6 class="d-block border mb-3">
                        <span style="font-weight: 600">Soal {{ rand(1,20) }}.</span> Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi excepturi quis voluptates architecto laudantium fugit non quod nisi explicabo cupiditate magni ullam, eum quibusdam alias optio accusamus perferendis ad.
                    </h6>
                    <button type="button" class="btn btn-sm btn-primary mb-3" data-toggle="modal"
                        data-target="#viewAnswerImageModal_1">Lihat File Jawaban</button>
                    <h6 class="d-block m-0">Skor : 5/6</h6>
                </div>
                <div class="border w-100 p-3 mb-3 rounded">
                    <h6 class="d-block border mb-3">
                        <span style="font-weight: 600">Soal {{ rand(1,20) }}.</span> Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi excepturi quis voluptates architecto laudantium fugit non quod nisi explicabo cupiditate magni ullam, eum quibusdam alias optio accusamus perferendis ad.
                    </h6>
                    <button type="button" class="btn btn-sm btn-primary mb-3" data-toggle="modal"
                        data-target="#viewAnswerImageModal_1">Lihat File Jawaban</button>
                    <h6 class="d-block m-0">Skor : 5/6</h6>
                </div>
                <div class="border w-100 p-3 mb-3 rounded">
                    <h6 class="d-block border mb-3">
                        <span style="font-weight: 600">Soal {{ rand(1,20) }}.</span> Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi excepturi quis voluptates architecto laudantium fugit non quod nisi explicabo cupiditate magni ullam, eum quibusdam alias optio accusamus perferendis ad.
                    </h6>
                    <button type="button" class="btn btn-sm btn-primary mb-3" data-toggle="modal"
                        data-target="#viewAnswerImageModal_1">Lihat File Jawaban</button>
                    <h6 class="d-block m-0">Skor : 5/6</h6>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="viewAnswerImageModal_1"
        tabindex="-1" data-backdrop="static" data-keyboard="false"
        aria-labelledby="viewAnswerImageModalLabel_1"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title font-weight-bold"
                        id="viewAnswerImageModalLabel_1">Jawaban Soal {{ rand(1,10) }}</h3>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img style="width: 87.5%" class="d-block mx-auto" src="{{ asset('images/team-1-800x800.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
    </script>
@endsection
