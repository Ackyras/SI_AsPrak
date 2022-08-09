@extends('admin.layouts.app')

@section('styles')
<style>
    .warning-button {
        width: fit-content;
        background-color: transparent;
        border: none;
    }

    .warning-button-icon {
        color: #FFC107;
    }

    .warning-button:hover .warning-button-icon {
        color: #f59e0b;
    }
</style>
@endsection
@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title font-weight-bold">Data Kehadiran Asisten Praktikum Mata Kuliah {{
                    $period_subject->subject->name }} Kelas {{ $classroom->name }} </h2>
            </div>
        </div>
        <div class="card-body">
            <div id="subject_assistant_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <table id="subject_assistant_table"
                    class="table table-bordered table-hover dataTable dtr-inline collapsed"
                    aria-describedby="subject_assistant_table_info">
                    <thead>
                        <tr>
                            <th style="text-align:center; padding:none; vertical-align:center;" tabindex="0"
                                aria-controls="subject_assistant_table" rowspan="2" colspan="1">
                                <p>Nama</p>
                            </th>
                            <th style="text-align: center" tabindex="0" aria-controls="subject_assistant_table"
                                rowspan="2" colspan="1">
                                <p>NIM</p>
                            </th>
                            <th style="text-align: center" tabindex="0" aria-controls="subject_assistant_table"
                                rowspan="1" colspan="{{ $classroom->schedule->qrs->count() }}">
                                Kehadiran Petemuan
                            </th>
                            <th tabindex="0" aria-controls="period_subject_table" rowspan="2" colspan="1"
                                style="width: 125px; text-align: center">
                                <p>Keaktifan</p>
                            </th>
                        </tr>
                        <tr>
                            @forelse ($classroom->schedule->qrs as $qr)
                            <th style="padding:none; text-align:center;">{{ $loop->index + 1 }}
                                <small>
                                    qr_id: {{ $qr->id }}
                                </small>
                            </th>
                            @empty
                            @endforelse
                        </tr>
                    </thead>

                    <tbody>
                        <!-- JANGAN DIHAPUS YAA :) -->
                        @php $row = 0; @endphp
                        @forelse ($psrs as $psr)
                        @php $row++; @endphp
                        <tr>
                            <td tabindex="0">
                                {{ $psr->registrar->name }}
                                <small>
                                    psr_id: {{ $psr->id }}
                                </small>
                            </td>
                            <td class="text-center">{{ $psr->registrar->nim }}</td>
                            @php $valid_count = 0; @endphp
                            @forelse ($classroom->schedule->qrs as $qr)
                            <td class="text-center">
                                @if ($psr->presences->contains($qr))
                                @if ($psr->presences->where( 'id' ,$qr->id )->first()->pivot->is_valid)
                                <i class="fas fa-check-circle text-success"></i>
                                @php $valid_count++; @endphp
                                @else
                                <button type="button" class="warning-button" data-toggle="modal"
                                    data-target="#validatePresence_{{ $row }}_{{ $loop->index }}">
                                    <span class="warning-button-icon">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </span>
                                </button>
                                <div class="modal fade" id="validatePresence_{{ $row }}_{{ $loop->index }}"
                                    tabindex="-1" data-backdrop="static" data-keyboard="false"
                                    aria-labelledby="validatePresence_{{ $row }}_{{ $loop->index }}Label"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold"
                                                    id="validatePresence_{{ $row }}_{{ $loop->index }}Label">
                                                    Validasi Presensi</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <h5 class="text-left">
                                                        Asisten praktikum ini terdaftar pada Mata Kuliah
                                                        <span class="font-weight-bold">
                                                            {{ $period_subject->subject->name }}
                                                            Kelas {{ $classroom->name }}</span>,
                                                        namun melakukan presensi di luar jadwal praktikum.
                                                    </h5>
                                                    <h5 class="mt-2 text-left">
                                                        Apakah anda ingin memvalidasi presensi ini ?
                                                    </h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="is_valid" value="1"
                                                        class="btn btn-success">
                                                        Validasi Presensi
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @else
                                <i class="fas fa-times-circle text-danger"></i>
                                @endif
                            </td>
                            @empty
                            @endforelse
                            <td class="text-center font-weight-bold">
                                {{ number_format( ($valid_count / $classroom->schedule->qrs->count()) * 100, 2) }}%
                            </td>
                        </tr>
                        @empty
                        @endforelse

                        @forelse ($extrapsrs as $psr)
                        @php $row++; @endphp
                        <tr>
                            <td tabindex="0">
                                {{ $psr->registrar->name }}
                                <small> psr_id: {{ $psr->id }} </small>
                            </td>
                            <td class="text-center">{{ $psr->registrar->nim }}</td>
                            @php
                            $waiting_count = 0;
                            $valid_count = 0;
                            @endphp
                            @forelse ($classroom->schedule->qrs as $qr)
                            <td class="text-center">
                                @if ($psr->presences->contains($qr))
                                @if ($psr->presences->where( 'id' ,$qr->id )->first()->pivot->is_valid)
                                <i class="fas fa-check-circle text-primary"></i>
                                @php $valid_count++; @endphp
                                @else
                                <button type="button" class="warning-button" data-toggle="modal"
                                    data-target="#validatePresence_{{ $row }}_{{ $loop->index }}">
                                    <span class="warning-button-icon">
                                        <i class="fas fa-exclamation-circle"></i>
                                    </span>
                                </button>
                                <div class="modal fade" id="validatePresence_{{ $row }}_{{ $loop->index }}"
                                    tabindex="-1" data-backdrop="static" data-keyboard="false"
                                    aria-labelledby="validatePresence_{{ $row }}_{{ $loop->index }}Label"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title font-weight-bold"
                                                    id="validatePresence_{{ $row }}_{{ $loop->index }}Label">
                                                    Validasi Presensi</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <h5 class="text-left">
                                                        Asisten praktikum ini terdaftar pada Mata Kuliah
                                                        <span class="font-weight-bold">{{ $period_subject->subject->name
                                                            }}</span>,
                                                        namun tidak di
                                                        <span class="font-weight-bold">Kelas {{ $classroom->name
                                                            }}</span>.
                                                    </h5>
                                                    <h5 class="mt-2 text-left">
                                                        Apakah anda ingin memvalidasi presensi ini ?
                                                    </h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="is_valid" value="1"
                                                        class="btn btn-success">
                                                        Validasi Presensi
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @php $waiting_count++; @endphp
                                @endif
                                @else
                                <i class="fas fa-times-circle text-secondary"></i>
                                @endif
                            </td>
                            @empty
                            @endforelse
                            <td class="text-center font-weight-bold">
                                @if ($waiting_count>0)
                                <small class="text-warning">
                                    {{ $waiting_count }} MENUNGGU VALIDASI
                                </small>
                                @else
                                <small class="text-primary">
                                    {{ $valid_count }} PERTEMUAN
                                </small>
                                @endif
                            </td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-2">
                    <small class="m-0 mb-1 font-weight-bold d-block">Keterangan : </small>
                    <div class="d-flex justify-content-between">
                        <small class="m-0 d-block"><i class="fas fa-check-circle text-success"></i> Presensi
                            Valid</small>
                        <small class="m-0 d-block"><i class="fas fa-times-circle text-danger"></i> Tidak
                            Presensi</small>
                        <small class="m-0 d-block"><i class="fas fa-check-circle text-primary"></i> Presensi Valid
                            (<span class="font-italic text-secondary">Asisten Praktikum Kelas Luar</span>)</small>
                        <small class="m-0 d-block"><i class="fas fa-times-circle text-secondary"></i> Tidak Presensi
                            (<span class="font-italic text-secondary">Asisten Praktikum Kelas Luar</span>)</small>
                        <small class="m-0 d-block"><i class="fas fa-exclamation-circle text-warning"></i> Menunggu
                            Validasi (<span class="font-weight-bold text-secondary">Dapat diklik</span>)</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        $("#subject_assistant_table").DataTable({
            "paging": false,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": true,
            "ordering": false,
            "buttons": [{
                    extend: "copy",
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: "excel",
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: "csv",
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                "colvis"
            ]
        }).buttons().container().appendTo('#subject_assistant_table_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection
