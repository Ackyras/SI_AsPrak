@php
    $subjects = array(
        (object)[
            "id"                        => 1,
            "name"                      => "Algoritma Pemrograman 2",
            "number_of_lab_assistant"   => 4,
            "exam_start"                => "2022/02/15 00:00:00",
            "exam_end"                  => "2022/02/22 23:59:00",
        ],
        (object)[
            "id"                        => 2,
            "name"                      => "Algoritma Pemrograman 1",
            "number_of_lab_assistant"   => 4,
            "exam_start"                => "2022/02/15 00:00:00",
            "exam_end"                  => "2022/02/22 23:59:00",
        ],
        (object)[
            "id"                        => 3,
            "name"                      => "PKS 1",
            "number_of_lab_assistant"   => 4,
            "exam_start"                => "2022/02/15 00:00:00",
            "exam_end"                  => "2022/02/22 23:59:00",
        ],
        (object)[
            "id"                        => 4,
            "name"                      => "PKS 2",
            "number_of_lab_assistant"   => 4,
            "exam_start"                => "2022/02/15 00:00:00",
            "exam_end"                  => "2022/02/22 23:59:00",
        ],
        (object)[
            "id"                        => 5,
            "name"                      => "Algoritma dan Struktur Data",
            "number_of_lab_assistant"   => 4,
            "exam_start"                => "2022/02/15 00:00:00",
            "exam_end"                  => "2022/02/22 23:59:00",
        ],
        (object)[
            "id"                        => 6,
            "name"                      => "Pemrograman Berbasis Objek",
            "number_of_lab_assistant"   => 4,
            "exam_start"                => "2022/02/15 00:00:00",
            "exam_end"                  => "2022/02/22 23:59:00",
        ],
        (object)[
            "id"                        => 7,
            "name"                      => "Basis Data",
            "number_of_lab_assistant"   => 4,
            "exam_start"                => "2022/02/15 00:00:00",
            "exam_end"                  => "2022/02/22 23:59:00",
        ],
        (object)[
            "id"                        => 8,
            "name"                      => "Manajemen Basis Data",
            "number_of_lab_assistant"   => 4,
            "exam_start"                => "2022/02/15 00:00:00",
            "exam_end"                  => "2022/02/22 23:59:00",
        ],
        (object)[
            "id"                        => 9,
            "name"                      => "Dasar Rekayasa Perangkat Lunak",
            "number_of_lab_assistant"   => 4,
            "exam_start"                => "2022/02/15 00:00:00",
            "exam_end"                  => "2022/02/22 23:59:00",
        ],
        (object)[
            "id"                        => 10,
            "name"                      => "Rekayasa Perangkat Lunak",
            "number_of_lab_assistant"   => 4,
            "exam_start"                => "2022/02/15 00:00:00",
            "exam_end"                  => "2022/02/22 23:59:00",
        ],
        (object)[
            "id"                        => 11,
            "name"                      => "Manajemen Proyek Teknologi Informasi",
            "number_of_lab_assistant"   => 4,
            "exam_start"                => "2022/02/15 00:00:00",
            "exam_end"                  => "2022/02/22 23:59:00",
        ],
        (object)[
            "id"                        => 12,
            "name"                      => "Proyek Teknologi Informasi",
            "number_of_lab_assistant"   => 4,
            "exam_start"                => "2022/02/15 00:00:00",
            "exam_end"                  => "2022/02/22 23:59:00",
        ],
        (object)[
            "id"                        => 13,
            "name"                      => "Interaksi Manusia dan Komputer",
            "number_of_lab_assistant"   => 4,
            "exam_start"                => "2022/02/15 00:00:00",
            "exam_end"                  => "2022/02/22 23:59:00",
        ],
    );
@endphp

