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

                @for ($i = 0; $i <10; $i++) <div class="p-4 rounded shadow ">
                    <div class="pb-3 mb-3 d-flex align-items-center justify-content-between border-bottom">
                        <h5 class="m-0 d-block font-weight-bold">Pertemuan {{ $i+1 }}</h5>
                        <button type="button" class="btn btn-sm {{ $status[$i] ? 'btn-success' : 'btn-secondary' }}"
                            data-toggle="modal" data-target="#changeQrStatusModal_{{ $i }}">
                            {{ $status[$i] ? 'Terbuka' : 'Tertutup' }}
                        </button>
                        <div class="modal fade" id="changeQrStatusModal_{{ $i }}" tabindex="-1" data-backdrop="static"
                            data-keyboard="false" aria-labelledby="changeQrStatusModalLabel_{{ $i }}"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title font-weight-bold" id="changeQrStatusModalLabel_{{ $i }}">
                                            {{ $status[$i] ? 'Tutup' : 'Buka' }} QR Code
                                        </h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="">
                                        @csrf @method('PUT')
                                        <div class="modal-body">
                                            <h6 class="m-0 mb-2 d-block">
                                                Anda akan {{ $status[$i] ? 'menutup' : 'membuka' }} QR Code <span
                                                    class="font-weight-bold">Kelas XXXX Pertemuan XXXX</span>
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
                        {{-- <img src="{{ asset('qrcodes/qrcode.png') }}" alt="" class="h-auto w-100"> --}}
                        {{-- <img src="{!! QrCode::size(100)->generate(Request::url()); !!}" alt=""
                            class="h-auto w-100"> --}}
                        <div class="img-fluid" style="box-sizing: border-box">
                            <img class="h-auto w-100"
                                src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate('QrCode as PNG image!')) !!} ">
                        </div>
                        @else
                        <img src="{{ asset('images/lock.png') }}" alt="" class="h-auto w-100">
                        @endif
                    </div>
                    <div class="pt-3 mt-3 w-100 border-top">
                        <div class="justify-start d-flex">
                            <p style="width: 38%" class="m-0 mr-2 d-block font-weight-bold">Dibuka pada</p>
                            <p class="m-0 d-block">: 22/02/2022 20:20:20</p>
                        </div>
                        <div class="justify-start d-flex">
                            <p style="width: 38%" class="m-0 mr-2 d-block font-weight-bold">Terbuka hingga</p>
                            <p class="m-0 d-block">: {{ Carbon\Carbon::parse('2022-07-06 14:02:38')->diffForHumans() }}
                            </p>
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
    .bg-transparent-black {
        background-color: #00000080;
        padding: 5rem;
    }

    .main-grid-container {
        display: grid;
        gap: 1.5rem;
        padding: 1.5rem;
        width: 100%;
    }

    @media (min-width: 768px) {
        .main-grid-container {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (min-width: 1024px) {
        .main-grid-container {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (min-width: 1536px) {
        .main-grid-container {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }
    }
</style>
@endsection

@section('scripts')
<script>
</script>
@endsection
