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
                            <th tabindex="0" aria-controls="room_table" rowspan="1" colspan="1">Nama Ruangan</th>
                            <th tabindex="0" aria-controls="room_table" rowspan="1" colspan="1">Gedung</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                        <tr>
                            <td tabindex="0" style="text-align: center">{{ $loop->index +1 }}</td>
                            <td>{{ $room->name }}</td>
                            <td>{{ $room->building }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1" style="text-align: center">#</th>
                            <th rowspan="1" colspan="1">Nama Ruangan</th>
                            <th rowspan="1" colspan="1">Gedung</th>
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
