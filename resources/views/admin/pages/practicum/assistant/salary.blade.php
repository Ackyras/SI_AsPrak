{{-- <?php
    $names = array(
        "Ribka", "Julyasih", "Sidabutar", "Risno", "Putri", "Nainggolan",
        "Ultraman", "Spiderman", "Batman", "Jacob", "X-Men", "Sibarani"
    );
    $subjects = array(
        "Filsafat Jawa",
        "Filsafat Jiwa",
        "Filsafat Air",
        "Filsafat Kabel",
        "Filsafat Abu",
    );
    $classes = array(
        "RA", "RB", "RC", "RD", "TPB 1", "TPB 2", "TPB 3"
    );
    $assistants = array();

    for($i=0; $i<20; $i++){
        array_push(
            $assistants,
            (object)[
                "name"          => $names[rand(0,5)]." ".$names[rand(6,11)],
                "nim"           => rand(118140001,118140099),
                "subject"   =>  (object)[
                    "name"          => $subjects[rand(0,4)],
                    "classroom"     => $classes[rand(0,6)],
                    "cost"          => 100000
                ],
                "presence_count"    => rand(1,12),
                "is_honor_taken"    => rand(0,1),
            ]
        );
    }
?> --}}

@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title font-weight-bold">Detail Honor Periode</h2>
            </div>
        </div>

        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <h5 style="width: 35%" class="d-block m-0">Honor Periode</h5>
                <h5 style="width: 64%" class="d-block m-0 font-weight-bold">: Rp. @money($period->honor)</h5>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <h5 style="width: 35%" class="d-block m-0">Total kehadiran</h5>
                @php
                    $totalAssistantPresence = 0;
                    foreach ($registrars as $registrar) {
                        $totalAssistantPresence += $registrar->total_presences;
                    }
                @endphp
                <h5 style="width: 64%" class="d-block m-0 font-weight-bold">: {{ $totalAssistantPresence }} kehadiran</h5>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <h5 style="width: 35%" class="d-block m-0">Total honor</h5>
                @php
                    $totalAssistantSalary = 0;
                    foreach ($registrars as $registrar) {
                        $totalAssistantSalary += ($period->honor * $registrar->total_presences);
                    }
                @endphp
                <h5 style="width: 64%" class="d-block m-0 font-weight-bold" id="showTotalSalary">: Rp. @money($totalAssistantSalary)</h5>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title font-weight-bold">Data Honor Asisten</h2>
            </div>
        </div>

        <div class="card-body">
            <div id="registrar_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <table id="registrar_table" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                    aria-describedby="registrar_table_info">
                    <thead>
                        <tr>
                            <th style="text-align: center" tabindex="0" aria-controls="registrar_table" rowspan="1"
                                colspan="1">
                                Nama
                            </th>
                            <th style="text-align: center" tabindex="0" aria-controls="registrar_table" rowspan="1"
                                colspan="1">
                                NIM
                            </th>
                            <th style="text-align: center" tabindex="0" aria-controls="registrar_table" rowspan="1"
                                colspan="1">
                                Mata Kuliah (Jumlah Kehadiran)
                            </th>
                            <th style="text-align: center" tabindex="0" aria-controls="registrar_table" rowspan="1"
                                colspan="1">
                                Tarif Honor
                            </th>
                            <th style="text-align: center" tabindex="0" aria-controls="registrar_table" rowspan="1"
                                colspan="1">
                                Jumlah hadir
                            </th>
                            <th style="text-align: center" tabindex="0" aria-controls="registrar_table" rowspan="1"
                                colspan="1">
                                Total
                            </th>
                            <th style="text-align: center" tabindex="0" aria-controls="registrar_table" rowspan="1"
                                colspan="1">
                                Tanda Terima
                            </th>
                            <th style="width: 120px; text-align: center" tabindex="0" aria-controls="registrar_table"
                                rowspan="1" colspan="1">
                                Status Pembayaran
                            </th>
                        </tr>
                    </thead>

                    <tbody> 
                        {{-- @php $totalAssistantSalary = 0; @endphp --}}
                        @forelse ($registrars as $registrar)
                            <tr class="">
                                <td tabindex="0">
                                    {{ $registrar->name }}
                                </td>
                                <td style="text-align: center">
                                    {{ $registrar->nim }}
                                </td>
                                <td>
                                    <ol>
                                        @forelse ($registrar->period_subjects as $period_subject)
                                        <li>
                                            {{ $period_subject->subject->name }} ({{
                                            $period_subject->pivot->total_presences }} kehadiran)
                                        </li>
                                        @empty

                                        @endforelse
                                    </ol>

                                </td>
                                <td style="text-align: center">
                                    Rp. @money($period->honor)
                                </td>
                                <td style="text-align: center">
                                    {{ $registrar->total_presences }}
                                </td>
                                <td style="text-align: center">
                                    Rp. @money($period->honor * $registrar->total_presences)
                                </td>
                                <td style="text-align: center">
                                </td>
                                @if ($registrar->is_honor_taken)
                                    <td>
                                        <p style="background-color: #9ca3af; font-size: small"
                                            class="py-2 m-0 text-center text-white rounded-sm d-block w-100">
                                            Diserahkan
                                        </p>
                                    </td>
                                @else
                                    <td>
                                        <button class="btn btn-sm btn-block btn-primary" type="button" data-toggle="modal"
                                            data-target="#PaymentStatus{{ $loop->index }}">
                                            Menunggu
                                        </button>
                                        <div class="modal fade" id="PaymentStatus{{ $loop->index }}" tabindex="-1"
                                            data-backdrop="static" data-keyboard="false"
                                            aria-labelledby="PaymentStatusLabel{{ $loop->index }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title font-weight-bold"
                                                            id="PaymentStatusLabel{{ $loop->index }}">
                                                            Konfirmasi Pembayaran Honor Asisten
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST"
                                                        action="{{ route('admin.assistant.salary-post', $registrar) }}">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <h5> Dengan menekan tombol <span
                                                                    class="text-primary font-weight-bold">KONFIRMASI</span>,
                                                                anda menyatakan bahwa Honor Asisten Praktikum atas nama <span
                                                                    class="font-weight-bold">{{ $registrar->name }}</span>
                                                                telah diserahkan kepada Asisten Praktikum terkait.
                                                            </h5>
                                                            <h6 class="m-0 my-2 d-block font-italic text-danger">Catatan: Aksi
                                                                ini tidak dapat
                                                                dibatalkan.</h6>
                                                            <h5>Konfirmasi Pembayaran?</h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">
                                                                KONFIRMASI
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @empty

                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="text-align: center" rowspan="1" colspan="1">Nama</th>
                            <th style="text-align: center" rowspan="1" colspan="1">NIM</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Mata Kuliah - Kelas</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Tarif Honor</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Jumlah Hadir</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Total</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Tanda Terima</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Status Pembayaran</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <p id="totalAssistantSalary" class="d-none">{{ $totalAssistantSalary }}</p>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        $("#registrar_table").DataTable({
            "paging": true,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": true,
            "ordering": false,
            "buttons": [{
                    extend: "copy",
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: "excel",
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: "csv",
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    },
                    // customize: function(win) {
                    //     totalSalaryNum = parseInt($("#totalAssistantSalary").text());
                    //     totalSalary = totalSalaryNum.toLocaleString("id-ID", {style:"currency", currency:"IDR"}); 
                    //     $(win.document.body).append("<h3 style=\"display:block; width:100%; text-align:right; margin-top:20px; font-weight:bold;\">Total honor: "+totalSalary+"</h3>"); 
                    // }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    },
                    customize: function(win) {
                        totalSalaryNum = parseInt($("#totalAssistantSalary").text());
                        totalSalary = totalSalaryNum.toLocaleString("id-ID", {style:"currency", currency:"IDR"}); 
                        $(win.document.body).append("<h3 style=\"display:block; width:100%; text-align:right; margin-top:20px; font-weight:bold;\">Total honor: "+totalSalary+"</h3>"); 
                    }
                },
                "colvis"
            ],
        }).buttons().container().appendTo('#registrar_table_wrapper .col-md-6:eq(0)');
        $('#registrar_table').dataTable().fnSetColumnVis( 6, false );
    });
</script>
@endsection