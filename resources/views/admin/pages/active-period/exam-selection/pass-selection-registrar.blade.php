@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title font-weight-bold">Seleksi Ujian Pendaftar
                </h2>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#announceResult">
                    <i class="mr-2 fas fa-bullhorn"></i>
                    Umumkan Kelulusan
                </button>
            </div>
        </div>

        <div class="card-body">
            <div id="period_subject_registrar_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="mb-3 w-25">
                    <select class="custom-select" id="subjectFilter">
                        <option value="" class="font-weight-bold">Filter Mata Kuliah</option>
                        @forelse ($subjects as $subject)
                        <option value="'{{ $subject->name }}'">{{ $subject->name }}</option>
                        @empty
                        @endforelse
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
                        @forelse ($period_subject_registrars as $psr)
                        <tr>
                            <td tabindex="0"> {{ $psr->registrar->name }} </td>
                            <td style="text-align: center;"> {{ $psr->registrar->nim }} </td>
                            <td data-search="'{{ $psr->period_subject->subject->name }}'"> {{
                                $psr->period_subject->subject->name }} </td>
                            <td style="text-align: center;"> {{ $psr->total_score }}/{{ $psr->question_score }} </td>
                        </tr>
                        @empty
                        @endforelse
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
                <h3 class="modal-title font-weight-bold" id="announceResultLabel">Umumkan Kelulusan Seleksi Tes</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="announceResultBody">
                <h5 class="m-0 mb-2 d-block font-weight-bold">
                    Berikut adalah Data Lulus Seleksi Tes
                </h5>
                @forelse ($subjects as $subject)
                <p class="m-0 mb-2 d-block font-weight-bold">
                    {{ $subject->name }}
                    @if ($subject->pass_exam_count == $subject->pivot->number_of_lab_assistant)
                    (<span class="text-success">
                        {{ $subject->pass_exam_count>0 ? $subject->pass_exam_count : '0' }}/{{
                        $subject->pivot->number_of_lab_assistant }} kuota terisi
                    </span>)
                    @else
                    (<span class="text-warning">
                        {{ $subject->pass_exam_count>0 ? $subject->pass_exam_count : '0' }}/{{
                        $subject->pivot->number_of_lab_assistant }} kuota terisi
                    </span>)
                    @endif
                </p>
                <ul>
                    @forelse ($period_subject_registrars as $psr)
                    @if ($psr->period_subject->subject->name == $subject->name)
                    <li>{{ $psr->registrar->name }}</li>
                    @endif
                    @empty
                    <p style="margin-left: -32px">
                        Belum ada calon asisten yang dinyatakan lulus untuk mata kuliah {{ $subject->name }}
                    </p>
                    @endforelse
                </ul>
                @empty
                @endforelse
            </div>

            <div class="modal-footer">
                <form action="{{ route('admin.active-period.exam-selection.pass-selection-registrar.announce')}}"
                    method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">UMUMKAN SEKARANG</button>
                </form>
            </div>
            </form>
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

        $(".select-assistant").change(function (event) {
            let id = $(this).attr("id").split("_")[1];
            let limit = parseInt($("#subject_"+id+"_number_of_assistant").text());
            if($(this).siblings(':checked').length >= limit) {
                this.checked = false;
            }
            if($(this).is(':checked')){
                $("#s_"+id+"_noa").text(($(this).siblings(':checked').length+1)+"/"+limit+" kuota terisi");
            }else{
                $("#s_"+id+"_noa").text(($(this).siblings(':checked').length)+"/"+limit+" kuota terisi");
            }
        });
    });
</script>
@endsection