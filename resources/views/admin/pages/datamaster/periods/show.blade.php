@extends('admin.layouts.app')

@section('content')
    <div class="p-2">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="card-title font-weight-bolder">Detail Periode {{ $period->name }}</h1>
                </div>
            </div>

            <div class="card-body">
                {{-- BARIS 1 --}}
                <div class="w-100 border-bottom p-2 pb-4 mb-2">
                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <div style="width: 49%" class="d-flex justify-content-between align-items-center">
                            <p class="d-block w-50 m-0 font-weight-bold">Tanggal Awal Pendaftaran</p>
                            <p class="d-block w-50 m-0">{{ $period->registration_start }}</p>
                        </div>
                        <div style="width: 49%" class="d-flex justify-content-between align-items-center">
                            <p class="d-block w-50 m-0 font-weight-bold">Tanggal Akhir Pendaftaran</p>
                            <p class="d-block w-50 m-0">{{ $period->registration_end }}</p>
                        </div>
                        {{-- <div class="w-auto">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#periodDetailEditFormModal1">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                        <div class="modal fade" id="periodDetailEditFormModal1" tabindex="-1" data-backdrop="static"
                            data-keyboard="false" aria-labelledby="periodDetailEditFormModalLabel1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title font-weight-bold" id="periodDetailEditFormModalLabel1">
                                            Ubah Detail Periode</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="registration_start">Tanggal awal pendaftaran</label>
                                                <input type="datetime-local" id="registration_start"
                                                    name="registration_start" class="form-control" required
                                                    autocomplete="off"
                                                    value="{{ date('Y-m-d\TH:i:s', strtotime($period->registration_start)) }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="registration_end">Tanggal akhir pendaftaran</label>
                                                <input type="datetime-local" id="registration_end" name="registration_end"
                                                    class="form-control" required autocomplete="off"
                                                    value="{{ date('Y-m-d\TH:i:s', strtotime($period->registration_end)) }}">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">SIMPAN
                                                PERUBAHAN</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                {{-- BARIS 2 --}}
                <div class="w-100 border-bottom p-2 pb-4 mb-2">
                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <div style="width: 49%" class="d-flex justify-content-between align-items-center">
                            <p class="d-block w-50 m-0 font-weight-bold">Status Keaktifan</p>
                            @if ($period->is_active)
                                <p class="d-block w-50 m-0"><span class="w-50 badge "
                                        style="background-color: #0d9488; color:white;">Aktif</span></p>
                            @else
                                <p class="d-block w-50 m-0"><span class="w-50 badge badge-secondary">Tidak Aktif</span></p>
                            @endif
                        </div>
                        <div style="width: 49%" class="d-flex justify-content-between align-items-center">
                            <p class="d-block w-50 m-0 font-weight-bold">Terakhir Diubah</p>
                            <p class="d-block w-50 m-0">{{ $period->is_active_date }}</p>
                        </div>
                        {{-- <div class="w-auto">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#periodDetailEditFormModal2">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                        <div class="modal fade" id="periodDetailEditFormModal2" tabindex="-1" data-backdrop="static"
                            data-keyboard="false" aria-labelledby="periodDetailEditFormModalLabel2" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title font-weight-bold" id="periodDetailEditFormModalLabel2">
                                            Ubah Status Keaktifan Periode</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="">
                                        @csrf
                                        <div class="modal-body">
                                            @if ($period->is_active)
                                                <h5>
                                                    Anda akan mengubah Status Keaktifan Periode
                                                    <span class="font-weight-bold">{{ $period->name }}</span>
                                                    dari <span class="badge "
                                                        style="background-color: #0d9488; color:white;">Aktif</span>
                                                    menjadi
                                                    <span class="badge badge-secondary">Tidak Aktif</span>
                                                </h5>
                                                <h5>Simpan perubahan ini?</h5>
                                            @else
                                                <h5>
                                                    Anda akan mengubah Status Keaktifan Periode
                                                    <span class="font-weight-bold">{{ $period->name }}</span>
                                                    dari <span class="badge badge-secondary">Tidak Aktif</span> menjadi
                                                    <span class="badge "
                                                        style="background-color: #0d9488; color:white;">Aktif</span>
                                                </h5>
                                                <h5>Simpan perubahan ini?</h5>
                                            @endif
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">SIMPAN
                                                PERUBAHAN</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                {{-- BARIS 3 --}}
                <div class="w-100 border-bottom p-2 pb-4 mb-2">
                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <div style="width: 49%" class="d-flex justify-content-between align-items-center">
                            <p class="d-block w-50 m-0 font-weight-bold">Status Menerima Pendaftar</p>
                            @if ($period->is_open_for_selection)
                                <p class="d-block w-50 m-0"><span class="w-50 badge "
                                        style="background-color: #0d9488; color:white;">Menerima</span></p>
                            @else
                                <p class="d-block w-50 m-0"><span class="w-50 badge badge-secondary">Tidak Menerima</span>
                                </p>
                            @endif
                        </div>
                        <div style="width: 49%" class="d-flex justify-content-between align-items-center">
                            <p class="d-block w-50 m-0 font-weight-bold">Terakhir Diubah</p>
                            <p class="d-block w-50 m-0">{{ $period->is_open_for_selection_date }}</p>
                        </div>
                        {{-- <div class="w-auto">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#periodDetailEditFormModal3">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                        <div class="modal fade" id="periodDetailEditFormModal3" tabindex="-1" data-backdrop="static"
                            data-keyboard="false" aria-labelledby="periodDetailEditFormModalLabel3" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title font-weight-bold" id="periodDetailEditFormModalLabel3">
                                            Ubah Status Menerima Pendaftar Periode</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="">
                                        @csrf
                                        <div class="modal-body">
                                            @if ($period->is_open_for_selection)
                                                <h5>
                                                    Anda akan mengubah Status Menerima Pendaftar Periode
                                                    <span class="font-weight-bold">{{ $period->name }}</span>
                                                    dari <span class="badge "
                                                        style="background-color: #0d9488; color:white;">Menerima</span>
                                                    menjadi
                                                    <span class="badge badge-secondary">Tidak Menerima</span>
                                                </h5>
                                                <h5>Simpan perubahan ini?</h5>
                                            @else
                                                <h5>
                                                    Anda akan mengubah Status Menerima Pendaftar Periode
                                                    <span class="font-weight-bold">{{ $period->name }}</span>
                                                    dari <span class="badge badge-secondary">Tidak Menerima</span> menjadi
                                                    <span class="badge "
                                                        style="background-color: #0d9488; color:white;">Menerima</span>
                                                </h5>
                                                <h5>Simpan perubahan ini?</h5>
                                            @endif
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">SIMPAN
                                                PERUBAHAN</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                {{-- BARIS 4 --}}
                <div class="w-100 border-bottom p-2 pb-4 mb-2">
                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <div style="width: 49%" class="d-flex justify-content-between align-items-center">
                            <p class="d-block w-50 m-0 font-weight-bold">Status Seleksi Berkas</p>
                            @if ($period->is_file_selection_over)
                                <p class="d-block w-50 m-0"><span class="w-50 badge "
                                        style="background-color: #0d9488; color:white;">Selesai</span></p>
                            @else
                                <p class="d-block w-50 m-0"><span class="w-50 badge badge-secondary">Belum Selesai</span>
                                </p>
                            @endif
                        </div>
                        <div style="width: 49%" class="d-flex justify-content-between align-items-center">
                            <p class="d-block w-50 m-0 font-weight-bold">Terakhir Diubah</p>
                            <p class="d-block w-50 m-0">{{ $period->is_file_selection_over_date }}</p>
                        </div>
                        {{-- <div class="w-auto">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#periodDetailEditFormModal4">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                        <div class="modal fade" id="periodDetailEditFormModal4" tabindex="-1" data-backdrop="static"
                            data-keyboard="false" aria-labelledby="periodDetailEditFormModalLabel4" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title font-weight-bold" id="periodDetailEditFormModalLabel4">
                                            Ubah Status Seleksi Berkas Periode</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="">
                                        @csrf
                                        <div class="modal-body">
                                            @if ($period->is_file_selection_over)
                                                <h5>
                                                    Anda akan mengubah Status Seleksi Berkas Periode
                                                    <span class="font-weight-bold">{{ $period->name }}</span>
                                                    dari <span class="badge "
                                                        style="background-color: #0d9488; color:white;">Selesai</span>
                                                    menjadi
                                                    <span class="badge badge-secondary">Belum Selesai</span>
                                                </h5>
                                                <h5>Simpan perubahan ini?</h5>
                                            @else
                                                <h5>
                                                    Anda akan mengubah Status Seleksi Berkas Periode
                                                    <span class="font-weight-bold">{{ $period->name }}</span>
                                                    dari <span class="badge badge-secondary">Belum Selesai</span> menjadi
                                                    <span class="badge "
                                                        style="background-color: #0d9488; color:white;">Selesai</span>
                                                </h5>
                                                <h5>Simpan perubahan ini?</h5>
                                            @endif
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">SIMPAN
                                                PERUBAHAN</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                {{-- BARIS 5 --}}
                <div class="w-100 border-bottom p-2 pb-4 mb-2">
                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <div style="width: 49%" class="d-flex justify-content-between align-items-center">
                            <p class="d-block w-50 m-0 font-weight-bold">Status Seleksi Ujian</p>
                            @if ($period->is_exam_selection_over)
                                <p class="d-block w-50 m-0"><span class="w-50 badge "
                                        style="background-color: #0d9488; color:white;">Selesai</span></p>
                            @else
                                <p class="d-block w-50 m-0"><span class="w-50 badge badge-secondary">Belum Selesai</span>
                                </p>
                            @endif
                        </div>
                        <div style="width: 49%" class="d-flex justify-content-between align-items-center">
                            <p class="d-block w-50 m-0 font-weight-bold">Terakhir Diubah</p>
                            <p class="d-block w-50 m-0">{{ $period->is_exam_selection_over_date }}</p>
                        </div>
                        {{-- <div class="w-auto">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#periodDetailEditFormModal5">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                        <div class="modal fade" id="periodDetailEditFormModal5" tabindex="-1" data-backdrop="static"
                            data-keyboard="false" aria-labelledby="periodDetailEditFormModalLabel5" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title font-weight-bold" id="periodDetailEditFormModalLabel5">
                                            Ubah Status Seleksi Ujian Periode</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="">
                                        @csrf
                                        <div class="modal-body">
                                            @if ($period->is_exam_selection_over)
                                                <h5>
                                                    Anda akan mengubah Status Seleksi Ujian Periode
                                                    <span class="font-weight-bold">{{ $period->name }}</span>
                                                    dari <span class="badge "
                                                        style="background-color: #0d9488; color:white;">Selesai</span>
                                                    menjadi
                                                    <span class="badge badge-secondary">Belum Selesai</span>
                                                </h5>
                                                <h5>Simpan perubahan ini?</h5>
                                            @else
                                                <h5>
                                                    Anda akan mengubah Status Seleksi Ujian Periode
                                                    <span class="font-weight-bold">{{ $period->name }}</span>
                                                    dari <span class="badge badge-secondary">Belum Selesai</span> menjadi
                                                    <span class="badge "
                                                        style="background-color: #0d9488; color:white;">Selesai</span>
                                                </h5>
                                                <h5>Simpan perubahan ini?</h5>
                                            @endif
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">SIMPAN
                                                PERUBAHAN</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                {{-- BARIS 6 --}}
                <div class="w-100 p-2">
                    <div class="w-100 d-flex justify-content-between align-items-center">
                        <div style="width: 49%" class="d-flex justify-content-between align-items-center">
                            <p class="d-block w-50 m-0 font-weight-bold">Poster Periode</p>
                            @if ($period->selection_poster)
                                <div class="w-50 m-0">
                                    <div class="w-50">
                                        <button type="button" class="btn btn-sm btn-success btn-block"
                                            data-toggle="modal" data-target="#viewPosterModal">
                                            Lihat Poster
                                        </button>
                                    </div>
                                </div>
                            @else
                                <p class="d-block w-50 m-0"><span class="w-50 badge badge-secondary">Belum Ada
                                        Poster</span></p>
                            @endif
                        </div>
                        <div style="width: 49%"></div>
                        {{-- <div class="w-auto">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#periodDetailEditFormModal6">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                        <div class="modal fade" id="periodDetailEditFormModal6" tabindex="-1" data-backdrop="static"
                            data-keyboard="false" aria-labelledby="periodDetailEditFormModalLabel6" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title font-weight-bold" id="periodDetailEditFormModalLabel6">
                                            {{ $period->selection_poster ? 'Ubah' : 'Unggah' }}
                                            Poster Penerimaan</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="">
                                        @csrf
                                        <div class="modal-body">
                                            <label for="selection_poster">Pilih File (JPG/JPEG/PNG)</label> <br />
                                            <input type="file" name="selection_poster" id="selection_poster"
                                                required />
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">SIMPAN
                                                PERUBAHAN</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="p-2">
        <div class="card">
            <div class="card-header">
                {{-- <div class="d-flex align-items-center justify-content-between"> --}}
                    <h2 class="card-title font-weight-bold">Data Mata Kuliah Periode {{ $period->name }}</h2>
                    {{-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#subjectFormModal">
                        <i class="fas fa-plus mr-2"></i>
                        Mata Kuliah Baru
                    </button> --}}
                {{-- </div> --}}
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
                                    rowspan="1" colspan="1">Kuota Asisten</th>
                                <th style="text-align: center" tabindex="0" aria-controls="period_subject_table"
                                    rowspan="1" colspan="1">Tanggal Awal Ujian</th>
                                <th style="text-align: center" tabindex="0" aria-controls="period_subject_table"
                                    rowspan="1" colspan="1">Tanggal Akhir Ujian</th>
                                {{-- <th tabindex="0" aria-controls="period_subject_table" rowspan="1" colspan="1"
                                    style="width: 150px; text-align: center">Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($period->subjects as $subject)
                                <tr>
                                    <td tabindex="0">{{ $subject->name }}</td>
                                    <td style="text-align: center;">{{ $subject->pivot->number_of_lab_assistant }}</td>
                                    <td style="text-align: center;">{{ $subject->pivot->exam_start }}</td>
                                    <td style="text-align: center;">{{ $subject->pivot->exam_end }}</td>
                                    {{-- <td>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <a role="button"
                                                href="{{ route('admin.data-master.period.subject.question.index', [$period, $subject]) }}"
                                                class="btn btn-sm btn-success">Detail</a>
                                            <!-- Edit Subject Button -->
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
                                                                id="subjectEditFormModalLabel{{ $subject->id }}">Ubah
                                                                Mata
                                                                Kuliah</h3>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('admin.data-master.period.updateSubject', [$period, $subject]) }}">
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
                                                                <div class="form-group">
                                                                    <label for="number_of_lab_assistant">Kuota asisten
                                                                        praktikum</label>
                                                                    <input type="text" id="number_of_lab_assistant"
                                                                        name="number_of_lab_assistant"
                                                                        class="form-control" required autocomplete="off"
                                                                        placeholder="(masukkan angka)"
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
                                                                Hapus
                                                                Mata
                                                                Kuliah</h3>
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
                                    </td> --}}
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="text-align: center" rowspan="1" colspan="1">Nama Mata Kuliah</th>
                                <th style="text-align: center" rowspan="1" colspan="1">Kuota Asisten</th>
                                <th style="text-align: center" rowspan="1" colspan="1">Tanggal Awal Ujian</th>
                                <th style="text-align: center" rowspan="1" colspan="1">Tanggal Akhir Ujian</th>
                                {{-- <th style="text-align: center" rowspan="1" colspan="1">Aksi</th> --}}
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- View Poster Modal -->
    {{-- <div class="modal fade" id="viewPosterModal" tabindex="-1" data-backdrop="static" data-keyboard="false"
        aria-labelledby="viewPosterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bold" id="viewPosterModalLabel">
                        Poster Periode {{ $period->name }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div style="background-color: #f0f2f2;" class="modal-body ">
                    <div class="w-75 mx-auto">
                        <img class="w-100 h-auto" src="{{ asset($period->selection_poster) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Add Subject Modal -->
    {{-- <div class="modal fade" id="subjectFormModal" tabindex="-1" data-backdrop="static" data-keyboard="false"
        aria-labelledby="subjectFormModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title font-weight-bold" id="subjectFormModalLabel">Mata Kuliah Baru</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('admin.data-master.period.addSubject', $period) }}">
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
                        <div class="form-group">
                            <label for="number_of_lab_assistant">Kuota asisten praktikum</label>
                            <input type="text" id="number_of_lab_assistant" name="number_of_lab_assistant"
                                class="form-control" required value="{{ old('number_of_lab_assistant') }}"
                                autocomplete="off" placeholder="(masukkan angka)">
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
    </div> --}}
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
