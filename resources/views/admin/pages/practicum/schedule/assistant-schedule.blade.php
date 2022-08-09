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
                                rowspan="1" colspan="1">Mata Kuliah</th>
                            <th style="text-align: center" tabindex="0" aria-controls="assistant_schedule_table"
                                rowspan="1" colspan="1">Kelas - Jadwal</th>
                            <th style="text-align: center" tabindex="0" aria-controls="assistant_schedule_table"
                                rowspan="1" colspan="1">Ruangan</th>
                            <th tabindex="0" aria-controls="assistant_schedule_table" rowspan="1" colspan="1"
                                style="width: 125px; text-align: center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $row = 0; @endphp
                        @forelse ($psrs as $psr)
                        <tr>
                            <td tabindex="0">
                                {{ $psr->registrar->name }}
                            </td>
                            <td class="text-center">{{ $psr->registrar->nim }}</td>
                            <td> {{ $psr->period_subject->subject->name }} </td>

                            @php
                            $current_row_schedules = array();
                            $row++;
                            @endphp

                            {{-- @isset($psr->schedules->count() > 0) --}}
                            @if($psr->schedules->count() > 0)
                            <td>
                                @if ($psr->schedules->count() > 1)
                                <div style="display:flex; flex-direction:column; gap:2px;">
                                    @forelse ($psr->schedules as $schedule)
                                    <p class="m-0 d-block">
                                        <span class="font-weight-bold">{{ $loop->index + 1 }})</span>
                                        Kelas {{ $schedule->classroom->name }} -
                                        {{ $schedule->day }},
                                        {{ $schedule->start_time }} -
                                        {{ $schedule->end_time }}
                                    </p>
                                    @php array_push($current_row_schedules,$schedule->id); @endphp
                                    @endforelse
                                </div>
                                @else
                                @forelse ($psr->schedules as $schedule)
                                <p class="m-0 d-block">
                                    Kelas {{ $schedule->classroom->name }} -
                                    {{ $schedule->day }},
                                    {{ $schedule->start_time }} -
                                    {{ $schedule->end_time }}
                                </p>
                                @endforelse
                                @endif
                            </td>
                            @else
                            <td class="text-secondary font-italic text-warning">
                                Asisten ini belum memilih Jadwal
                            </td>
                            @endif
                            {{-- @endisset --}}

                            {{-- @isset($psr->schedules->count() > 0) --}}
                            @if($psr->schedules->count() > 0)
                            <td>
                                @if ($psr->schedules->count() > 1)
                                <div style="display:flex; flex-direction:column; gap:2px;">
                                    @forelse ($psr->schedules as $schedule)
                                    <p class="m-0 d-block">
                                        <span class="font-weight-bold">{{ $loop->index + 1 }})</span>
                                        {{ $schedule->room->building }}, {{ $schedule->room->name }}
                                    </p>
                                    @endforelse
                                </div>
                                @else
                                @forelse ($psr->schedules as $schedule)
                                <p class="m-0 d-block">
                                    {{ $schedule->room->building }}, {{ $schedule->room->name }}
                                </p>
                                @endforelse
                                @endif
                            </td>
                            @else
                            <td class="text-secondary font-italic text-warning"> - </td>
                            {{-- @endisset --}}
                            @endif
                            <td>
                                <div class="d-flex align-items-center justify-content-between">
                                    <!-- Add/Edit Schedule Button -->
                                    <button type="button"
                                        class="btn btn-block btn-sm {{ $psr->schedules->count() > 0 ? 'btn-primary' : 'btn-success' }}"
                                        data-toggle="modal" data-target="#setAssistantScheduleFormModal_{{ $psr->id }}">
                                        @if ($psr->schedules->count() > 0)
                                        Ubah Jadwal
                                        @else
                                        Tentukan Jadwal
                                        @endif
                                    </button>
                                    <!-- Add/Edit Schedule Modal -->
                                    <div class="modal fade" id="setAssistantScheduleFormModal_{{ $psr->id }}"
                                        tabindex="-1" data-backdrop="static" data-keyboard="false" aria-hidden="true"
                                        aria-labelledby="setAssistantScheduleFormModalLabel_{{ $psr->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title font-weight-bold"
                                                        id="setAssistantScheduleFormModalLabel_{{ $psr->id }}">
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
                                                    <input type="hidden" name="psr_id" value="{{ $psr->id }}">
                                                    <div class="modal-body">
                                                        <h6 class="m-0 mb-2 d-block">
                                                            Mata Kuliah :
                                                            <span class="font-weight-bold">
                                                                {{ $psr->period_subject->subject->name }}
                                                            </span>
                                                        </h6>
                                                        <p class="m-0 mb-1 d-block font-weight-bold">
                                                            Pilih Jadwal
                                                        </p>
                                                        <div style="max-height: 50vh; overflow-y:auto;"
                                                            class="p-1 bg-light">
                                                            @forelse ($schedules->where('classroom.period_subject.id',
                                                            $psr->period_subject->id) as $schedule)
                                                            <div
                                                                class="p-1 mb-2 bg-white border rounded-sm d-flex align-items-center">
                                                                <input type="checkbox" name="schedule[]"
                                                                    value="{{ $schedule->id }}" class="mx-3 d-block"
                                                                    id="schedule_{{ $row }}_{{ $schedule->id }}" {{
                                                                    in_array($schedule->id, $current_row_schedules) ?
                                                                'checked' : '' }}
                                                                {{
                                                                ($schedule->psrs_count >=
                                                                $schedule->number_of_lab_assistant)
                                                                &&
                                                                (!in_array($schedule->id, $current_row_schedules))
                                                                ? 'disabled' : ''
                                                                }}>
                                                                <label class="m-0 d-block w-100"
                                                                    for="schedule_{{ $row }}_{{ $schedule->id }}">
                                                                    <p class="m-0 mb-1 d-flex">
                                                                        <span class="font-weight-normal w-25">Kelas
                                                                        </span>
                                                                        <span>{{ $schedule->classroom->name }}
                                                                        </span>
                                                                    </p>
                                                                    <p class="m-0 mb-1 d-flex">
                                                                        <span class="font-weight-normal w-25">Jadwal
                                                                        </span>
                                                                        <span>{{ $schedule->day }},
                                                                            {{ $schedule->start_time }} -
                                                                            {{ $schedule->end_time }}
                                                                        </span>
                                                                    </p>
                                                                    <p class="m-0 mb-1 d-flex">
                                                                        <span class="font-weight-normal w-25">Ruangan
                                                                        </span>
                                                                        <span>{{ $schedule->room->building }},
                                                                            {{ $schedule->room->name }}
                                                                        </span>
                                                                    </p>
                                                                    <p class="m-0 d-flex">
                                                                        <span class="font-weight-normal w-25">Asisten
                                                                        </span>
                                                                        <span>
                                                                            {{ $schedule->psrs_count }}/{{
                                                                            $schedule->number_of_lab_assistant }}
                                                                        </span>
                                                                    </p>
                                                                    @if ($schedule->psrs_count >=
                                                                    $schedule->number_of_lab_assistant)
                                                                    @if (in_array($schedule->id,
                                                                    $current_row_schedules))
                                                                    <small class="mt-1 text-warning font-italic">
                                                                        Menghapus centang akan mengeluarkan asisten
                                                                        praktikum ini dari jadwal.
                                                                    </small>
                                                                    @else
                                                                    <small class="mt-1 text-danger font-italic">
                                                                        Jumlah asisten untuk jadwal ini sudah penuh.
                                                                    </small>
                                                                    @endif
                                                                    @endif
                                                                </label>
                                                            </div>
                                                            @empty
                                                            @endforelse
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit"
                                                            class="btn {{ $psr->schedules->count() > 0 ? 'btn-primary' : 'btn-success' }}">
                                                            @if ($psr->schedules->count() > 0)
                                                            SIMPAN PERUBAHAN
                                                            @else
                                                            SIMPAN JADWAL
                                                            @endif
                                                        </button>
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
                            <th style="text-align: center" rowspan="1" colspan="1">Mata Kuliah</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Kelas Jadwal</th>
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
                "ordering": false,
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
                ],
                "orders": false
            }).buttons().container().appendTo('#assistant_schedule_table_wrapper .col-md-6:eq(0)');
        });
</script>
@endsection
