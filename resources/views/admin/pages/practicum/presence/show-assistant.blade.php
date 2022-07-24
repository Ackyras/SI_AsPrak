<?php
    $data_kehadiran = array(
        (object)[
            "nama"          => "Charles Xavier",
            "nim"           => "10118140001",
            "kehadiran"     => array(
                (object)[
                    "pertemuan"   => 1,
                    "hadir"       => true
                ],
                (object)[
                    "pertemuan"   => 2,
                    "hadir"       => false
                ],
                (object)[
                    "pertemuan"   => 3,
                    "hadir"       => true
                ],
                (object)[
                    "pertemuan"   => 4,
                    "hadir"       => true
                ],
                (object)[
                    "pertemuan"   => 5,
                    "hadir"       => false
                ],
                (object)[
                    "pertemuan"   => 6,
                    "hadir"       => true
                ],
                (object)[
                    "pertemuan"   => 7,
                    "hadir"       => false
                ],
                (object)[
                    "pertemuan"   => 8,
                    "hadir"       => false
                ],
                (object)[
                    "pertemuan"   => 9,
                    "hadir"       => false
                ],
                (object)[
                    "pertemuan"   => 10,
                    "hadir"       => false
                ],
                (object)[
                    "pertemuan"   => 11,
                    "hadir"       => false
                ],
                (object)[
                    "pertemuan"   => 12,
                    "hadir"       => false
                ],
                (object)[
                    "pertemuan"   => 13,
                    "hadir"       => false
                ],
                (object)[
                    "pertemuan"   => 14,
                    "hadir"       => false
                ],
            ),
        ],
        (object)[
            "nama"          => "Kipas Angin Arang Sate Madura",
            "nim"           => "10118140001",
            "kehadiran"     => array(
                (object)[
                    "pertemuan"   => 1,
                    "hadir"       => true
                ],
                (object)[
                    "pertemuan"   => 2,
                    "hadir"       => false
                ],
                (object)[
                    "pertemuan"   => 3,
                    "hadir"       => true
                ],
                (object)[
                    "pertemuan"   => 4,
                    "hadir"       => true
                ],
                (object)[
                    "pertemuan"   => 5,
                    "hadir"       => false
                ],
                (object)[
                    "pertemuan"   => 6,
                    "hadir"       => true
                ],
                (object)[
                    "pertemuan"   => 7,
                    "hadir"       => false
                ],
                (object)[
                    "pertemuan"   => 8,
                    "hadir"       => false
                ],
                (object)[
                    "pertemuan"   => 9,
                    "hadir"       => false
                ],
                (object)[
                    "pertemuan"   => 10,
                    "hadir"       => false
                ],
                (object)[
                    "pertemuan"   => 11,
                    "hadir"       => false
                ],
                (object)[
                    "pertemuan"   => 12,
                    "hadir"       => false
                ],
                (object)[
                    "pertemuan"   => 13,
                    "hadir"       => false
                ],
                (object)[
                    "pertemuan"   => 14,
                    "hadir"       => false
                ],
            ),

        ],
    );

    $jumlah_pertemuan = 14;
?>

@extends('admin.layouts.app')

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
                                rowspan="1" colspan="{{ $jumlah_pertemuan }}">
                                Kehadiran Petemuan
                            </th>
                            <th tabindex="0" aria-controls="period_subject_table" rowspan="2" colspan="1"
                                style="width: 90px; text-align: center">
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
                        @foreach ($psrs as $psr)
                        <tr>
                            <td tabindex="0">
                                {{ $psr->registrar->name }}
                                <small>
                                    psr_id: {{ $psr->id }}
                                </small>
                            </td>
                            <td class="text-center">{{ $psr->registrar->nim }}</td>
                            @foreach ($classroom->schedule->qrs as $qr)
                            <td class="text-center">
                                @if ($psr->presences->contains($qr))
                                @if ($psr->presences->where( 'id' ,$qr->id )->first()->pivot->is_valid)
                                <i class="fas fa-check-circle text-success"></i>
                                @else
                                <i class="fas fa-exclamation-circle text-warning"></i>
                                @endif
                                @else
                                <i class="fas fa-times-circle text-danger"></i>
                                @endif
                            </td>
                            @endforeach
                            <td class="font-weight-bold text-center">
                                {{-- {{ number_format(($jumlah_hadir/$jumlah_pertemuan) * 100, 2) }}% --}}
                            </td>
                        </tr>
                        @endforeach
                        @foreach ($extrapsrs as $psr)
                        <tr>
                            <td tabindex="0">
                                {{ $psr->registrar->name }}
                                <small>
                                    psr_id: {{ $psr->id }}
                                </small>
                            </td>
                            <td class="text-center">{{ $psr->registrar->nim }}</td>
                            @foreach ($classroom->schedule->qrs as $qr)
                            <td class="text-center">
                                @if ($psr->presences->contains($qr))
                                @if ($psr->presences->where( 'id' ,$qr->id )->first()->pivot->is_valid)
                                <i class="fas fa-check-circle text-success"></i>
                                @else
                                <i class="fas fa-exclamation-circle text-warning"></i>
                                @endif
                                @else
                                <i class="fas fa-times-circle text-danger"></i>
                                @endif
                            </td>
                            @endforeach
                            <td class="font-weight-bold text-center">
                                {{-- {{ number_format(($jumlah_hadir/$jumlah_pertemuan) * 100, 2) }}% --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    {{-- <tfoot>
                        <tr>
                            <th style="text-align: center" rowspan="1" colspan="1">Nama</th>
                            <th style="text-align: center" rowspan="1" colspan="1">NIM</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Keaktifan</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Aksi</th>
                        </tr>
                    </tfoot> --}}
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        $("#subject_assistant_table").DataTable({
            "paging": true,
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
