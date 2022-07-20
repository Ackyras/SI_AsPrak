@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title font-weight-bold">Data Jadwal Asisten Praktikum Periode {{ $period->name }}</h2>
        </div>

        <div class="card-body">
            <div id="assistant_schedule_table_wrapper" class="dataTables_wrapper dt-bootstrap4 w-100">
                <table id="assistant_schedule_table" class="table table-bordered table-hover dataTable dtr-inline collapsed w-100"
                    aria-describedby="assistant_schedule_table_info">
                    <thead>
                        <tr>
                            <th style="text-align: center" tabindex="0" aria-controls="assistant_schedule_table" rowspan="1"
                                colspan="1">Nama</th>
                            <th style="text-align: center" tabindex="0" aria-controls="assistant_schedule_table" rowspan="1"
                                colspan="1">NIM</th>
                            <th style="text-align: center" tabindex="0" aria-controls="assistant_schedule_table" rowspan="1"
                                colspan="1">Kelas Praktikum</th>
                            <th style="text-align: center" tabindex="0" aria-controls="assistant_schedule_table" rowspan="1"
                                colspan="1">Jadwal</th>
                            <th style="text-align: center" tabindex="0" aria-controls="assistant_schedule_table" rowspan="1"
                                colspan="1">Ruangan</th>
                            <th tabindex="0" aria-controls="assistant_schedule_table" rowspan="1" colspan="1"
                                style="width: 125px; text-align: center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $classes = array(
                                "Manajemen Proyek Teknologi Informasi RA",
                                "Manajemen Proyek Teknologi Informasi RB",
                                "Manajemen Proyek Teknologi Informasi RC",
                                "Manajemen Proyek Teknologi Informasi RD",
                                "Dasar Rekayasa Perangkat Lunak RA",
                                "Dasar Rekayasa Perangkat Lunak RB",
                                "Dasar Rekayasa Perangkat Lunak RC",
                                "Dasar Rekayasa Perangkat Lunak RD",
                                "Sosiologi RA",
                                "Sosiologi RB",
                                "Sosiologi RC",
                                "Sosiologi RD",
                            );
                            $days = array(
                                "Senin", "Selasa", "Rabu", "Kamis", "Jumat",
                            );
                            $hours = array(
                                "07.00", "09.00", "11.00", "13.00", "15.00", "17.00"
                            );
                            $rooms = array(
                                "A101", "A102", "B101", "B102", "C101", "C102"
                            );
                            $names = array(
                                "Markus", "Togi", "Fedrian", "Rivaldi", "Sinaga",
                                "Ganteng", "Baik", "Tampan", "Kuat", "Bijaksana"
                            );
                            $assistants = array(
                                (object)[
                                    "name"      => $names[rand(0,4)] . " " . $names[rand(5,9)],
                                    "nim"       => rand(118140001,118140100),
                                    "class"     => null,
                                    "schedule"  => null,
                                    "room"      => null,
                                ],
                                (object)[
                                    "name"      => $names[rand(0,4)] . " " . $names[rand(5,9)],
                                    "nim"       => rand(118140001,118140100),
                                    "class"     => null,
                                    "schedule"  => null,
                                    "room"      => null,
                                ],
                                (object)[
                                    "name"      => $names[rand(0,4)] . " " . $names[rand(5,9)],
                                    "nim"       => rand(118140001,118140100),
                                    "class"     => null,
                                    "schedule"  => null,
                                    "room"      => null,
                                ],
                                (object)[
                                    "name"      => $names[rand(0,4)] . " " . $names[rand(5,9)],
                                    "nim"       => rand(118140001,118140100),
                                    "class"     => null,
                                    "schedule"  => null,
                                    "room"      => null,
                                ],
                                (object)[
                                    "name"      => $names[rand(0,4)] . " " . $names[rand(5,9)],
                                    "nim"       => rand(118140001,118140100),
                                    "class"     => null,
                                    "schedule"  => null,
                                    "room"      => null,
                                ],
                                (object)[
                                    "name"      => $names[rand(0,4)] . " " . $names[rand(5,9)],
                                    "nim"       => rand(118140001,118140100),
                                    "class"     => $classes[rand(0,11)],
                                    "schedule"  => $days[rand(0,4)] . ", " . $hours[rand(0,2)] . " - " . $hours[rand(3,5)],
                                    "room"      => $rooms[rand(0,5)],
                                ],
                                (object)[
                                    "name"      => $names[rand(0,4)] . " " . $names[rand(5,9)],
                                    "nim"       => rand(118140001,118140100),
                                    "class"     => $classes[rand(0,11)],
                                    "schedule"  => $days[rand(0,4)] . ", " . $hours[rand(0,2)] . " - " . $hours[rand(3,5)],
                                    "room"      => $rooms[rand(0,5)],
                                ],
                                (object)[
                                    "name"      => $names[rand(0,4)] . " " . $names[rand(5,9)],
                                    "nim"       => rand(118140001,118140100),
                                    "class"     => $classes[rand(0,11)],
                                    "schedule"  => $days[rand(0,4)] . ", " . $hours[rand(0,2)] . " - " . $hours[rand(3,5)],
                                    "room"      => $rooms[rand(0,5)],
                                ],
                                (object)[
                                    "name"      => $names[rand(0,4)] . " " . $names[rand(5,9)],
                                    "nim"       => rand(118140001,118140100),
                                    "class"     => $classes[rand(0,11)],
                                    "schedule"  => $days[rand(0,4)] . ", " . $hours[rand(0,2)] . " - " . $hours[rand(3,5)],
                                    "room"      => $rooms[rand(0,5)],
                                ],
                                (object)[
                                    "name"      => $names[rand(0,4)] . " " . $names[rand(5,9)],
                                    "nim"       => rand(118140001,118140100),
                                    "class"     => $classes[rand(0,11)],
                                    "schedule"  => $days[rand(0,4)] . ", " . $hours[rand(0,2)] . " - " . $hours[rand(3,5)],
                                    "room"      => $rooms[rand(0,5)],
                                ],
                                (object)[
                                    "name"      => $names[rand(0,4)] . " " . $names[rand(5,9)],
                                    "nim"       => rand(118140001,118140100),
                                    "class"     => $classes[rand(0,11)],
                                    "schedule"  => $days[rand(0,4)] . ", " . $hours[rand(0,2)] . " - " . $hours[rand(3,5)],
                                    "room"      => $rooms[rand(0,5)],
                                ],
                                (object)[
                                    "name"      => $names[rand(0,4)] . " " . $names[rand(5,9)],
                                    "nim"       => rand(118140001,118140100),
                                    "class"     => $classes[rand(0,11)],
                                    "schedule"  => $days[rand(0,4)] . ", " . $hours[rand(0,2)] . " - " . $hours[rand(3,5)],
                                    "room"      => $rooms[rand(0,5)],
                                ],
                                (object)[
                                    "name"      => $names[rand(0,4)] . " " . $names[rand(5,9)],
                                    "nim"       => rand(118140001,118140100),
                                    "class"     => $classes[rand(0,11)],
                                    "schedule"  => $days[rand(0,4)] . ", " . $hours[rand(0,2)] . " - " . $hours[rand(3,5)],
                                    "room"      => $rooms[rand(0,5)],
                                ],
                                (object)[
                                    "name"      => $names[rand(0,4)] . " " . $names[rand(5,9)],
                                    "nim"       => rand(118140001,118140100),
                                    "class"     => $classes[rand(0,11)],
                                    "schedule"  => $days[rand(0,4)] . ", " . $hours[rand(0,2)] . " - " . $hours[rand(3,5)],
                                    "room"      => $rooms[rand(0,5)],
                                ],
                                (object)[
                                    "name"      => $names[rand(0,4)] . " " . $names[rand(5,9)],
                                    "nim"       => rand(118140001,118140100),
                                    "class"     => $classes[rand(0,11)],
                                    "schedule"  => $days[rand(0,4)] . ", " . $hours[rand(0,2)] . " - " . $hours[rand(3,5)],
                                    "room"      => $rooms[rand(0,5)],
                                ],
                                (object)[
                                    "name"      => $names[rand(0,4)] . " " . $names[rand(5,9)],
                                    "nim"       => rand(118140001,118140100),
                                    "class"     => $classes[rand(0,11)],
                                    "schedule"  => $days[rand(0,4)] . ", " . $hours[rand(0,2)] . " - " . $hours[rand(3,5)],
                                    "room"      => $rooms[rand(0,5)],
                                ],
                                (object)[
                                    "name"      => $names[rand(0,4)] . " " . $names[rand(5,9)],
                                    "nim"       => rand(118140001,118140100),
                                    "class"     => $classes[rand(0,11)],
                                    "schedule"  => $days[rand(0,4)] . ", " . $hours[rand(0,2)] . " - " . $hours[rand(3,5)],
                                    "room"      => $rooms[rand(0,5)],
                                ],
                                (object)[
                                    "name"      => $names[rand(0,4)] . " " . $names[rand(5,9)],
                                    "nim"       => rand(118140001,118140100),
                                    "class"     => $classes[rand(0,11)],
                                    "schedule"  => $days[rand(0,4)] . ", " . $hours[rand(0,2)] . " - " . $hours[rand(3,5)],
                                    "room"      => $rooms[rand(0,5)],
                                ],
                            );
                            $subjects = array(
                                "Manajemen Proyek Teknologi Informasi", "Dasar Rekayasa Perangkat Lunak", "Sosiologi"
                            );
                            $subject_classes = array(
                                "RA", "RB", "RC", "RD"
                            );
                            $schedules = array();
                            
                            for($i=0; $i<3; $i++){
                                for($j=0; $j<4; $j++){
                                    array_push(
                                        $schedules,
                                        (object)[
                                            "subject"       => $subjects[$i],
                                            "class"         => $subject_classes[$j],
                                            "schedule"      => $days[rand(0,4)] . ", " . $hours[rand(0,2)] . " - " . $hours[rand(3,5)],
                                            "room"          => $rooms[rand(0,5)],
                                        ]
                                    );
                                }
                            }
                        @endphp
                        @forelse ($assistants as $assistant)
                            <tr>
                                <td tabindex="0">{{ $assistant->name }}</td>
                                <td class="text-center">{{ $assistant->nim }}</td>
                                
                                @if ($assistant->class)
                                    <td> {{ $assistant->class }} </td>
                                @else
                                    <td class="text-secondary font-italic text-warning"> Asisten ini belum memilih kelas </td>
                                @endif
                                
                                @if ($assistant->schedule)
                                    <td> {{ $assistant->schedule }} </td>
                                @else
                                    <td class="text-center"> - </td>
                                @endif

                                <td class="text-center">
                                    @if ($assistant->room)
                                        {{ $assistant->room }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <!-- Add/Edit Schedule Button -->
                                        <button type="button" 
                                            class="btn btn-block btn-sm {{ $assistant->class ? 'btn-primary' : 'btn-success' }}" 
                                            data-toggle="modal" data-target="#setAssistantScheduleFormModal_{{ $loop->index }}">
                                            @if ($assistant->class)
                                                Ubah Jadwal
                                            @else
                                                Tentukan Jadwal
                                            @endif
                                        </button>
                                        <!-- Add/Edit Schedule Modal -->
                                        <div class="modal fade" id="setAssistantScheduleFormModal_{{ $loop->index }}" tabindex="-1"
                                            data-backdrop="static" data-keyboard="false" aria-hidden="true"
                                            aria-labelledby="setAssistantScheduleFormModalLabel_{{ $loop->index }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title font-weight-bold" 
                                                            id="setAssistantScheduleFormModalLabel_{{ $loop->index }}">
                                                            @if ($assistant->class)
                                                                Ubah Jadwal Praktikum Asisten
                                                            @else
                                                                Tentukan Jadwal Praktikum Asisten
                                                            @endif
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    @php
                                                        $random = rand(0,2);
                                                        $gegayaan = $random * 4;
                                                    @endphp
                                                    <form method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <h6 class="d-block m-0 mb-2">
                                                                Mata Kuliah : <span class="font-weight-bold">{{ $schedules[$gegayaan]->subject }}</span>
                                                            </h6>
                                                            <p class="d-block m-0 mb-1 font-weight-bold">
                                                                Pilih Jadwal
                                                            </p>
                                                            <div style="max-height: 50vh; overflow-y:auto;" class="p-1 bg-light">
                                                                @for ($i=0; $i<4; $i++)    
                                                                    <div class="d-flex align-items-center mb-2 border p-1 bg-white rounded-sm">
                                                                        <input type="radio" name="schedule" value="{{ $i }}"
                                                                            class="d-block mx-3" 
                                                                            id="schedule_{{ $loop->index }}_{{ $i }}">
                                                                        <label class="d-block m-0 w-100" for="schedule_{{ $loop->index }}_{{ $i }}">
                                                                            <p class="d-flex m-0 mb-1">
                                                                                <span class="font-weight-normal w-25">Kelas</span>
                                                                                <span>{{ $schedules[$i+$gegayaan]->class }}</span>
                                                                            </p>
                                                                            <p class="d-flex m-0 mb-1">
                                                                                <span class="font-weight-normal w-25">Jadwal</span>
                                                                                <span>{{ $schedules[$i+$gegayaan]->schedule }}</span>
                                                                            </p>
                                                                            <p class="d-flex m-0">
                                                                                <span class="font-weight-normal w-25">Ruangan</span>
                                                                                <span>{{ $schedules[$i+$gegayaan]->room }}</span>
                                                                            </p>
                                                                        </label>
                                                                    </div>
                                                                @endfor
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
                                    </div>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="text-align: center" rowspan="1" colspan="1">Nama</th>
                            <th style="text-align: center" rowspan="1" colspan="1">NIM</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Kelas Praktikum</th>
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

@endsection

@section('scripts')
<script>
    $(function() {
            $('#assistant_schedule_table').DataTable({
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
                            columns: [0, 1, 2, 3, 4,]
                        }
                    },
                    {
                        extend: "excel",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4,]
                        }
                    },
                    {
                        extend: "csv",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4,]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4,]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4,]
                        }
                    },
                    "colvis"
                ]
            }).buttons().container().appendTo('#assistant_schedule_table_wrapper .col-md-6:eq(0)');
        });
</script>
@endsection