@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h2 class="card-title font-weight-bold">Data Mata Kuliah Periode {{ $period->name }}</h2>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#subjectFormModal">
                        <i class="fas fa-plus mr-2"></i>
                        Mata Kuliah Baru
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div id="period_subject_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <table id="period_subject_table" class="table table-bordered table-hover dataTable dtr-inline collapsed" aria-describedby="period_subject_table_info">
                        <thead>
                            <tr>
                                <th style="text-align: center" tabindex="0" aria-controls="period_subject_table" rowspan="1" colspan="1">Nama Mata Kuliah</th>
                                <th style="text-align: center" tabindex="0" aria-controls="period_subject_table" rowspan="1" colspan="1">Kuota Asisten</th>
                                <th style="text-align: center" tabindex="0" aria-controls="period_subject_table" rowspan="1" colspan="1">Tanggal Awal Ujian</th>
                                <th style="text-align: center" tabindex="0" aria-controls="period_subject_table" rowspan="1" colspan="1">Tanggal Akhir Ujian</th>
                                <th tabindex="0" aria-controls="period_subject_table" rowspan="1" colspan="1" style="width: 95px; text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subjects as $subject)
                                <tr>
                                    <td tabindex="0">{{ $subject->name }}</td>
                                    <td>{{ $subject->number_of_lab_assistant }}</td>
                                    <td>{{ $subject->exam_start }}</td>
                                    <td>{{ $subject->exam_end }}</td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-between ">
                                            <!-- Edit Subject Button -->
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#subjectEditFormModal{{ $subject->id }}">Edit</button>
                                            <!-- Edit Subject Modal -->
                                            <div class="modal fade" id="subjectEditFormModal{{ $subject->id }}" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="subjectEditFormModalLabel{{ $subject->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title font-weight-bold" id="subjectEditFormModalLabel{{ $subject->id }}">Ubah Mata Kuliah</h3>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="name">Nama mata kuliah</label>
                                                                    <input type="text" id="name" name="name" class="form-control" required autocomplete="off" placeholder="Nama mata kuliah" value="{{ $subject->name }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="number_of_lab_assistant">Kuota asisten praktikum</label>
                                                                    <input type="text" id="number_of_lab_assistant" name="number_of_lab_assistant" class="form-control" required autocomplete="off" placeholder="(masukkan angka)" value="{{ $subject->number_of_lab_assistant }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exam_start">Tanggal mulai ujian</label>
                                                                    {{-- <div>
                                                                        <h5>{{ date("c", strtotime($subject->exam_start)) }}</h5>
                                                                        <h5>{{ (new DateTime($subject->exam_start))->format('c') }}</h5>
                                                                        <h5>{{ date('Y-m-d\TH:i:s', strtotime($subject->exam_start)) }}</h5>
                                                                    </div> --}}
                                                                    <input type="datetime-local" id="exam_start" name="exam_start" class="form-control" required autocomplete="off" value="{{ date('Y-m-d\TH:i:s', strtotime($subject->exam_start)) }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exam_end">Tanggal selesai ujian</label>
                                                                    <input type="datetime-local" id="exam_end" name="exam_end" class="form-control" required autocomplete="off" value="{{ date('Y-m-d\TH:i:s', strtotime($subject->exam_end)) }}">
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">SIMPAN PERUBAHAN</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Delete Subject Button -->
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#confirmDeleteSubjectModal{{ $subject->id }}">Hapus</button>
                                            <!-- Delete Subject Modal -->
                                            <div class="modal fade" id="confirmDeleteSubjectModal{{ $subject->id }}" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="confirmDeleteSubjectModalLabel{{ $subject->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title font-weight-bold" id="confirmDeleteSubjectModalLabel{{ $subject->id }}">Hapus Mata Kuliah</h3>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5>Yakin untuk menghapus mata kuliah '{{ $subject->name }}'?</h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">BATALKAN</button>
                                                            <button type="button" class="btn btn-danger">HAPUS DATA</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="text-align: center" rowspan="1" colspan="1">Nama Mata Kuliah</th>
                                <th style="text-align: center" rowspan="1" colspan="1">Kuota Asisten</th>
                                <th style="text-align: center" rowspan="1" colspan="1">Tanggal Awal Ujian</th>
                                <th style="text-align: center" rowspan="1" colspan="1">Tanggal Akhir Ujian</th>
                                <th style="text-align: center" rowspan="1" colspan="1">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Subject Modal -->
    <div class="modal fade" id="subjectFormModal" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="subjectFormModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title font-weight-bold" id="subjectFormModalLabel">Mata Kuliah Baru</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama mata kuliah</label>
                            <input type="text" id="name" name="name" class="form-control" required autocomplete="off" placeholder="Nama mata kuliah">
                        </div>
                        <div class="form-group">
                            <label for="number_of_lab_assistant">Kuota asisten praktikum</label>
                            <input type="text" id="number_of_lab_assistant" name="number_of_lab_assistant" class="form-control" required autocomplete="off" placeholder="(masukkan angka)">
                        </div>
                        <div class="form-group">
                            <label for="exam_start">Tanggal mulai ujian</label>
                            <input type="datetime-local" id="exam_start" name="exam_start" class="form-control" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="exam_end">Tanggal selesai ujian</label>
                            <input type="datetime-local" id="exam_end" name="exam_end" class="form-control" required autocomplete="off">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function () {
            $('#period_subject_table').DataTable({
                "paging"        : true,
                "lengthChange"  : false,
                "searching"     : true,
                "ordering"      : true,
                "info"          : true,
                "autoWidth"     : false,
                "responsive"    : true,
                "buttons"       : [
                    { extend: "copy",   exportOptions: { columns: [ 0, 1, 2, 3 ] } },
                    { extend: "excel",  exportOptions: { columns: [ 0, 1, 2, 3 ] } },
                    { extend: "csv",    exportOptions: { columns: [ 0, 1, 2, 3 ] } },
                    { extend: 'pdf',    exportOptions: { columns: [ 0, 1, 2, 3 ] } },
                    { extend: 'print',  exportOptions: { columns: [ 0, 1, 2, 3 ] } },
                    "colvis"
                ]
            }).buttons().container().appendTo('#period_subject_table_wrapper .col-md-6:eq(0)');
        });
</script>
@endsection
