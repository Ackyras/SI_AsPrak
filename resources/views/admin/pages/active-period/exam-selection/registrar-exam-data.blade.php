@extends('admin.layouts.app')

@section('content')
    <div class="p-2">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title font-weight-bold">Data Tes Nama Orang - (NIM ORANG)</h2>
            </div>

            <div class="card-body">
                <div class="w-100 p-3 mb-3 rounded bg-white shadow-sm">
                    <!-- QUESTION TEXT -->
                    <h6 class="d-block mb-3">
                        <span style="font-weight: 600">Soal {{ rand(1,20) }}.</span> Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi excepturi quis voluptates architecto laudantium fugit non quod nisi explicabo cupiditate magni ullam, eum quibusdam alias optio accusamus perferendis ad.
                    </h6>
                    <!-- VIEW ANSWER MODAL BUTTON -->
                    <button style="background-color: #10b981; color: #fff" type="button" class="btn btn-sm mb-3" data-toggle="modal"
                        data-target="#viewAnswerImageModal_1"
                    >
                        <i class="fas fa-eye mr-2"></i>
                        Lihat Jawaban
                    </button>
                    <div style="width: 25%; background-color: #f3f4f6" class="d-flex justify-content-between align-items-center p-2">
                        <h6 class="d-block m-0 text-success">
                            <span style="font-weight: 600">Skor : </span>{{ rand(1,5) }}/{{ rand(1,5) }}
                        </h6>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#scoreModal_1">
                            Ubah Skor
                        </button>
                        <div class="modal fade" id="scoreModal_1"
                            tabindex="-1" data-backdrop="static" data-keyboard="false"
                            aria-labelledby="scoreModalLabel_1"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title font-weight-bold"
                                            id="scoreModalLabel_1">Skor Jawaban Soal No.1</h3>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="score">Skor</label>
                                                <input type="number" id="score" name="score"
                                                    class="form-control" required autocomplete="off"
                                                    value="{{ rand(0,5) }}" min="0" max="5">
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
                <div class="w-100 p-3 mb-3 rounded bg-white shadow-sm">
                    <h6 class="d-block mb-3">
                        <span style="font-weight: 600">Soal {{ rand(1,20) }}.</span> Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi excepturi quis voluptates architecto laudantium fugit non quod nisi explicabo cupiditate magni ullam, eum quibusdam alias optio accusamus perferendis ad.
                    </h6>
                    <button style="background-color: #10b981; color: #fff" type="button" class="btn btn-sm mb-3" data-toggle="modal"
                        data-target="#viewAnswerImageModal_1"
                    >
                        <i class="fas fa-eye mr-2"></i>
                        Lihat Jawaban
                    </button>
                    <div style="width: 25%;  background-color: #f3f4f6" class="d-flex justify-content-between align-items-center p-2">
                        <h6 class="d-block m-0 text-secondary">
                            <span style="font-weight: 600">Belum diberi skor</span>
                        </h6>
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#viewAnswerImageModal_1">
                            Beri Skor
                        </button>
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
                    </div>
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
