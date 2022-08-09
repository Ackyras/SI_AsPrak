@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title font-weight-bold">Data Periode Penerimaan Asisten Praktikum</h2>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#periodFormModal">
                    <i class="mr-2 fas fa-plus"></i>
                    Periode Baru
                </button>
            </div>
        </div>

        <div class="card-body">
            <div id="period_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <table id="period_table" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                    aria-describedby="period_table_info">
                    <thead>
                        <tr>
                            <th style="text-align: center" tabindex="0" aria-controls="period_table" rowspan="1"
                                colspan="1">Periode</th>
                            <th style="text-align: center" tabindex="0" aria-controls="period_table" rowspan="1"
                                colspan="1">Mulai Pendaftaran</th>
                            <th style="text-align: center" tabindex="0" aria-controls="period_table" rowspan="1"
                                colspan="1">Akhir Pendaftaran</th>
                            <th tabindex="0" aria-controls="period_table" rowspan="1" colspan="1"
                                style="width: 180px; text-align: center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($periods as $period)
                        <tr class="{{ $loop->index % 2 == 0 ? 'even' : 'odd' }}">
                            <td tabindex="0">{{ $period->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($period->registration_start)->format('j F, Y (H:i)') }}
                            </td>
                            <td>{{ \Carbon\Carbon::parse($period->registration_end)->format('j F, Y (H:i)') }}
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div style="width: 32.95%">
                                        <a class="btn btn-block btn-sm btn-success"
                                            href="{{ route('admin.data-master.period.show', $period) }}">Detail</a>
                                    </div>
                                    <div style="width: 32.95%">
                                        <button type="button" class="btn btn-block btn-sm btn-primary"
                                            data-toggle="modal"
                                            data-target="#periodEditFormModal{{ $period->id }}">Edit</button>
                                        <!-- Edit Period Modal -->
                                        <div class="modal fade" id="periodEditFormModal{{ $period->id }}" tabindex="-1"
                                            data-backdrop="static" data-keyboard="false"
                                            aria-labelledby="periodEditFormModalLabel{{ $period->id }}"
                                            aria-hidden="true">
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
                                                    <form
                                                        action="{{ route('admin.data-master.period.update', $period) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="name">Nama periode</label>
                                                                <input type="text" id="name" name="name"
                                                                    class="form-control" required autocomplete="off"
                                                                    value="{{ $period->name }}"
                                                                    placeholder="Ganjil 20XX/20XX">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="honor">Jumlah Honor/Pertemuan</label>
                                                                <input type="text" id="honor" name="honor"
                                                                    class="form-control" required autocomplete="off"
                                                                    value="{{ $period->honor }}"
                                                                    placeholder="15000, 25000, ...">
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
                                    </div>
                                    <div style="width: 32.95%">
                                        <button type="button" class="btn btn-block btn-sm btn-danger"
                                            data-toggle="modal"
                                            data-target="#confirmDeletePeriodModal{{ $period->id }}">Hapus</button>
                                        <!-- Edit Period Modal -->
                                        <div class="modal fade" id="confirmDeletePeriodModal{{ $period->id }}"
                                            tabindex="-1" data-backdrop="static" data-keyboard="false"
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
                                                        <form
                                                            action="{{ route('admin.data-master.period.destroy', $period) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">HAPUS
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
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="text-align: center" rowspan="1" colspan="1">Periode</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Awal Pendaftaran</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Akhir Pendaftaran</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Period Modal -->
<div class="modal fade" id="periodFormModal" tabindex="-1" data-backdrop="static" data-keyboard="false"
    aria-labelledby="periodFormModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title font-weight-bold" id="periodFormModalLabel">Periode Baru</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('admin.data-master.period.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama periode</label>
                        <input type="text" id="name" name="name" class="form-control" required autocomplete="off"
                            placeholder="Ganjil 20XX/20XX">
                    </div>
                    <div class="form-group">
                        <label for="honor">Jumlah Honor/Pertemuan</label>
                        <input type="number" id="honor" name="honor" class="form-control" required autocomplete="off"
                            placeholder="Contoh : 20000">
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
    $(function() {
            $("#period_table").DataTable({
                "paging": true,
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "searching": true,
                "ordering": false,
                "buttons": [{
                        extend: "copy",
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    {
                        extend: "excel",
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    {
                        extend: "csv",
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    "colvis"
                ]
            }).buttons().container().appendTo('#period_table_wrapper .col-md-6:eq(0)');
        });
</script>
@endsection
