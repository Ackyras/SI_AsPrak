@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title font-weight-bold">Data Periode Penerimaan Asisten Praktikum</h2>
            </div>
            
            <div class="card-body">
                <table id="period_table" class="table table-bordered table-hover dataTable dtr-inline collapsed" aria-describedby="period_table_info">
                    <thead>
                        <tr>
                            <th tabindex="0" aria-controls="period_table" rowspan="1" colspan="1">Periode</th>
                            <th tabindex="0" aria-controls="period_table" rowspan="1" colspan="1">Mulai Pendaftaran</th>
                            <th tabindex="0" aria-controls="period_table" rowspan="1" colspan="1">Akhir Pendaftaran</th>
                            <th tabindex="0" aria-controls="period_table" rowspan="1" colspan="1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($periods as $period)
                            <tr class="{{ $loop->index % 2 == 0 ? 'even' : 'odd' }}">
                                <td tabindex="0">{{ $period->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($period->registration_start)->format('j F, Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($period->registration_end)->format('j F, Y') }}</td>
                                <td> <a href="{{ route('admin.data.master.periods.show', $period) }}">Detail</a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">Periode</th>
                            <th rowspan="1" colspan="1">Awal Pendaftaran</th>
                            <th rowspan="1" colspan="1">Akhir Pendaftaran</th>
                            <th rowspan="1" colspan="1">Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#period_table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection