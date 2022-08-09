@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title font-weight-bold">Data Asisten Praktikum Mata Kuliah {{
                    $period_subject->subject->name }} Kelas ??</h2>
            </div>
        </div>
        <div class="card-body">
            <div id="subject_assistant_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="mb-2 btn-group">
                    <button style="background-color: #9ca3af;" type="button" class="btn dropdown-toggle"
                        data-toggle="dropdown" aria-expanded="false">
                        Filter Data
                    </button>
                    <div class="dropdown-menu">
                        <a href="{{ route('admin.practicum.lab-assistant.index') }}"
                            class="dropdown-item {{ request()->routeIs('admin.practicum.lab-assistant.index') ? 'bg-info' : '' }}">
                            Berdasarkan Nama Asisten
                        </a>
                        <div class="dropdown-divider"></div>
                        @forelse ($subjects as $subject)
                        <a class="dropdown-item"
                            href="{{ route('admin.practicum.lab-assistant.subject-based', ['period_subject_id'=> $subject->pivot->id]) }}">
                            {{ $subject->name }}
                        </a>
                        @empty

                        @endforelse
                    </div>
                </div>
                <table id="subject_assistant_table"
                    class="table table-bordered table-hover dataTable dtr-inline collapsed"
                    aria-describedby="subject_assistant_table_info">
                    <thead>
                        <tr>
                            <th style="text-align:center; padding:none; vertical-align:center;" tabindex="0"
                                aria-controls="subject_assistant_table" rowspan="2" colspan="1">
                                <p>Nama</p>
                            </th>
                            <th style="text-align: center" tabindex="0" aria-controls="subject_assistant_table"
                                rowspan="2" colspan="1">
                                <p>NIM</p>
                            </th>
                            <th style="text-align: center" tabindex="0" aria-controls="subject_assistant_table"
                                rowspan="1" colspan="{{ $jumlah_pertemuan }}">
                                Kehadiran Petemuan
                            </th>
                            <th tabindex="0" aria-controls="period_subject_table" rowspan="2" colspan="1"
                                style="width: 90px; text-align: center">
                                <p>Keaktifan</p>
                            </th>
                        </tr>
                        <tr>
                            @for ($i = 1; $i <= $jumlah_pertemuan; $i++) <th style="padding:none; text-align:center;">{{
                                $i }}</th>
                                @endfor
                        </tr>
                    </thead>

                    <tbody>
                        {{-- @forelse ($lab_assistants as $lab_assistant)
                        <tr class="">
                            <td tabindex="0">{{ $lab_assistant->name }}</td>
                            <td>{{ $lab_assistant->nim }}</td>
                            <td>
                                @if ($lab_assistant->schedules_count > 0)
                                {{ $lab_assistant->presences_count /
                                $lab_assistant->schedules_count * 100}}%
                                @else
                                Belum ada jadwal ditentukan
                                @endif
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a role="button" href="" class="btn btn-sm btn-success">Lihat Detail</a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        @endforelse --}}
                        @foreach ($data_kehadiran as $data)
                        <tr>
                            <td tabindex="0">{{ $data->nama }}</td>
                            <td class="text-center">{{ $data->nim }}</td>
                            @php
                            $jumlah_hadir = 0;
                            @endphp
                            @foreach ($data->kehadiran as $khdrn)
                            <td class="text-center">
                                @if ($khdrn->hadir)
                                @php
                                $jumlah_hadir++;
                                @endphp
                                <i class="fas fa-check-circle text-success"></i>
                                @else
                                <i class="fas fa-times-circle text-danger"></i>
                                @endif
                            </td>
                            @endforeach
                            <td class="text-center font-weight-bold">
                                {{ number_format(($jumlah_hadir/$jumlah_pertemuan) * 100, 2) }}%
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    {{-- <tfoot>
                        <tr>
                            <th style="text-align: center" rowspan="1" colspan="1">Nama</th>
                            <th style="text-align: center" rowspan="1" colspan="1">NIM</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Keaktifan</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Aksi</th>
                        </tr>
                    </tfoot> --}}
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        $("#subject_assistant_table").DataTable({
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
        }).buttons().container().appendTo('#subject_assistant_table_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection
