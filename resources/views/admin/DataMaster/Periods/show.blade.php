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
                <table id="period_subject_table" class="table table-bordered table-hover dataTable dtr-inline collapsed" aria-describedby="period_subject_table_info">
                    <thead>
                        <tr>
                            <th tabindex="0" aria-controls="period_subject_table" rowspan="1" colspan="1">Nama Mata Kuliah</th>
                            <th tabindex="0" aria-controls="period_subject_table" rowspan="1" colspan="1">Kuota Asisten</th>
                            <th tabindex="0" aria-controls="period_subject_table" rowspan="1" colspan="1">Tanggal Awal Ujian</th>
                            <th tabindex="0" aria-controls="period_subject_table" rowspan="1" colspan="1">Tanggal Akhir Ujian</th>
                            <th tabindex="0" aria-controls="period_subject_table" rowspan="1" colspan="1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd">
                            <td tabindex="0">ABC</td>
                            <td>4</td>
                            <td>22 Februari, 2022</td>
                            <td>22 Februari, 2022</td>
                            <td>
                                <button class="">Detail</button>
                                <button class="">Edit</button>
                                <button class="">Hapus</button>
                            </td>
                        </tr>
                        <tr class="even">
                            <td tabindex="0">DEF</td>
                            <td>4</td>
                            <td>22 Februari, 2022</td>
                            <td>22 Februari, 2022</td>
                            <td> <a href="#">Detail</a> </td>
                        </tr>
                        <tr class="odd">
                            <td tabindex="0">GHI</td>
                            <td>4</td>
                            <td>22 Februari, 2022</td>
                            <td>22 Februari, 2022</td>
                            <td> <a href="#">Detail</a> </td>
                        </tr>
                        <tr class="even">
                            <td tabindex="0">JKL</td>
                            <td>4</td>
                            <td>22 Februari, 2022</td>
                            <td>22 Februari, 2022</td>
                            <td> <a href="#">Detail</a> </td>
                        </tr>
                        <tr class="odd">
                            <td tabindex="0">MNO</td>
                            <td>4</td>
                            <td>22 Februari, 2022</td>
                            <td>22 Februari, 2022</td>
                            <td> <a href="#">Detail</a> </td>
                        </tr>
                        <tr class="even">
                            <td tabindex="0">PQR</td>
                            <td>4</td>
                            <td>22 Februari, 2022</td>
                            <td>22 Februari, 2022</td>
                            <td> <a href="#">Detail</a> </td>
                        </tr>
                        <tr class="odd">
                            <td tabindex="0">STU</td>
                            <td>4</td>
                            <td>22 Februari, 2022</td>
                            <td>22 Februari, 2022</td>
                            <td> <a href="#">Detail</a> </td>
                        </tr>
                        <tr class="even">
                            <td tabindex="0">VWX</td>
                            <td>4</td>
                            <td>22 Februari, 2022</td>
                            <td>22 Februari, 2022</td>
                            <td> <a href="#">Detail</a> </td>
                        </tr>
                        <tr class="odd">
                            <td tabindex="0">YZA</td>
                            <td>4</td>
                            <td>22 Februari, 2022</td>
                            <td>22 Februari, 2022</td>
                            <td> <a href="#">Detail</a> </td>
                        </tr>
                        <tr class="even">
                            <td tabindex="0">BCD</td>
                            <td>4</td>
                            <td>22 Februari, 2022</td>
                            <td>22 Februari, 2022</td>
                            <td> <a href="#">Detail</a> </td>
                        </tr>
                        <tr class="odd">
                            <td tabindex="0">EFG</td>
                            <td>4</td>
                            <td>22 Februari, 2022</td>
                            <td>22 Februari, 2022</td>
                            <td> <a href="#">Detail</a> </td>
                        </tr>
                        <tr class="even">
                            <td tabindex="0">HIJ</td>
                            <td>4</td>
                            <td>22 Februari, 2022</td>
                            <td>22 Februari, 2022</td>
                            <td> <a href="#">Detail</a> </td>
                        </tr>
                        <tr class="odd">
                            <td tabindex="0">KLM</td>
                            <td>4</td>
                            <td>22 Februari, 2022</td>
                            <td>22 Februari, 2022</td>
                            <td> <a href="#">Detail</a> </td>
                        </tr>
                        <tr class="odd">
                            <td tabindex="0">NOP</td>
                            <td>4</td>
                            <td>22 Februari, 2022</td>
                            <td>22 Februari, 2022</td>
                            <td> <a href="#">Detail</a> </td>
                        </tr>
                        <tr class="even">
                            <td tabindex="0">QRS</td>
                            <td>4</td>
                            <td>22 Februari, 2022</td>
                            <td>22 Februari, 2022</td>
                            <td> <a href="#">Detail</a> </td>
                        </tr>
                        <tr class="even">
                            <td tabindex="0">TUV</td>
                            <td>4</td>
                            <td>22 Februari, 2022</td>
                            <td>22 Februari, 2022</td>
                            <td> <a href="#">Detail</a> </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">Nama Mata Kuliah</th>
                            <th rowspan="1" colspan="1">Kuota Asisten</th>
                            <th rowspan="1" colspan="1">Tanggal Awal Ujian</th>
                            <th rowspan="1" colspan="1">Tanggal Akhir Ujian</th>
                            <th rowspan="1" colspan="1">Aksi</th>
                        </tr>
                    </tfoot>
                </table>
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
                            <label for="number_of_lab_assitant">Kuota asisten praktikum</label>
                            <input type="text" id="number_of_lab_assitant" name="number_of_lab_assitant" class="form-control" required autocomplete="off" placeholder="(masukkan angka)">
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
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#period_subject_table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection