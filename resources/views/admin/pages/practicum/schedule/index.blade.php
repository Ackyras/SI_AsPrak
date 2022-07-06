@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title font-weight-bold">Data Jadwal Praktikum Periode AAAA BBBB/CCCC</h2>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#scheduleFormModal">
                    <i class="mr-2 fas fa-plus"></i>
                    Jadwal Praktikum Baru
                </button>
            </div>
        </div>

        <div class="card-body">
            <div id="period_subject_table_wrapper" class="dataTables_wrapper dt-bootstrap4 w-100">
                <table id="period_subject_table"
                    class="table table-bordered table-hover dataTable dtr-inline collapsed w-100"
                    aria-describedby="period_subject_table_info">
                    <thead>
                        <tr>
                            <th style="text-align: center" tabindex="0" aria-controls="period_subject_table" rowspan="1"
                                colspan="1">Kelas</th>
                            <th style="text-align: center" tabindex="0" aria-controls="period_subject_table" rowspan="1"
                                colspan="1">Jadwal</th>
                            <th style="text-align: center" tabindex="0" aria-controls="period_subject_table" rowspan="1"
                                colspan="1">Jumlah Asisten</th>
                            <th tabindex="0" aria-controls="period_subject_table" rowspan="1" colspan="1"
                                style="width: 90px; text-align: center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($classrooms as $classroom)
                        <tr>
                            <td tabindex="0">{{ $classroom->name }}</td>
                            <td style="text-align: center;">
                                <ul>

                                    @forelse ($classroom->schedules as $schedule)
                                    <li>
                                        Jadwal : {{ $schedule->pivot->day.', '.$schedule->pivot->start_time.' -
                                        '.$schedule->pivot->end_time
                                        }}
                                        ||
                                        Ruangan : {{ $schedule->building.', '.$schedule->name
                                        }}
                                    </li>
                                    @empty
                                    Belum ada jadwal ditentukan
                                    @endforelse
                                </ul>
                            </td>
                            <td style="text-align: center;">
                                {{ $classroom->registrar_count }}
                            </td>
                            <td style="text-align: center;">rand(Ruang {{ rand(111,999) }})</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-between">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                        data-target="#scheduleEditFormModal_1">Edit</button>
                                    <!-- Edit Schedule Modal -->
                                    <div class="modal fade" id="scheduleEditFormModal_1" tabindex="-1"
                                        data-backdrop="static" data-keyboard="false"
                                        aria-labelledby="scheduleEditFormModalLabel_1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title font-weight-bold"
                                                        id="scheduleEditFormModalLabel_1">Ubah Jadwal
                                                        Praktikum</h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="name">Kelas</label>
                                                            <input type="text" id="name" name="name"
                                                                class="form-control" required autocomplete="off"
                                                                placeholder="Nama mata kuliah"
                                                                value="Mata Kuliah-XXX R-YYY" readonly>
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
                                                            <input type="time" id="practicum_start"
                                                                name="practicum_start" class="form-control" required
                                                                autocomplete="off">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="practicum_end">Jam selesai praktikum</label>
                                                            <input type="time" id="practicum_end" name="practicum_end"
                                                                class="form-control" required autocomplete="off">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="number_of_lab_assistant">Jumlah Assisten</label>
                                                            <input type="number" id="number_of_lab_assistant"
                                                                name="number_of_lab_assistant" class="form-control"
                                                                required autocomplete="off" min="1"
                                                                value="{{ rand(1,5) }}" placeholder="(masukkan angka)">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="practicum_room">Ruangan</label>
                                                            <select id="practicum_room" class="custom-select"
                                                                name="practicum_room">
                                                                <option selected disabled hidden>Pilih ruangan</option>
                                                                <option value="AAA">AAA</option>
                                                                <option value="BBB">BBB</option>
                                                                <option value="CCC">CCC</option>
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
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#confirmDeleteScheduleModal_1">Hapus</button>
                                    <!-- Delete Subject Modal -->
                                    <div class="modal fade" id="confirmDeleteScheduleModal_1" tabindex="-1"
                                        data-backdrop="static" data-keyboard="false"
                                        aria-labelledby="confirmDeleteScheduleModalLabel_1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h3 class="modal-title font-weight-bold"
                                                        id="confirmDeleteScheduleModalLabel_1">
                                                        Hapus Jadwal Praktikum
                                                    </h3>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Yakin untuk menghapus jadwal praktikum 'Mata Kuliah-XXX R-YYY'?
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
            $('#period_subject_table').DataTable({
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
            }).buttons().container().appendTo('#period_subject_table_wrapper .col-md-6:eq(0)');
        });
</script>
@endsection
