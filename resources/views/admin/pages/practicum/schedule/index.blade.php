@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title font-weight-bold">Data Jadwal Praktikum Periode {{ $period->name }}</h2>
        </div>

        <div class="card-body">
            <div id="schedule_table_wrapper" class="dataTables_wrapper dt-bootstrap4 w-100">
                <table id="schedule_table" class="table table-bordered table-hover dataTable dtr-inline collapsed w-100"
                    aria-describedby="schedule_table_info">
                    <thead>
                        <tr>
                            <th style="text-align: center" tabindex="0" aria-controls="schedule_table" rowspan="1"
                                colspan="1">Kelas</th>
                            <th style="text-align: center" tabindex="0" aria-controls="schedule_table" rowspan="1"
                                colspan="1">Jadwal</th>
                            <th style="text-align: center" tabindex="0" aria-controls="schedule_table" rowspan="1"
                                colspan="1">Jumlah Asisten</th>
                            <th style="text-align: center" tabindex="0" aria-controls="schedule_table" rowspan="1"
                                colspan="1">Ruangan</th>
                            <th tabindex="0" aria-controls="schedule_table" rowspan="1" colspan="1"
                                style="width: 125px; text-align: center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($classrooms as $classroom)
                        <tr>
                            <td tabindex="0">{{ $classroom->period_subject->subject->name }} - {{ $classroom->name }}</td>
                            <td>
                                @empty($classroom->schedule)
                                Belum ada jadwal ditentukan
                                @else
                                {{ $classroom->schedule->day .
                                ', ' .
                                $classroom->schedule->start_time .
                                ' - ' .
                                $classroom->schedule->end_time }}
                                @endempty
                            </td>
                            <td style="text-align: center;">
                                @empty($classroom->schedule)
                                -
                                @else
                                @empty($classroom->schedule->psrs_count)
                                Belum ada asprak memilih jadwal ini
                                @else
                                {{ $classroom->schedule->psrs_count }} / {{
                                $classroom->schedule->number_of_lab_assistant }}
                                @endempty
                                @endempty
                            </td>
                            <td style="text-align: center;">
                                @empty($classroom->schedule)
                                -
                                @else
                                {{ $classroom->schedule->room->building . ',' . $classroom->schedule->room->name }}
                                @endempty
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-between">
                                    @if (!$classroom->schedule)
                                    <!-- Add Schedule Button -->
                                    <button type="button" class="btn btn-block btn-sm btn-success" data-toggle="modal"
                                        data-target="#scheduleAddFormModal_{{ $loop->index }}">Tambah</button>
                                    <!-- Add Schedule Modal -->
                                    <div class="modal fade" id="scheduleAddFormModal_{{ $loop->index }}" tabindex="-1"
                                        data-backdrop="static" data-keyboard="false"
                                        aria-labelledby="scheduleAddFormModalLabel_{{ $loop->index }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title font-weight-bold"
                                                        id="scheduleAddFormModalLabel_{{ $loop->index }}">Buat
                                                        Jadwal
                                                        Praktikum</h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST"
                                                    action="{{ route('admin.practicum.schedule.store', $classroom) }}">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="day">Hari praktikum</label>
                                                            <select class="custom-select" name="day" id="day">
                                                                <option selected disabled hidden>Pilih Hari</option>
                                                                <option value="Senin">Senin</option>
                                                                <option value="Selasa">Selasa</option>
                                                                <option value="Rabu">Rabu</option>
                                                                <option value="Kamis">Kamis</option>
                                                                <option value="Jumat">Jumat</option>
                                                                <option value="Sabtu">Sabtu</option>
                                                                <option value="Minggu">Minggu</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="start_time">Jam mulai
                                                                praktikum</label>
                                                            <input type="time" id="start_time" name="start_time"
                                                                class="form-control" required autocomplete="off">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="end_time">Jam selesai
                                                                praktikum</label>
                                                            <input type="time" id="end_time" name="end_time"
                                                                class="form-control" required autocomplete="off">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="number_of_lab_assistant">Jumlah
                                                                Assisten</label>
                                                            <input type="number" id="number_of_lab_assistant"
                                                                name="number_of_lab_assistant" class="form-control"
                                                                required autocomplete="off" min="1"
                                                                max="{{ rand(1, 5) }}" placeholder="(masukkan angka)">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="room_id">Ruangan</label>
                                                            <select id="room_id" class="custom-select" name="room_id">
                                                                <option selected disabled hidden>Pilih ruangan
                                                                </option>
                                                                @forelse ($rooms as $room)
                                                                <option value="{{ $room->id }}">
                                                                    {{ $room->building }},
                                                                    {{ $room->name }}
                                                                </option>
                                                                @empty
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">SIMPAN
                                                            JADWAL</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <!-- Edit Schedule Button -->
                                    <div style="width:49%">
                                        <button type="button" class="btn btn-sm btn-block btn-primary"
                                            data-toggle="modal"
                                            data-target="#scheduleEditFormModal_{{ $loop->index }}">Edit</button>
                                    </div>
                                    <!-- Edit Schedule Modal -->
                                    <div class="modal fade" id="scheduleEditFormModal_{{ $loop->index }}" tabindex="-1"
                                        data-backdrop="static" data-keyboard="false"
                                        aria-labelledby="scheduleEditFormModalLabel_{{ $loop->index }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title font-weight-bold"
                                                        id="scheduleEditFormModalLabel_{{ $loop->index }}">
                                                        Ubah Jadwal
                                                        Praktikum</h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST"
                                                    action="{{ route('admin.practicum.schedule.update', $classroom->schedule) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="day">Hari praktikum</label>
                                                            <select class="custom-select" name="day" id="day">
                                                                <option selected disabled hidden>Pilih hari
                                                                    praktikum
                                                                </option>
                                                                <option value="Senin" {{ $classroom->schedule->day == "Senin" ? 'selected' : '' }}>Senin</option>
                                                                <option value="Selasa" {{ $classroom->schedule->day == "Selasa" ? 'selected' : '' }}>Selasa</option>
                                                                <option value="Rabu" {{ $classroom->schedule->day == "Rabu" ? 'selected' : '' }}>Rabu</option>
                                                                <option value="Kamis" {{ $classroom->schedule->day == "Kamis" ? 'selected' : '' }}>Kamis</option>
                                                                <option value="Jumat" {{ $classroom->schedule->day == "Jumat" ? 'selected' : '' }}>Jumat</option>
                                                                <option value="Sabtu" {{ $classroom->schedule->day == "Sabtu" ? 'selected' : '' }}>Sabtu</option>
                                                                <option value="Minggu" {{ $classroom->schedule->day == "Minggu" ? 'selected' : '' }}>Minggu</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="start_time">Jam mulai praktikum</label>
                                                            <input type="time" id="start_time" name="start_time"
                                                                class="form-control" required autocomplete="off"
                                                                value="{{ $classroom->schedule->start_time }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="end_time">Jam selesai praktikum</label>
                                                            <input type="time" id="end_time" name="end_time"
                                                                class="form-control" required autocomplete="off"
                                                                value="{{ $classroom->schedule->end_time }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="number_of_lab_assistant">Jumlah
                                                                Assisten</label>
                                                            <input type="number" id="number_of_lab_assistant"
                                                                name="number_of_lab_assistant" class="form-control"
                                                                required autocomplete="off"
                                                                placeholder="(masukkan angka)">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="room_id">Ruangan</label>
                                                            <select id="room_id" class="custom-select" name="room_id">
                                                                <option selected disabled hidden>Pilih ruangan
                                                                </option>
                                                                @forelse ($rooms as $room)
                                                                <option value="{{ $room->id }}" {{ $classroom->schedule->room->id == $room->id ? 'selected' : '' }}>
                                                                    {{ $room->building }},
                                                                    {{ $room->name }}
                                                                </option>
                                                                @empty
                                                                @endforelse
                                                            </select>
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
                                    <!-- Delete Subject Button -->
                                    <div style="width:49%">
                                        <button type="button" class="btn btn-sm btn-block btn-danger"
                                            data-toggle="modal"
                                            data-target="#confirmDeleteScheduleModal_{{ $loop->index }}">Hapus</button>
                                    </div>
                                    <!-- Delete Subject Modal -->
                                    <div class="modal fade" id="confirmDeleteScheduleModal_{{ $loop->index }}"
                                        tabindex="-1" data-backdrop="static" data-keyboard="false"
                                        aria-labelledby="confirmDeleteScheduleModalLabel_{{ $loop->index }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title font-weight-bold"
                                                        id="confirmDeleteScheduleModalLabel_{{ $loop->index }}">
                                                        Hapus Jadwal Praktikum
                                                    </h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Yakin untuk menghapus jadwal praktikum 'Mata Kuliah-XXX
                                                        R-YYY'?
                                                    </h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">BATALKAN</button>
                                                    <button type="button" class="btn btn-danger">HAPUS
                                                        DATA</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="text-align: center" rowspan="1" colspan="1">Kelas</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Jadwal</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Jumlah Asisten</th>
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
                            class="form-control" required autocomplete="off" min="1" value="{{ rand(1, 5) }}"
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
        $('#schedule_table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
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
        }).buttons().container().appendTo('#schedule_table_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection
