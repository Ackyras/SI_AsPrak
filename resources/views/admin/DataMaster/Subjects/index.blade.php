@extends('layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            {{-- <div class="d-flex align-items-center justify-content-between"> --}}
                <h2 class="card-title font-weight-bold">Data Seluruh Mata Kuliah</h2>
                {{-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#periodFormModal">
                    <i class="fas fa-plus mr-2"></i>
                    Periode Baru
                </button> --}}
                {{--
            </div> --}}
        </div>

        <div class="card-body">
            <div id="subject_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <table id="subject_table" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                    aria-describedby="subject_table_info">
                    <thead>
                        <tr>
                            <th tabindex="0" aria-controls="subject_table" rowspan="1" colspan="1"
                                style="width: 20px; text-align: center">#</th>
                            <th tabindex="0" aria-controls="subject_table" rowspan="1" colspan="1">Nama Mata Kuliah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                        <tr>
                            <td tabindex="0" style="text-align: center">{{ $loop->index+1 }}</td>
                            <td>{{ $subject->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1" style="text-align: center">#</th>
                            <th rowspan="1" colspan="1">Nama Mata Kuliah</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
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
