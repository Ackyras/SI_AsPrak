{{-- @php
$period_subject_registrars = array(
(object)[
'id' => 1,
'subject' => (object)[
'id' => 1,
'name' => 'Filsafat Islam',
],
'registrar' => (object)[
'id' => 1,
'name' => 'Pace Kimak',
'nim' => '118140088',
'cv' => 'file/Lorem.pdf',
'khs' => 'file/Lorem.pdf',
'transkrip' => 'file/Lorem.pdf'
],
'is_pass_file' => true,
'is_pass_exam' => false
],
(object)[
'id' => 2,
'subject' => (object)[
'id' => 2,
'name' => 'Filsafat Hindu',
],
'registrar' => (object)[
'id' => 1,
'name' => 'Pace Kimak',
'nim' => '118140088',
'cv' => 'file/Lorem.pdf',
'khs' => 'file/Lorem.pdf',
'transkrip' => 'file/Lorem.pdf'
],
'is_pass_file' => false,
'is_pass_exam' => false
],
(object)[
'id' => 3,
'subject' => (object)[
'id' => 3,
'name' => 'Filsafat Budha',
],
'registrar' => (object)[
'id' => 1,
'name' => 'Pace Kimak',
'nim' => '118140088',
'cv' => 'file/Lorem.pdf',
'khs' => 'file/Lorem.pdf',
'transkrip' => 'file/Lorem.pdf'
],
'is_pass_file' => false,
'is_pass_exam' => false
],
(object)[
'id' => 4,
'subject' => (object)[
'id' => 1,
'name' => 'Filsafat Islam',
],
'registrar' => (object)[
'id' => 2,
'name' => 'Pace Peler',
'nim' => '118140089',
'cv' => 'file/Lorem.pdf',
'khs' => 'file/Lorem.pdf',
'transkrip' => 'file/Lorem.pdf'
],
'is_pass_file' => true,
'is_pass_exam' => false
],
(object)[
'id' => 5,
'subject' => (object)[
'id' => 2,
'name' => 'Filsafat Hindu',
],
'registrar' => (object)[
'id' => 2,
'name' => 'Pace Peler',
'nim' => '118140089',
'cv' => 'file/Lorem.pdf',
'khs' => 'file/Lorem.pdf',
'transkrip' => 'file/Lorem.pdf'
],
'is_pass_file' => false,
'is_pass_exam' => false
],
(object)[
'id' => 6,
'subject' => (object)[
'id' => 1,
'name' => 'Filsafat Islam',
],
'registrar' => (object)[
'id' => 3,
'name' => 'Pace Jancuk',
'nim' => '118140090',
'cv' => 'file/Lorem.pdf',
'khs' => 'file/Lorem.pdf',
'transkrip' => 'file/Lorem.pdf'
],
'is_pass_file' => false,
'is_pass_exam' => false
],
(object)[
'id' => 7,
'subject' => (object)[
'id' => 1,
'name' => 'Filsafat Islam',
],
'registrar' => (object)[
'id' => 4,
'name' => 'Pace Tahi',
'nim' => '118140091',
'cv' => 'file/Lorem.pdf',
'khs' => 'file/Lorem.pdf',
'transkrip' => 'file/Lorem.pdf'
],
'is_pass_file' => false,
'is_pass_exam' => false
],
(object)[
'id' => 8,
'subject' => (object)[
'id' => 2,
'name' => 'Filsafat Hindu',
],
'registrar' => (object)[
'id' => 4,
'name' => 'Pace Tahi',
'nim' => '118140091',
'cv' => 'file/Lorem.pdf',
'khs' => 'file/Lorem.pdf',
'transkrip' => 'file/Lorem.pdf'
],
'is_pass_file' => true,
'is_pass_exam' => false
],
(object)[
'id' => 9,
'subject' => (object)[
'id' => 4,
'name' => 'Filsafat Es',
],
'registrar' => (object)[
'id' => 6,
'name' => 'Ackyra Ngacenk Setiap Hari Oke',
'nim' => '118140160',
'cv' => 'file/Lorem.pdf',
'khs' => 'file/Lorem.pdf',
'transkrip' => 'file/Lorem.pdf'
],
'is_pass_file' => true,
'is_pass_exam' => false
],
(object)[
'id' => 10,
'subject' => (object)[
'id' => 5,
'name' => 'Filsafat Filsafat',
],
'registrar' => (object)[
'id' => 6,
'name' => 'Ackyra Ngacenk Setiap Hari Oke',
'nim' => '118140160',
'cv' => 'file/Lorem.pdf',
'khs' => 'file/Lorem.pdf',
'transkrip' => 'file/Lorem.pdf'
],
'is_pass_file' => true,
'is_pass_exam' => false
],
(object)[
'id' => 11,
'subject' => (object)[
'id' => 4,
'name' => 'Filsafat Es',
],
'registrar' => (object)[
'id' => 5,
'name' => 'Togi Ganteng',
'nim' => '118140037',
'cv' => 'file/Lorem.pdf',
'khs' => 'file/Lorem.pdf',
'transkrip' => 'file/Lorem.pdf'
],
'is_pass_file' => true,
'is_pass_exam' => false
],
(object)[
'id' => 12,
'subject' => (object)[
'id' => 5,
'name' => 'Filsafat Filsafat',
],
'registrar' => (object)[
'id' => 5,
'name' => 'Togi Ganteng',
'nim' => '118140037',
'cv' => 'file/Lorem.pdf',
'khs' => 'file/Lorem.pdf',
'transkrip' => 'file/Lorem.pdf'
],
'is_pass_file' => true,
'is_pass_exam' => false
],
);
$subjects = array(
(object)[
'id' => 1,
'name' => "Filsafat Islam"
],
(object)[
'id' => 2,
'name' => "Filsafat Hindu"
],
(object)[
'id' => 3,
'name' => "Filsafat Budha"
],
(object)[
'id' => 4,
'name' => "Filsafat Es"
],
(object)[
'id' => 5,
'name' => "Filsafat Filsafat"
]
);
@endphp --}}

