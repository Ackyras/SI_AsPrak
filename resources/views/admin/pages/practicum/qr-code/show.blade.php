@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title font-weight-bold">Data QR Code Kelas iOIu8yg0876y87y</h2>
        </div>

        @php
            $status = [true,false,false,false,false,false,false,false,false,false];
        @endphp

        <div class="card-body">
            <div class="main-grid-container">

                @for ($i = 0; $i <10; $i++)
                <div class="rounded p-4 shadow ">
                    <div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
                        <h5 class="d-block font-weight-bold m-0">Pertemuan {{ $i+1 }}</h5>
                        <button type="button" class="btn btn-sm {{ $status[$i] ? 'btn-success' : 'btn-secondary' }}" data-toggle="modal"
                        data-target="#changeQrStatusModal_{{ $i }}">
                            {{ $status[$i] ? 'Terbuka' : 'Tertutup' }}
                        </button>
                        <div class="modal fade" id="changeQrStatusModal_{{ $i }}"
                            tabindex="-1" data-backdrop="static" data-keyboard="false"
                            aria-labelledby="changeQrStatusModalLabel_{{ $i }}"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title font-weight-bold"
                                            id="changeQrStatusModalLabel_{{ $i }}">
                                            {{ $status[$i] ? 'Tutup' : 'Buka' }} QR Code
                                        </h3>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="">
                                        @csrf @method('PUT')
                                        <div class="modal-body">
                                            <h6 class="d-block m-0 mb-2">
                                                Anda akan {{ $status[$i] ? 'menutup' : 'membuka' }} QR Code <span class="font-weight-bold">Kelas XXXX Pertemuan XXXX</span>
                                            </h6>
                                            <h6>Lanjutkan aksi ini?</h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">
                                                LANJUTKAN
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 {{ $status[$i] ? '' : 'bg-transparent-black' }}">
                        @if ($status[$i])
                            <img src="{{ asset('qrcodes/qrcode.png') }}" alt="" class="w-100 h-auto">
                        @else
                            <img src="{{ asset('images/lock.png') }}" alt="" class="w-100 h-auto">
                        @endif
                    </div>
                    <div class="w-100 pt-3 mt-3 border-top">
                        <div class="d-flex justify-start">
                            <p style="width: 38%" class="d-block font-weight-bold m-0 mr-2">Dibuka pada</p>
                            <p class="d-block m-0">: 22/02/2022 20:20:20</p>
                        </div>
                        <div class="d-flex justify-start">
                            <p style="width: 38%" class="d-block font-weight-bold m-0 mr-2">Terbuka hingga</p>
                            <p class="d-block m-0">: {{ Carbon\Carbon::parse('2022-07-06 14:02:38')->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')
<style>
    .bg-transparent-black
    {
        background-color: #00000080;
        padding: 5rem;
    }
    .main-grid-container
    {
        display: grid;
        gap: 1.5rem;
        padding: 1.5rem;
        width: 100%;
    }
    @media (min-width: 768px) { 
        .main-grid-container
        {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }
    @media (min-width: 1024px) { 
        .main-grid-container
        {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }
    @media (min-width: 1536px) { 
        .main-grid-container
        {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }
    }
</style>
@endsection

@section('scripts')
<script>
</script>
@endsection
