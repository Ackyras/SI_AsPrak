@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title font-weight-bold">Data QR Code Mata Kuliah
                {{ $classroom->period_subject->subject->name }} Kelas
                {{ $classroom->name }}</h2>
        </div>

        <div class="card-body">
            <div class="main-grid-container">
                @forelse ($classroom->schedule->qrs as $qr)
                <div class="p-4 rounded shadow ">
                    <div class="pb-3 mb-3 d-flex align-items-center justify-content-between border-bottom">
                        <h5 class="m-0 d-block font-weight-bold">Pertemuan {{ $loop->index + 1 }}</h5>
                        <button type="button"
                            class="btn btn-sm {{ $qr->end_date > now() ? 'btn-success' : 'btn-secondary' }}"
                            data-toggle="modal" data-target="#changeQrStatusModal_{{ $loop->index +1 }}">
                            @if ($qr->end_date > now()) Terbuka @else Tertutup @endif </button>
                        <div class="modal fade" id="changeQrStatusModal_{{ $loop->index +1 }}" tabindex="-1"
                            data-backdrop="static" data-keyboard="false"
                            aria-labelledby="changeQrStatusModalLabel_{{ $loop->index +1 }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title font-weight-bold"
                                            id="changeQrStatusModalLabel_{{ $loop->index + 1 }}">
                                            {{ $qr->end_date > now() ? 'Tutup' : 'Buka' }} QR Code </h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="{{ route('admin.practicum.qr.change-status', $qr) }}">
                                        @csrf @method('PUT')
                                        <div class="modal-body">
                                            <h6 class="m-0 mb-2 d-block">
                                                Anda akan {{ $qr->end_date > now() ? 'menutup' : 'membuka' }} QR
                                                Code <span class="font-weight-bold">Kelas {{ $classroom->name }}
                                                    Pertemuan
                                                    {{ $loop->index + 1 }}</span>
                                            </h6>
                                            <h6>Lanjutkan aksi ini?</h6>
                                        </div>
                                        <div class="modal-footer">
                                            {{-- <input type="hidden" name="status" , value=""> --}}
                                            <button type="submit" class="btn btn-primary" name="status" value={{
                                                $qr->end_date > now() ? 0 : 1 }}>
                                                LANJUTKAN
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 {{ $qr->end_date > now() ? '' : 'bg-transparent-black' }}">
                        @if ($qr->end_date > now()) {{-- <img src="{{ asset('qrcodes/qrcode.png') }}" alt=""
                            class="h-auto w-100"> --}}
                        {{-- <img src="{!! QrCode::size(100)->generate(Request::url()); !!}" alt=""
                            class="h-auto w-100"> --}}
                        <div class="img-fluid" style="box-sizing: border-box">
                            <img class="h-auto w-100" src="data:image/png;base64, {!! base64_encode(
    QrCode::format('png')->size(300)->generate($qr->token),
) !!} ">
                        </div>
                        @else
                        <img src="{{ asset('images/lock.png') }}" alt="" class="h-auto w-100">
                        @endif
                    </div>
                    <div class="pt-3 mt-3 w-100 border-top">
                        <div class="justify-start d-flex">
                            <p style="width: 38%" class="m-0 mr-2 d-block font-weight-bold">Dibuka pada</p>
                            <p class="m-0 d-block">: {{ $qr->updated_at }}</p>
                        </div>
                        <div class="justify-start d-flex">
                            <p style="width: 38%" class="m-0 mr-2 d-block font-weight-bold">Terbuka hingga</p>
                            <p class="m-0 d-block">:
                                {{ Carbon\Carbon::parse($qr->end_date)->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
                <div class="p-4 rounded shadow ">
                    <div class="pb-3 mb-3 d-flex align-items-center justify-content-between border-bottom">
                        <h5 class="m-0 d-block font-weight-bold">Pertemuan {{ $classroom->schedule->qrs_count + 1 }}
                        </h5>
                        <button type="button" class="btn btn-sm btn-secondary" data-toggle="modal"
                            data-target="#changeQrStatusModal_new">
                            Tertutup </button>
                        <div class="modal fade" id="changeQrStatusModal_new" tabindex="-1" data-backdrop="static"
                            data-keyboard="false" aria-labelledby="changeQrStatusModalLabel_new" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title font-weight-bold" id="changeQrStatusModalLabel_new">
                                            Buka QR Code </h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="{{ route('admin.practicum.qr.store') }}">
                                        @csrf
                                        <div class="modal-body">
                                            <input type="hidden" name="schedule_id"
                                                value="{{ $classroom->schedule->id }}">
                                            <h6 class="m-0 mb-2 d-block">
                                                Anda akan membuka QR Code
                                                <span class="font-weight-bold">Kelas {{
                                                    $classroom->period_subject->subject->name }}
                                                    Pertemuan
                                                    {{ $classroom->name }}</span>
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
                    <div class="w-100 bg-transparent-black">

                        <img src="{{ asset('images/lock.png') }}" alt="" class="h-auto w-100">
                    </div>
                    <div class="pt-3 mt-3 w-100 border-top">
                        <div class="justify-start d-flex">
                            <p style="width: 38%" class="m-0 mr-2 d-block font-weight-bold">Dibuka pada</p>
                            <p class="m-0 d-block">: -</p>
                        </div>
                        <div class="justify-start d-flex">
                            <p style="width: 38%" class="m-0 mr-2 d-block font-weight-bold">Terbuka hingga</p>
                            <p class="m-0 d-block">:
                                -
                            </p>
                        </div>
                    </div>
                </div>
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
<script></script>
@endsection