@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title font-weight-bold">Data Seluruh Pendaftar {{ auth()->user()->registrar->name }}
                </h2>
            </div>
        </div>

        <div class="card-body">
            <div id="period_subject_registrar_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                {{-- <div class="d-flex mb-3"> --}}
                    <div class="w-25 mb-3">
                        <select class="custom-select" id="subjectFilter">
                            <option value="" class="font-weight-bold">Filter Mata Kuliah</option>
                            @foreach ($subjects as $subject)
                            <option>{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="w-25">
                        <select class="custom-select" id="nameFilter">
                            <option value="" class="font-weight-bold">Filter Nama</option>
                            @foreach ($period_subject_registrars as $psr)
                            <option>{{ $psr->registrar->name }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    {{--
                </div> --}}
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
                        @foreach ($period_subject_registrars as $psr)
                        <tr>
                            <td tabindex="0"> {{ $psr->registrar->name }} </td>
                            <td style="text-align: center;"> {{ $psr->registrar->nim }} </td>
                            <td data-search="{{ $psr->period_subject->subject->name }}"> {{
                                $psr->period_subject->subject->name }} </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <a role="button" href="{{ asset(Storage::url($psr->registrar->cv)) }}"
                                        target="blank" type="button" class="btn btn-info">CV</a>
                                    <a role="button" href="{{ asset(Storage::url($psr->registrar->cv)) }}"
                                        target="blank" type="button" class="btn btn-info">KHS</a>
                                    <a role="button" href="{{ asset(Storage::url($psr->registrar->cv)) }}"
                                        target="blank" type="button" class="btn btn-info">Transkrip</a>
                                </div>
                            </td>
                            <td class="text-align: center;">
                                @if ($psr->is_pass_file)
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
                                            <form action="">
                                                @csrf
                                                <div class="modal-body">
                                                    @if ($psr->is_pass_file)
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
                            {{-- <td>
                                <div class="d-flex align-items-center justify-content-between">
                                    <a class="btn btn-sm btn-success"
                                        href="{{ route('admin.data.master.period.show', $period) }}">Detail</a>
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#periodEditFormModal{{ $period->id }}">Edit</button>
                                    <!-- Edit Period Modal -->
                                    <div class="modal fade" id="periodEditFormModal{{ $period->id }}" tabindex="-1"
                                        data-backdrop="static" data-keyboard="false"
                                        aria-labelledby="periodEditFormModalLabel{{ $period->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title font-weight-bold"
                                                        id="periodEditFormModalLabel{{ $period->id }}">Ubah
                                                        Periode</h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="name">Nama periode</label>
                                                            <input type="text" id="name" name="name"
                                                                class="form-control" required autocomplete="off"
                                                                value="{{ $period->name }}"
                                                                placeholder="Ganjil 20XX/20XX">
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
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#confirmDeletePeriodModal{{ $period->id }}">Hapus</button>
                                    <!-- Edit Period Modal -->
                                    <div class="modal fade" id="confirmDeletePeriodModal{{ $period->id }}" tabindex="-1"
                                        data-backdrop="static" data-keyboard="false"
                                        aria-labelledby="confirmDeletePeriodModalLabel{{ $period->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title font-weight-bold"
                                                        id="confirmDeletePeriodModalLabel{{ $period->id }}">Hapus
                                                        Periode</h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Yakin untuk menghapus periode '{{ $period->name }}'?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">BATALKAN</button>
                                                    <button type="button" class="btn btn-danger">HAPUS
                                                        DATA</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td> --}}
                        </tr>
                        @endforeach
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

            {{-- <embed src="{{ asset('file/Lorem.pdf') }}" type="application/pdf" width="600" height="400"> --}}
        </div>
    </div>
</div>

<!-- Add Period Modal -->
{{-- <div class="modal fade" id="periodFormModal" tabindex="-1" data-backdrop="static" data-keyboard="false"
    aria-labelledby="periodFormModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title font-weight-bold" id="periodFormModalLabel">Periode Baru</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama periode</label>
                        <input type="text" id="name" name="name" class="form-control" required autocomplete="off"
                            placeholder="Ganjil 20XX/20XX">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}
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
            // $('#nameFilter').on('change', function(){
            //     $('#period_subject_registrar_table').dataTable().fnFilter(this.value);
            // });
        });
</script>
@endsection
