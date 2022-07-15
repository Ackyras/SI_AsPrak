@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title font-weight-bold">Seleksi Berkas Pendaftar
                </h2>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#announceResult">
                    <i class="mr-2 fas fa-bullhorn"></i>
                    Umumkan Kelulusan
                </button>
            </div>
        </div>

        <div class="card-body">
            <div id="period_subject_registrar_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="w-25 mb-3">
                    <select class="custom-select" id="subjectFilter">
                        <option value="" class="font-weight-bold">Filter Mata Kuliah</option>
                        @foreach ($subjects as $subject)
                        <option value="'{{ $subject->name }}'">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>
                <table id="period_subject_registrar_table"
                    class="table table-bordered table-hover dataTable dtr-inline collapsed"
                    aria-describedby="period_subject_registrar_table_info">
                    <thead>
                        <tr>
                            <th style="text-align: center" tabindex="0" aria-controls="period_subject_registrar_table"
                                rowspan="1" colspan="1">Nama</th>
                            <th style="text-align: center" tabindex="0" aria-controls="period_subject_registrar_table"
                                rowspan="1" colspan="1">NIM</th>
                            <th style="text-align: center" tabindex="0" aria-controls="period_subject_registrar_table"
                                rowspan="1" colspan="1">Mata Kuliah</th>
                            <th style="text-align: center" tabindex="0" aria-controls="period_subject_registrar_table"
                                rowspan="1" colspan="1">Nilai Ujian</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($period_subject_registrars as $psr)
                        <tr>
                            <td tabindex="0"> {{ $psr->registrar->name }} </td>
                            <td style="text-align: center;"> {{ $psr->registrar->nim }} </td>
                            <td data-search="'{{ $psr->period_subject->subject->name }}'"> {{
                                $psr->period_subject->subject->name }} </td>
                            <td style="text-align: center;"> {{ rand(65,99) }}/100 </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="text-align: center" rowspan="1" colspan="1">Nama</th>
                            <th style="text-align: center" rowspan="1" colspan="1">NIM</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Mata Kuliah</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Nilai Ujian</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modals')

<!-- Add Question Modal -->
<div class="modal fade" id="announceResult" tabindex="-1" data-backdrop="static" data-keyboard="false"
    aria-labelledby="announceResultLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" id="announceResultDialog">
        <div class="modal-content" id="announceResultContent" style="overflow-y:auto;">
            <div class="modal-header">
                <h3 class="modal-title font-weight-bold" id="announceResultLabel">Umumkan Kelulusan Seleksi Berkas</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="announceResultBody">
                <h5 class="d-block m-0 mb-2 font-weight-bold"> 
                    Berikut adalah Data Lulus Seleksi Berkas
                </h5>
                @foreach ($subjects as $subject)
                @php
                    $kuota = rand(3,6);
                    $lulus = rand(3,6);
                @endphp
                    <p class="d-block m-0 mb-2 font-weight-bold">
                        {{ $subject->name }} 
                        @if ($lulus > $kuota)
                            (<span class="text-danger">{{ $lulus }}/{{ $kuota }} kuota terisi</span>)
                        @elseif ($lulus < $kuota)
                            (<span class="text-secondary">{{ $lulus }}/{{ $kuota }} kuota terisi</span>)
                        @else
                            (<span class="text-success">{{ $lulus }}/{{ $kuota }} kuota terisi</span>)
                        @endif
                    </p>
                    <ul>
                        @foreach ($period_subject_registrars as $psr)
                            @if ($psr->period_subject->subject->name == $subject->name)
                                <li>{{ $psr->registrar->name }}</li>
                            @endif
                        @endforeach
                    </ul>
                @endforeach
            </div>

            <div class="modal-footer">
                <form action="">
                    <button type="submit" class="btn btn-primary">UMUMKAN SEKARANG</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Show File Modal -->
<div class="modal" id="showFileModal" tabindex="-1" data-backdrop="static" data-keyboard="false"
    aria-labelledby="showFileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title font-weight-bold" id="showFileModalLabel"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex justify-content-center" id="showFileModalContent">
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('scripts')
<script>
    function print(data){
        console.log(data);
    }
    
    $(document).ready(function() {

        var actionButtons = [
            { extend: "copy",   exportOptions: { columns: [0, 1, 2] } },
            { extend: "excel",  exportOptions: { columns: [0, 1, 2] } },
            { extend: "csv",    exportOptions: { columns: [0, 1, 2] } },
            { extend: 'pdf',    exportOptions: { columns: [0, 1, 2] } },
            { extend: 'print',  exportOptions: { columns: [0, 1, 2] } },
            "colvis",
        ];

        var table = $("#period_subject_registrar_table").DataTable({
            "paging": true,
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": true,
            "ordering": true,
            "buttons": actionButtons
        }).buttons().container().appendTo('#period_subject_registrar_table_wrapper .col-md-6:eq(0)');

        $('#subjectFilter').on('change', function(){
            $('#period_subject_registrar_table').dataTable().fnFilter(this.value);
        });
        
        $("#period_subject_registrar_table").click('tr td.btn-group .FileModalButton', function (event) { 
            event.preventDefault();
            if(event.target.classList.contains('FileModalButton')){
                var btn = event.target;
                var title = btn.getAttribute("data-title")
                var file = btn.getAttribute("data-file")
                var modal = $("#showFileModal");
                $("#showFileModalLabel").text(title);
                var pdf_embed = `<embed src="{{ asset('storage/`+file+`') }}" type="application/pdf" width="640" height="720" >`;
                modal.find('.modal-body').html(pdf_embed);
            }
        });
    });
</script>
@endsection