@extends('admin.layouts.app')

@section('content')
    <div class="p-2">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title font-weight-bold">Detail Hasil Tes</h2>
            </div>

            <div class="card-body">
                <!-- DATA PENDAFTAR -->
                <div style="background-color: #f9fafb" class="w-100 p-3 mb-3 rounded shadow-sm border">
                    <!-- NAMA PENDAFTAR -->
                    <h6 class="d-flex w-100 justify-content-between mb-3">
                        <span style="width: 15%; font-weight: 600" class="d-block m-0">Nama Pendaftar</span>
                        <span style="width: 84%" class="d-block m-0">: {{ $registrar->name }}</span>
                    </h6>
                    <!-- NIM PENDAFTAR -->
                    <h6 class="d-flex w-100 justify-content-between mb-3">
                        <span style="width: 15%; font-weight: 600" class="d-block m-0">NIM Pendaftar</span>
                        <span style="width: 84%" class="d-block m-0">: {{ $registrar->nim }}</span>
                    </h6>
                    <!-- MATA KULIAH -->
                    <h6 class="d-flex w-100 justify-content-between mb-3">
                        <span style="width: 15%; font-weight: 600" class="d-block m-0">Mata Kuliah</span>
                        <span style="width: 84%" class="d-block m-0">: {{ $period_subject->subject->name }}</span>
                    </h6>
                    <!-- SKOR PILIHAN GANDA -->
                    <h6 class="d-flex w-100 justify-content-between mb-3">
                        <span style="width: 15%; font-weight: 600" class="d-block m-0">Skor Pilihan Ganda</span>
                        <span style="width: 84%" class="d-block m-0">: rand({{ rand(11,50) }} ...(A1))/(total jumlah soal pilihan ganda x skor masing-masing soal yang sudah ditentukan ...(A2))</span>
                    </h6>
                    <!-- SKOR ESSAY -->
                    <h6 class="d-flex w-100 justify-content-between mb-3">
                        <span style="width: 15%; font-weight: 600" class="d-block m-0">Skor Essay</span>
                        <span style="width: 84%" class="d-block m-0">: rand({{ rand(11,50) }} ...(B1))/(total jumlah soal essay x skor masing-masing soal yang sudah ditentukan ...(B2))</span>
                    </h6>
                    <!-- SKOR TOTAL -->
                    <h6 class="d-flex w-100 justify-content-between mb-3">
                        <span style="width: 15%; font-weight: 600" class="d-block m-0">Skor Total</span>
                        <span style="width: 84%" class="d-block m-0">: ( (A1) + (B1) ) / ( (A2) + (B2) )</span>
                    </h6>
                </div>


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

                <div class="w-100 p-3 mb-3 rounded bg-white shadow-sm">
                    <h6 class="d-block mb-3">
                        <span style="font-weight: 600">Soal {{ rand(1,20) }}.</span> Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi excepturi quis voluptates architecto laudantium fugit non quod nisi explicabo cupiditate magni ullam, eum quibusdam alias optio accusamus perferendis ad.
                    </h6>
                    <ul class="pl-4">
                        <li class="mb-2 text-danger font-weight-bold">Lorem ipsum dolor sit amet <span class="font-weight-light font-italic text-secondary">(jawaban yang dipilih)</span></li>
                        <li class="mb-2">consectetur, adipisicing elit. Quam voluptatem</li>
                        <li class="mb-2">accusamus, nam illo ad incidunt </li>
                        <li class="mb-2">ipsam, sapiente exercitationem sed cum  </li>
                        <li class="mb-2 text-info font-weight-bold">id, perspiciatis quo accusantium excepturi? <span class="font-weight-light font-italic text-secondary">(jawaban yang tepat)</span></li>
                    </ul>
                    <div style="width: 25%; background-color: #fee2e2" class="d-flex justify-content-between align-items-center p-2">
                        <h6 class="d-block m-0 text-danger">
                            <span style="font-weight: 600">Skor : </span>0/5
                        </h6>
                    </div>
                </div>

                <div class="w-100 p-3 mb-3 rounded bg-white shadow-sm">
                    <h6 class="d-block mb-3">
                        <span style="font-weight: 600">Soal {{ rand(1,20) }}.</span> Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi excepturi quis voluptates architecto laudantium fugit non quod nisi explicabo cupiditate magni ullam, eum quibusdam alias optio accusamus perferendis ad.
                    </h6>
                    <ul class="pl-4">
                        <li class="mb-2">Lorem ipsum dolor sit amet</li>
                        <li class="mb-2">consectetur, adipisicing elit. Quam voluptatem</li>
                        <li class="mb-2 text-success font-weight-bolder">accusamus, nam illo ad incidunt <span class="font-weight-light font-italic text-secondary">(jawaban yang tepat dipilih)</span></li>
                        <li class="mb-2">ipsam, sapiente exercitationem sed cum  </li>
                        <li class="mb-2">id, perspiciatis quo accusantium excepturi?</li>
                    </ul>
                    <div style="width: 25%; background-color: #d1fae5" class="d-flex justify-content-between align-items-center p-2">
                        <h6 class="d-block m-0 text-success">
                            <span style="font-weight: 600">Skor : </span>5/5
                        </h6>
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
