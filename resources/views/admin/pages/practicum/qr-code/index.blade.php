@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title font-weight-bold">Data QR Code Praktikum Periode {{ $period->name }}</h2>
        </div>

        <div class="card-body">
            <div id="qr_code_table_wrapper" class="dataTables_wrapper dt-bootstrap4 w-100">
                <table id="qr_code_table" class="table table-bordered table-hover dataTable dtr-inline collapsed w-100"
                    aria-describedby="qr_code_table_info">
                    <thead>
                        <tr>
                            <th style="text-align: center" tabindex="0" aria-controls="qr_code_table" rowspan="1"
                                colspan="1">Kelas</th>
                            <th style="text-align: center" tabindex="0" aria-controls="qr_code_table" rowspan="1"
                                colspan="1">Jadwal</th>
                            <th style="text-align: center" tabindex="0" aria-controls="qr_code_table" rowspan="1"
                                colspan="1">Ruangan</th>
                            <th tabindex="0" aria-controls="qr_code_table" rowspan="1" colspan="1"
                                style="width: 150px; text-align: center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($classrooms as $classroom)
                        <tr>
                            <td tabindex="0">{{ $classroom->period_subject->subject->name.' - '.$classroom->name }}</td>
                            <td>
                                @if ($classroom->schedule)

                                {{ $classroom->schedule->day }}, {{ $classroom->schedule->start_time }} - {{
                                $classroom->schedule->end_time }}</td>
                            @endif
                            <td>
                                @if ($classroom->schedule)

                                {{ $classroom->schedule->room->building }}, {{ $classroom->schedule->room->name }}
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.practicum.qr.show', $classroom) }}" role="button"
                                    class="btn btn-block btn-sm btn-success">
                                    Lihat Semua QR Code
                                </a>
                            </td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="text-align: center" rowspan="1" colspan="1">Kelas</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Jadwal</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Ruangan</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Subject Modal -->
<div class="modal fade" id="scheduleFormModal" tabindex="-1" data-backdrop="static" data-keyboard="false"
    aria-labelledby="scheduleFormModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title font-weight-bold" id="scheduleFormModalLabel">Jadwal Praktikum Baru</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="practicum_class">Kelas praktikum</label>
                        <select id="practicum_class" class="custom-select" name="practicum_class">
                            <option selected disabled hidden>Pilih kelas praktikum</option>
                            <option value="XXX">XXX</option>
                            <option value="YYY">YYY</option>
                            <option value="ZZZ">ZZZ</option>
                        </select>
                    </div>
                    <p class="m-0 mb-1 d-block font-weight-bold">Jadwal</p>
                    <div class="form-group">
                        <label for="practicum_start">Hari praktikum</label>
                        <select class="custom-select" name="day" id="day">
                            <option value="senin">Senin</option>
                            <option value="selasa">Selasa</option>
                            <option value="rabu">Rabu</option>
                            <option value="kamis">Kamis</option>
                            <option value="jumat">Jumat</option>
                            <option value="sabtu">Sabtu</option>
                            <option value="minggu">Minggu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="practicum_start">Jam mulai praktikum</label>
                        <input type="time" id="practicum_start" name="practicum_start" class="form-control" required
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="practicum_end">Jam selesai praktikum</label>
                        <input type="time" id="practicum_end" name="practicum_end" class="form-control" required
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="number_of_lab_assistant">Jumlah Assisten</label>
                        <input type="number" id="number_of_lab_assistant" name="number_of_lab_assistant"
                            class="form-control" required autocomplete="off" min="1" value="{{ rand(1,5) }}"
                            placeholder="(masukkan angka)">
                    </div>
                    <div class="form-group">
                        <label for="practicum_room">Ruangan</label>
                        <select id="practicum_room" class="custom-select" name="practicum_room">
                            <option selected disabled hidden>Pilih ruangan</option>
                            <option value="AAA">AAA</option>
                            <option value="BBB">BBB</option>
                            <option value="CCC">CCC</option>
                        </select>
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
            $('#qr_code_table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "order":[],
                "buttons": [{
                        extend: "copy",
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: "excel",
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: "csv",
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    "colvis"
                ]
            }).buttons().container().appendTo('#qr_code_table_wrapper .col-md-6:eq(0)');
        });
</script>
@endsection
