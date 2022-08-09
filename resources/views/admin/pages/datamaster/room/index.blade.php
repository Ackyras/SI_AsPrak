@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title font-weight-bold">Data Seluruh Ruangan</h2>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#subjectFormModal">
                    <i class="mr-2 fas fa-plus"></i>
                    Ruangan Baru
                </button>
            </div>
        </div>

        <div class="card-body">
            <div id="room_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <table id="room_table" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                    aria-describedby="room_table_info">
                    <thead>
                        <tr>
                            <th tabindex="0" aria-controls="room_table" rowspan="1" colspan="1"
                                style="width: 20px; text-align: center">#</th>
                            <th tabindex="0" aria-controls="room_table" rowspan="1" colspan="1">Gedung</th>
                            <th tabindex="0" aria-controls="room_table" rowspan="1" colspan="1">Nama Ruangan</th>
                            <th style="width: 150px; text-align: center" tabindex="0" aria-controls="room_table"
                                rowspan="1" colspan="1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rooms as $room)
                        <tr>
                            <td tabindex="0" style="text-align: center">{{ $loop->index +1 }}</td>
                            <td>{{ $room->building }}</td>
                            <td>{{ $room->name }}</td>
                            <td>
                                <div class="d-flex justify-content-between w-100">
                                    <div style="width: 49.5%">
                                        <button type="button" class="btn btn-sm btn-block btn-primary"
                                            data-toggle="modal" data-target="#EditRoom{{ $loop->index }}">
                                            Edit
                                        </button>
                                        <!-- Edit Room Modal -->
                                        <div class="modal fade" id="EditRoom{{ $loop->index }}" tabindex="-1"
                                            data-backdrop="static" data-keyboard="false"
                                            aria-labelledby="EditRoom{{ $loop->index }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title font-weight-bold"
                                                            id="EditRoom{{ $loop->index }}">
                                                            Ubah Detail Ruangan
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="POST"
                                                        action="{{ route('admin.data-master.room.update', $room) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="building">Gedung</label>
                                                                <input type="text" id="building" name="building"
                                                                    class="form-control" required autocomplete="off"
                                                                    value="{{ $room->building }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name">Nama ruangan</label>
                                                                <input type="text" id="name" name="name"
                                                                    class="form-control" required autocomplete="off"
                                                                    value="{{ $room->name }}">
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
                                        <button type="button" class="btn btn-sm btn-block btn-danger"
                                            data-toggle="modal" data-target="#DeleteRoom{{ $loop->index }}">
                                            Hapus
                                        </button>
                                        <!-- Delete Room Modal -->
                                        <div class="modal fade" id="DeleteRoom{{ $loop->index }}" tabindex="-1"
                                            data-backdrop="static" data-keyboard="false"
                                            aria-labelledby="DeleteRoom{{ $loop->index }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title font-weight-bold"
                                                            id="DeleteRoom{{ $loop->index }}">
                                                            Hapus Data Ruangan
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h6>Yakin untuk menghapus ruangan '<span
                                                                class="font-weight-bold">{{ $room->building }} - {{
                                                                $room->name }}</span>'?
                                                        </h6>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">BATALKAN</button>
                                                        <form
                                                            action="{{ route('admin.data-master.room.destroy', $room) }}"
                                                            method="POST">
                                                            @method('DELETE')
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
                        @empty
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1" style="text-align: center">#</th>
                            <th rowspan="1" colspan="1">Gedung</th>
                            <th rowspan="1" colspan="1">Nama Ruangan</th>
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
                <h3 class="modal-title font-weight-bold" id="subjectFormModalLabel">Ruangan Baru</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('admin.data-master.room.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama ruangan</label>
                        <input type="text" id="name" name="name" class="form-control" required autocomplete="off"
                            placeholder="Nama ruangan">
                    </div>
                    <div class="form-group">
                        <label for="building">Gedung</label>
                        <input type="text" id="building" name="building" class="form-control" required
                            autocomplete="off" placeholder="Gedung">
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
            $('#room_table').DataTable({
                "paging"        : true,
                "lengthChange"  : false,
                "searching"     : true,
                "ordering"      : true,
                "info"          : true,
                "autoWidth"     : false,
                "responsive"    : true,
                "buttons"       : [ "copy", "excel", "csv", 'pdf', 'print', "colvis" ]
            }).buttons().container().appendTo('#room_table_wrapper .col-md-6:eq(0)');
        });
</script>
@endsection
