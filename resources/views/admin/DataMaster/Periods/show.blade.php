@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title font-weight-bold">Data Mata Kuliah Periode {{ $period->name }}</h2>
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
                            <td> <a href="#">Detail</a> </td>
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