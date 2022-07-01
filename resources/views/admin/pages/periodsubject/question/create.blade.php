@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h2 class="card-title font-weight-bold">Buat Soal Ujian ((Nama Mata Kuliah)) Periode ((Nama Periode))</h2>
            </div>

            <div class="card-body">
                <form action="">
                    @csrf
                    <div id="question_container_1" class="d-flex justify-content-between border p-3 rounded-lg border border-secondary">
                        <div style="width: 94%" class="border">
                            <div class="form-group border">
                                <label for="type_1">Tipe Soal</label>
                                <select class="custom-select" id="type_1" name="type_1">
                                    <option selected>Pilih tipe soal</option>
                                    <option value="essay">Essay</option>
                                    <option value="pilihan berganda">Pilihan Berganda</option>
                                </select>
                            </div>
                        </div>
                        <div style="width: 5%;" class="border">
                            <button type="button" id="delete_1" class="d-block mx-auto btn btn-danger rounded-circle delete-button">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <div style="width: 5%;" class="border">
    <button type="button" id="add_1" class="btn btn-primary rounded-circle mx-auto">
        <i class="fas fa-plus"></i>
    </button>
</div> --}}
@endsection

@section('scripts')
<script>
    
</script>
@endsection
