@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title font-weight-bold">Data Jadwal Asisten Praktikum Periode {{ $period->name }}</h2>
        </div>

        <div class="card-body">
            <div id="assistant_schedule_table_wrapper" class="dataTables_wrapper dt-bootstrap4 w-100">
                <table id="assistant_schedule_table"
                    class="table table-bordered table-hover dataTable dtr-inline collapsed w-100"
                    aria-describedby="assistant_schedule_table_info">
                    <thead>
                        <tr>
                            <th style="text-align: center" tabindex="0" aria-controls="assistant_schedule_table"
                                rowspan="1" colspan="1">Nama</th>
                            <th style="text-align: center" tabindex="0" aria-controls="assistant_schedule_table"
                                rowspan="1" colspan="1">NIM</th>
                            <th style="text-align: center" tabindex="0" aria-controls="assistant_schedule_table"
                                rowspan="1" colspan="1">Jadwal Praktikum</th>
                            <th style="text-align: center" tabindex="0" aria-controls="assistant_schedule_table"
                                rowspan="1" colspan="1">MK dan Kelas</th>
                            <th style="text-align: center" tabindex="0" aria-controls="assistant_schedule_table"
                                rowspan="1" colspan="1">Ruangan</th>
                            <th tabindex="0" aria-controls="assistant_schedule_table" rowspan="1" colspan="1"
                                style="width: 125px; text-align: center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($psrs as $psr)
                        <tr>
                            <td tabindex="0">{{ $psr->registrar->name }}</td>
                            <td class="text-center">{{ $psr->registrar->nim }}</td>

                            @isset($psr->schedules)
                            <td>
                                <ol>
                                    @forelse ($psr->schedules as $schedule)
                                    <li>
                                        {{ $schedule->day }},
                                        {{ $schedule->start_time }} -
                                        {{ $schedule->end_time }}
                                    </li>
                                    @empty
                                    @endforelse
                                </ol>
                            </td>
                            @else
                            <td class="text-secondary font-italic text-warning"> Asisten ini belum memilih
                                Jadwal </td>
                            @endisset

                            @isset($psr->schedule->classroom)
                            <td> {{ $psr->period_subject->subject->name }} -
                                {{ $psr->schedule->classroom->name }}</td>
                            @else
                            <td class="text-center"> - </td>
                            @endisset

                            <td class="text-center">
                                @isset($psr->schedule->room)
                                {{ $psr->schedule->room->building }} - {{ $psr->schedule->room->name }}
                                @else
                                -
                                @endisset
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-between">
                                    <!-- Add/Edit Schedule Button -->
                                    <button type="button"
                                        class="btn btn-block btn-sm {{ $psr->class ? 'btn-primary' : 'btn-success' }}"
                                        data-toggle="modal"
                                        data-target="#setAssistantScheduleFormModal_{{ $loop->index }}">
                                        @if ($psr->class)
                                        Ubah Jadwal
                                        @else
                                        Tentukan Jadwal
                                        @endif
                                    </button>
                                    <!-- Add/Edit Schedule Modal -->
                                    <div class="modal fade" id="setAssistantScheduleFormModal_{{ $loop->index }}"
                                        tabindex="-1" data-backdrop="static" data-keyboard="false" aria-hidden="true"
                                        aria-labelledby="setAssistantScheduleFormModalLabel_{{ $loop->index }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title font-weight-bold"
                                                        id="setAssistantScheduleFormModalLabel_{{ $loop->index }}">
                                                        @if ($psr->class)
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
                                                <form method="POST"
                                                    action="{{ route('admin.assistant.schedule.store') }}">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <h6 class="d-block m-0 mb-2">
                                                            Mata Kuliah :
                                                            <span class="font-weight-bold">
                                                                {{ $psr->period_subject->subject->name }}
                                                            </span>
                                                        </h6>
                                                        <p class="d-block m-0 mb-1 font-weight-bold">
                                                            Pilih Jadwal
                                                        </p>
                                                        <div style="max-height: 50vh; overflow-y:auto;"
                                                            class="p-1 bg-light">
                                                            @forelse ($schedules->where('classroom.period_subject.id',
                                                            $psr->period_subject->id) as $schedule)
                                                            <div
                                                                class="d-flex align-items-center mb-2 border p-1 bg-white rounded-sm">
                                                                <input type="radio" name="schedule_id"
                                                                    value="{{ $schedule->id }}" class="d-block mx-3"
                                                                    id="schedule_{{ $loop->index }}_{{ $schedule->id }}"
                                                                    @isset($psr->schedule) @selected($psr->schedule->id
                                                                == $schedule->id) @endisset
                                                                {{ $schedule->psrs_count >=
                                                                $schedule->number_of_lab_assistant ? 'disabled' : '' }}>
                                                                <label class="d-block m-0 w-100"
                                                                    for="schedule_{{ $loop->index }}_{{ $schedule->id }}">
                                                                    <p class="d-flex m-0 mb-1">
                                                                        <span class="font-weight-normal w-25">Kelas
                                                                        </span>
                                                                        <span>{{ $schedule->classroom->name }}
                                                                        </span>
                                                                    </p>
                                                                    <p class="d-flex m-0 mb-1">
                                                                        <span class="font-weight-normal w-25">Jadwal
                                                                        </span>
                                                                        <span>{{ $schedule->day }},
                                                                            {{ $schedule->start_time }} -
                                                                            {{ $schedule->end_time }}
                                                                        </span>
                                                                    </p>
                                                                    <p class="d-flex m-0">
                                                                        <span class="font-weight-normal w-25">Ruangan
                                                                        </span>
                                                                        <span>{{ $schedule->room->building }},
                                                                            {{ $schedule->room->name }}
                                                                        </span>
                                                                    </p>
                                                                    {{ $schedule->psrs_count >=
                                                                    $schedule->number_of_lab_assistant ? 'Asisten
                                                                    praktikum untuk kelas ini sudah penuh' : ''
                                                                    }}
                                                                </label>
                                                            </div>
                                                            @empty
                                                            @endforelse
                                                            {{-- @for ($i = 0; $i < 4; $i++) <div
                                                                class="d-flex align-items-center mb-2 border p-1 bg-white rounded-sm">
                                                                <input type="radio" name="schedule" value="{{ $i }}"
                                                                    class="d-block mx-3"
                                                                    id="schedule_{{ $loop->index }}_{{ $i }}">
                                                                <label class="d-block m-0 w-100"
                                                                    for="schedule_{{ $loop->index }}_{{ $i }}">
                                                                    <p class="d-flex m-0 mb-1">
                                                                        <span class="font-weight-normal w-25">Kelas
                                                                        </span>
                                                                        <span>{{ $schedules[$i + $gegayaan]->class }}
                                                                        </span>
                                                                    </p>
                                                                    <p class="d-flex m-0 mb-1">
                                                                        <span class="font-weight-normal w-25">Jadwal
                                                                        </span>
                                                                        <span>{{ $schedules[$i + $gegayaan]->schedule }}
                                                                        </span>
                                                                    </p>
                                                                    <p class="d-flex m-0">
                                                                        <span class="font-weight-normal w-25">Ruangan
                                                                        </span>
                                                                        <span>{{ $schedules[$i + $gegayaan]->room }}
                                                                        </span>
                                                                    </p>
                                                                </label>
                                                        </div>
                                                        @endfor --}}
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
                            columns: [0, 1, 2, 3, 4, ]
                        }
                    },
                    {
                        extend: "excel",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, ]
                        }
                    },
                    {
                        extend: "csv",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, ]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, ]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, ]
                        }
                    },
                    "colvis"
                ]
            }).buttons().container().appendTo('#assistant_schedule_table_wrapper .col-md-6:eq(0)');
        });
</script>
@endsection
