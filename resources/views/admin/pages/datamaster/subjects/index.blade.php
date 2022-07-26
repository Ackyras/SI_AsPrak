@extends('admin.layouts.app')

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
                <table id="subject_table" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                    aria-describedby="subject_table_info">
                    <thead>
                        <tr>
                            <th tabindex="0" aria-controls="subject_table" rowspan="1" colspan="1"
                                style="width: 20px; text-align: center">#</th>
                            <th tabindex="0" aria-controls="subject_table" rowspan="1" colspan="1">Nama Mata Kuliah</th>
                            <th style="width: 150px; text-align: center" tabindex="0" aria-controls="subject_table" rowspan="1" colspan="1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                        <tr>
                            <td tabindex="0" style="text-align: center">{{ $loop->index+1 }}</td>
                            <td>{{ $subject->name }}</td>
                            <td>
                                <div class="d-flex justify-content-between w-100">
                                    <div style="width: 49.5%">
                                        <button type="button" class="btn btn-sm btn-block btn-primary"
                                            data-toggle="modal" data-target="#EditSubject{{ $loop->index }}">
                                            Edit
                                        </button>
                                        <!-- Edit Subject Modal -->
                                        <div class="modal fade" id="EditSubject{{ $loop->index }}" tabindex="-1" data-backdrop="static"
                                            data-keyboard="false" aria-labelledby="EditSubjectLabel{{ $loop->index }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title font-weight-bold"
                                                            id="EditSubjectLabel{{ $loop->index }}">
                                                            Ubah Mata Kuliah
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST" action="">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="name">Nama mata kuliah</label>
                                                                <input type="text" id="name" name="name"
                                                                    class="form-control" required autocomplete="off"
                                                                    value="{{ $subject->name }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">
                                                                SIMPAN PERUBAHAN
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="width: 49.5%">
                                        <button type="button" class="btn btn-sm btn-block btn-danger" data-toggle="modal"
                                        data-target="#DeleteSubject{{ $loop->index }}">
                                            Hapus
                                        </button>
                                        <!-- Delete Subject Modal -->
                                        <div class="modal fade" id="DeleteSubject{{ $loop->index }}"
                                            tabindex="-1" data-backdrop="static" data-keyboard="false"
                                            aria-labelledby="DeleteSubjectLabel{{ $loop->index }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title font-weight-bold"
                                                            id="DeleteSubjectLabel{{ $loop->index }}">
                                                            Hapus Mata Kuliah
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h6>Yakin untuk menghapus mata kuliah '{{ $subject->name }}'?
                                                        </h6>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">BATALKAN</button>
                                                        <form
                                                            action=""
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">
                                                                HAPUS
                                                                DATA</button>
                                                        </form>
                                                    </div>
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
                            <th rowspan="1" colspan="1" style="text-align: center">#</th>
                            <th rowspan="1" colspan="1">Nama Mata Kuliah</th>
                            <th rowspan="1" colspan="1" style="text-align: center">Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Subject Modal -->
<div class="modal fade" id="subjectFormModal" tabindex="-1" data-backdrop="static" data-keyboard="false"
    aria-labelledby="subjectFormModalLabel" aria-hidden="true">
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
                        <input type="text" id="name" name="name" class="form-control" required autocomplete="off"
                            placeholder="Nama mata kuliah">
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
