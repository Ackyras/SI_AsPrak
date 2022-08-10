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
                            <th style="text-align: center; width: 15%" tabindex="0"
                                aria-controls="period_subject_registrar_table" rowspan="1" colspan="1">Berkas</th>
                            <th style="text-align: center; width: 15%" tabindex="0"
                                aria-controls="period_subject_registrar_table" rowspan="1" colspan="1">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($period_subject_registrars as $psr)
                        <tr>
                            <td tabindex="0"> {{ $psr->registrar->name }} </td>
                            <td style="text-align: center;"> {{ $psr->registrar->nim }} </td>
                            <td data-search="'{{ $psr->period_subject->subject->name }}'"> {{
                                $psr->period_subject->subject->name }} </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-info FileModalButton" data-toggle="modal"
                                        data-target="#showFileModal" data-title="CV {{ $psr->registrar->name }}"
                                        data-file="{{ $psr->registrar->cv }}">
                                        CV
                                    </button>
                                    <button type="button" class="btn btn-info FileModalButton" data-toggle="modal"
                                        data-target="#showFileModal" data-title="KTM {{ $psr->registrar->name }}"
                                        data-file="{{ $psr->registrar->khs }}">
                                        KTM
                                    </button>
                                    <button type="button" class="btn btn-info FileModalButton" data-toggle="modal"
                                        data-target="#showFileModal" data-title="Transkrip {{ $psr->registrar->name }}"
                                        data-file="{{ $psr->registrar->transkrip }}">
                                        Transkrip
                                    </button>
                                </div>
                            </td>
                            <td class="text-align: center;">
                                @if ($psr->is_pass_file_selection)
                                <button type="button" class="btn btn-sm btn-block btn-success" data-toggle="modal"
                                    data-target="#IPFSEFM{{ $psr->id }}">
                                    Lulus
                                </button>
                                @else
                                <button type="button" class="btn btn-sm btn-block btn-danger" data-toggle="modal"
                                    data-target="#IPFSEFM{{ $psr->id }}">
                                    Tidak Lulus
                                </button>
                                @endif
                                <div class="modal fade" id="IPFSEFM{{ $psr->id }}" tabindex="-1" data-backdrop="static"
                                    data-keyboard="false" aria-labelledby="IPFSEFMLabel{{ $psr->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title font-weight-bold"
                                                    id="IPFSEFMLabel{{ $psr->id }}">
                                                    Ubah Status Kelulusan
                                                </h3>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="" method="">
                                                @csrf
                                                <div class="modal-body">
                                                    @if ($psr->is_pass_file_selection)
                                                    <h5>
                                                        Anda akan mengubah status Kelululusan <span
                                                            class="font-weight-bold">{{ $psr->registrar->name }}</span>
                                                        dari <span class="badge badge-success">Lulus</span> menjadi
                                                        <span class="badge badge-danger">Tidak Lulus</span>.
                                                    </h5>
                                                    <h5>Simpan perubahan ini?</h5>
                                                    @else
                                                    <h5>
                                                        Anda akan mengubah status Kelululusan <span
                                                            class="font-weight-bold">{{ $psr->registrar->name }}</span>
                                                        dari <span class="badge badge-danger">Tidak Lulus</span> menjadi
                                                        <span class="badge badge-success">Lulus</span>.
                                                    </h5>
                                                    <h5>Simpan perubahan ini?</h5>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">SIMPAN
                                                        PERUBAHAN</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="text-align: center" rowspan="1" colspan="1">Nama</th>
                            <th style="text-align: center" rowspan="1" colspan="1">NIM</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Mata Kuliah</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Berkas</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Status</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modals')

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
                <h5 class="m-0 mb-2 d-block font-weight-bold">
                    Berikut adalah Data Lulus Seleksi Berkas
                </h5>
                @forelse ($subjects as $subject)
                <p class="m-0 mb-2 d-block font-weight-bold">
                    {{ $subject->name }}
                    @if ($subject->pass_selection_count > $subject->pivot->number_of_lab_assistant)
                    (<span class="text-success">{{ $subject->pass_selection_count }}/{{
                        $subject->pivot->number_of_lab_assistant }} kuota terisi</span>)
                    @elseif ($subject->pass_selection_count < $subject->pivot->number_of_lab_assistant) (<span
                            class="text-danger">{{
                            $subject->pass_selection_count }}/{{ $subject->pivot->number_of_lab_assistant }} kuota
                            terisi</span>)
                        @else
                        (<span class="text-warning">{{ $subject->pass_selection_count }}/{{
                            $subject->pivot->number_of_lab_assistant }} kuota
                            terisi</span>)
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
                <form action="{{ route('admin.active-period.file-selection.pass-selection-registrar.announce') }}"
                    method="POST">
                    @csrf
                    @method('POST')
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
            "ordering": false,
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