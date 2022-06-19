@php
    $subjects = array(
        (object)[
            "id"                => 1,
            "name"              => "Algoritma Pemrograman 2",
            "period_subject"    => (object)["name" => "Ganjil 2018/2019",] 
        ],
        (object)[
            "id"                => 2,
            "name"              => "Algoritma Pemrograman 1",
            "period_subject"    => (object)["name" => "Genap 2018/2019",] 
        ],
        (object)[
            "id"                => 3,
            "name"              => "PKS 1",
            "period_subject"    => (object)["name" => "Ganjil 2019/2020",] 
        ],
        (object)[
            "id"                => 4,
            "name"              => "PKS 2",
            "period_subject"    => (object)["name" => "Genap 2019/2020",] 
        ],
        (object)[
            "id"                => 5,
            "name"              => "Algoritma dan Struktur Data",
            "period_subject"    => (object)["name" => "Ganjil 2020/2021",] 
        ],
        (object)[
            "id"                => 6,
            "name"              => "Pemrograman Berbasis Objek",
            "period_subject"    => (object)["name" => "Genap 2020/2021",] 
        ],
        (object)[
            "id"                => 7,
            "name"              => "Basis Data",
            "period_subject"    => (object)["name" => "Ganjil 2021/2022",] 
        ],
        (object)[
            "id"                => 8,
            "name"              => "Manajemen Basis Data",
            "period_subject"    => (object)["name" => "Genap 2021/2022",] 
        ],
        (object)[
            "id"                => 9,
            "name"              => "Dasar Rekayasa Perangkat Lunak",
            "period_subject"    => (object)["name" => "Ganjil 2022/2023",] 
        ],
        (object)[
            "id"                => 10,
            "name"              => "Rekayasa Perangkat Lunak",
            "period_subject"    => (object)["name" => "Genap 2022/2023",] 
        ],
        (object)[
            "id"                => 11,
            "name"              => "Manajemen Proyek Teknologi Informasi",
            "period_subject"    => (object)["name" => "Ganjil 2023/2024",] 
        ],
        (object)[
            "id"                => 12,
            "name"              => "Proyek Teknologi Informasi",
            "period_subject"    => (object)["name" => "Genap 2023/2024",] 
        ],
        (object)[
            "id"                => 13,
            "name"              => "Interaksi Manusia dan Komputer",
            "period_subject"    => (object)["name" => "Ganjil 2024/2025",] 
        ],
    );
@endphp

@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h2 class="card-title font-weight-bold">Data Seluruh Mata Kuliah</h2>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#subjectFormModal">
                        <i class="fas fa-plus mr-2"></i>
                        Mata Kuliah Baru
                    </button>
                </div>
            </div>
            
            <div class="card-body">
                <div id="subject_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <table id="subject_table" class="table table-bordered table-hover dataTable dtr-inline collapsed" aria-describedby="subject_table_info">
                        <thead>
                            <tr>
                                <th tabindex="0" aria-controls="subject_table" rowspan="1" colspan="1" style="width: 20px; text-align: center">#</th>
                                <th tabindex="0" aria-controls="subject_table" rowspan="1" colspan="1">Nama Mata Kuliah</th>
                                <th tabindex="0" aria-controls="subject_table" rowspan="1" colspan="1">Periode</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subjects as $subject)
                                <tr>
                                    <td tabindex="0" style="text-align: center">{{ $loop->index+1 }}</td>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->period_subject->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1" style="text-align: center">#</th>
                                <th rowspan="1" colspan="1">Nama Mata Kuliah</th>
                                <th rowspan="1" colspan="1">Periode</th>
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
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#subject_table').DataTable({
                "paging"        : true,
                "lengthChange"  : false,
                "searching"     : true,
                "ordering"      : true,
                "info"          : true,
                "autoWidth"     : false,
                "responsive"    : true,
                "buttons"       : [ "copy", "excel", "csv", 'pdf', 'print', "colvis" ]
            }).buttons().container().appendTo('#subject_table_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection