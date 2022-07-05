@extends('admin.layouts.app')

@section('content')
    <div class="p-2">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h2 class="card-title font-weight-bold">Data Mata Kuliah Periode {{ $period->name }}</h2>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#subjectFormModal">
                        <i class="fas fa-plus mr-2"></i>
                        Mata Kuliah Baru
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
                                <th style="text-align: center" tabindex="0" aria-controls="period_subject_table"
                                    rowspan="1" colspan="1">Nama Mata Kuliah</th>
                                <th style="text-align: center" tabindex="0" aria-controls="period_subject_table"
                                    rowspan="1" colspan="1">Jumlah Kelas</th>
                                <th style="text-align: center" tabindex="0" aria-controls="period_subject_table"
                                    rowspan="1" colspan="1">Kuota Asisten</th>
                                <th style="text-align: center" tabindex="0" aria-controls="period_subject_table"
                                    rowspan="1" colspan="1">Tanggal Awal Ujian</th>
                                <th style="text-align: center" tabindex="0" aria-controls="period_subject_table"
                                    rowspan="1" colspan="1">Tanggal Akhir Ujian</th>
                                <th tabindex="0" aria-controls="period_subject_table" rowspan="1" colspan="1"
                                    style="width: 90px; text-align: center">Aksi</th>
                                {{-- style="width: 150px; text-align: center">Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($period->subjects as $subject)
                                <tr>
                                    <td tabindex="0">{{ $subject->name }}</td>
                                    <td style="text-align: center;">rand({{ rand(1,4) }})</td>
                                    <td style="text-align: center;">{{ $subject->pivot->number_of_lab_assistant }}</td>
                                    <td style="text-align: center;">{{ $subject->pivot->exam_start }}</td>
                                    <td style="text-align: center;">{{ $subject->pivot->exam_end }}</td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#subjectEditFormModal{{ $subject->id }}">Edit</button>
                                            <!-- Edit Subject Modal -->
                                            <div class="modal fade" id="subjectEditFormModal{{ $subject->id }}"
                                                tabindex="-1" data-backdrop="static" data-keyboard="false"
                                                aria-labelledby="subjectEditFormModalLabel{{ $subject->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title font-weight-bold"
                                                                id="subjectEditFormModalLabel{{ $subject->id }}">Ubah Mata
                                                                Kuliah</h3>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('admin.active-period.data.update-period-subject', [$period, $subject]) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="name">Nama mata kuliah</label>
                                                                    <input type="text" id="name" name="name"
                                                                        class="form-control" required autocomplete="off"
                                                                        placeholder="Nama mata kuliah"
                                                                        value="{{ $subject->name }}" readonly>
                                                                </div>
                                                                <p class="d-block m-0 mb-1 font-weight-bold">Prefix Nama Kelas</p>
                                                                <div class="d-flex justify-content-between align-items-center mb-3 pl-2">
                                                                    <div style="width: 49.5%" class="input-group d-flex align-items-center">
                                                                        <input type="radio" id="class_prefix_1{{ $loop->index }}" name="class_name_prefix" disabled>
                                                                        <label for="class_prefix_1{{ $loop->index }}" class="d-block m-0 ml-2">TPB</label>
                                                                    </div>
                                                                    <div style="width: 49.5%" class="input-group d-flex align-items-center">
                                                                        <input type="radio" id="class_prefix_2{{ $loop->index }}" name="class_name_prefix" disabled>
                                                                        <label for="class_prefix_2{{ $loop->index }}" class="d-block m-0 ml-2">R</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="number_of_class">Jumlah Kelas</label>
                                                                    <input type="number" id="number_of_class"
                                                                        name="number_of_class" class="form-control"
                                                                        required autocomplete="off"
                                                                        min="1"
                                                                        {{-- value="{{ $subject->pivot->number_of_lab_assistant }}" --}}
                                                                        placeholder="(masukkan angka)">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="number_of_lab_assistant">Kuota asisten
                                                                        praktikum</label>
                                                                    <input type="number" id="number_of_lab_assistant"
                                                                        name="number_of_lab_assistant" class="form-control"
                                                                        {{-- required autocomplete="off" --}}
                                                                        placeholder="(masukkan angka)"
                                                                        min="0"
                                                                        value="{{ $subject->pivot->number_of_lab_assistant }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exam_start">Tanggal mulai ujian</label>
                                                                    <input type="datetime-local" id="exam_start"
                                                                        name="exam_start" class="form-control" required
                                                                        autocomplete="off"
                                                                        value="{{ date('Y-m-d\TH:i:s', strtotime($subject->pivot->exam_start)) }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exam_end">Tanggal selesai ujian</label>
                                                                    <input type="datetime-local" id="exam_end"
                                                                        name="exam_end" class="form-control" required
                                                                        autocomplete="off"
                                                                        value="{{ date('Y-m-d\TH:i:s', strtotime($subject->pivot->exam_end)) }}">
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
                                                data-target="#confirmDeleteSubjectModal{{ $subject->id }}">Hapus</button>
                                            <!-- Delete Subject Modal -->
                                            <div class="modal fade" id="confirmDeleteSubjectModal{{ $subject->id }}"
                                                tabindex="-1" data-backdrop="static" data-keyboard="false"
                                                aria-labelledby="confirmDeleteSubjectModalLabel{{ $subject->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title font-weight-bold"
                                                                id="confirmDeleteSubjectModalLabel{{ $subject->id }}">
                                                                Hapus Mata Kuliah
                                                            </h3>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5>Yakin untuk menghapus mata kuliah '{{ $subject->name }}'?
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
                                <th style="text-align: center" rowspan="1" colspan="1">Nama Mata Kuliah</th>
                                <th style="text-align: center" rowspan="1" colspan="1">Jumlah Kelas</th>
                                <th style="text-align: center" rowspan="1" colspan="1">Kuota Asisten</th>
                                <th style="text-align: center" rowspan="1" colspan="1">Tanggal Awal Ujian</th>
                                <th style="text-align: center" rowspan="1" colspan="1">Tanggal Akhir Ujian</th>
                                <th style="text-align: center" rowspan="1" colspan="1">Aksi</th>
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
                    <h3 class="modal-title font-weight-bold" id="subjectFormModalLabel">Mata Kuliah Baru</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('admin.active-period.data.add-period-subject', $period) }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="subject_id">Nama mata kuliah</label>
                            <select id="name" class="custom-select" name="subject_id">
                                <option selected disabled hidden>Pilih mata kuliah</option>
                                @forelse ($allsubjects as $subject)
                                    <option value="{{ $subject->id }}"
                                        {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <p class="d-block m-0 mb-1 font-weight-bold">Prefix Nama Kelas</p>
                        <div class="d-flex justify-content-between align-items-center mb-3 pl-2">
                            <div style="width: 49.5%" class="input-group d-flex align-items-center">
                                <input type="radio" id="class_prefix_1" name="class_name_prefix">
                                <label for="class_prefix_1" class="d-block m-0 ml-2">TPB</label>
                            </div>
                            <div style="width: 49.5%" class="input-group d-flex align-items-center">
                                <input type="radio" id="class_prefix_2" name="class_name_prefix">
                                <label for="class_prefix_2" class="d-block m-0 ml-2">R</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="number_of_class">Jumlah Kelas</label>
                            <input type="number" id="number_of_class" name="number_of_class" 
                                class="form-control" required autocomplete="off"
                                min="1" value="{{ old('number_of_class') }}" placeholder="(masukkan angka)">
                        </div>
                        <div class="form-group">
                            <label for="number_of_lab_assistant">Kuota asisten praktikum</label>
                            <input type="number" id="number_of_lab_assistant" name="number_of_lab_assistant"
                                class="form-control" required value="{{ old('number_of_lab_assistant') }}"
                                autocomplete="off" placeholder="(masukkan angka)" min="0">
                        </div>
                        <div class="form-group">
                            <label for="exam_start">Tanggal mulai ujian</label>
                            <input type="datetime-local" id="exam_start" name="exam_start" class="form-control" required
                                value="{{ old('exam_start') }}" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="exam_end">Tanggal selesai ujian</label>
                            <input type="datetime-local" id="exam_end" name="exam_end" class="form-control" required
                                value="{{ old('exam_end') }}" autocomplete="off">
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
