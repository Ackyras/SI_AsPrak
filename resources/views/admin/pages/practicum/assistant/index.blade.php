@extends('admin.layouts.app')

@section('content')
<div class="p-2">
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title font-weight-bold">Data Seluruh Asisten Praktikum</h2>
            </div>
        </div>

        <div class="card-body">
            <div id="assistant_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <table id="assistant_table" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                    aria-describedby="assistant_table_info">
                    <thead>
                        <tr>
                            <th style="text-align: center" tabindex="0" aria-controls="assistant_table" rowspan="1"
                                colspan="1">Nama</th>
                            <th style="text-align: center" tabindex="0" aria-controls="assistant_table" rowspan="1"
                                colspan="1">NIM</th>
                            <th style="text-align: center" tabindex="0" aria-controls="assistant_table" rowspan="1"
                                colspan="1">
                                Mata Kuliah ((Diasisteni??))
                            </th>
                            <th style="text-align: center; width: 120px;" tabindex="0" aria-controls="assistant_table"
                                rowspan="1" colspan="1">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($lab_assistants as $lab_assistant)
                        <tr class="">
                            <td tabindex="0">{{ $lab_assistant->name }}</td>
                            <td>{{ $lab_assistant->nim }}</td>
                            <td>
                                <ul>
                                    @foreach ($lab_assistant->period_subjects as $period_subject)
                                    <li>
                                        {{ $period_subject->subject->name }}
                                    </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-success">Lihat Detail</a>
                            </td>
                        </tr>
                        @endforeach
                        <tr class="">
                            <td tabindex="0">Nama Orang {{ rand(1,9) }}</td>
                            <td>rand(1181400{{ rand(11,99) }})
                            </td>
                            <td>
                                rand({{ rand(1,3) }})
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-success">Lihat Detail</a>
                            </td>
                        </tr>
                        <tr class="">
                            <td tabindex="0">Nama Orang {{ rand(1,9) }}</td>
                            <td>rand(1181400{{ rand(11,99) }})
                            </td>
                            <td>
                                rand({{ rand(1,3) }})
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-success">Lihat Detail</a>
                            </td>
                        </tr>
                        <tr class="">
                            <td tabindex="0">Nama Orang {{ rand(1,9) }}</td>
                            <td>rand(1181400{{ rand(11,99) }})
                            </td>
                            <td>
                                rand({{ rand(1,3) }})
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-success">Lihat Detail</a>
                            </td>
                        </tr>
                        <tr class="">
                            <td tabindex="0">Nama Orang {{ rand(1,9) }}</td>
                            <td>rand(1181400{{ rand(11,99) }})
                            </td>
                            <td>
                                rand({{ rand(1,3) }})
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-success">Lihat Detail</a>
                            </td>
                        </tr>
                        <tr class="">
                            <td tabindex="0">Nama Orang {{ rand(1,9) }}</td>
                            <td>rand(1181400{{ rand(11,99) }})
                            </td>
                            <td>
                                rand({{ rand(1,3) }})
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-success">Lihat Detail</a>
                            </td>
                        </tr>
                        <tr class="">
                            <td tabindex="0">Nama Orang {{ rand(1,9) }}</td>
                            <td>rand(1181400{{ rand(11,99) }})
                            </td>
                            <td>
                                rand({{ rand(1,3) }})
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-success">Lihat Detail</a>
                            </td>
                        </tr>
                        <tr class="">
                            <td tabindex="0">Nama Orang {{ rand(1,9) }}</td>
                            <td>rand(1181400{{ rand(11,99) }})
                            </td>
                            <td>
                                rand({{ rand(1,3) }})
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-success">Lihat Detail</a>
                            </td>
                        </tr>
                        <tr class="">
                            <td tabindex="0">Nama Orang {{ rand(1,9) }}</td>
                            <td>rand(1181400{{ rand(11,99) }})
                            </td>
                            <td>
                                rand({{ rand(1,3) }})
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-success">Lihat Detail</a>
                            </td>
                        </tr>
                        <tr class="">
                            <td tabindex="0">Nama Orang {{ rand(1,9) }}</td>
                            <td>rand(1181400{{ rand(11,99) }})
                            </td>
                            <td>
                                rand({{ rand(1,3) }})
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-success">Lihat Detail</a>
                            </td>
                        </tr>
                        <tr class="">
                            <td tabindex="0">Nama Orang {{ rand(1,9) }}</td>
                            <td>rand(1181400{{ rand(11,99) }})
                            </td>
                            <td>
                                rand({{ rand(1,3) }})
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-success">Lihat Detail</a>
                            </td>
                        </tr>
                        <tr class="">
                            <td tabindex="0">Nama Orang {{ rand(1,9) }}</td>
                            <td>rand(1181400{{ rand(11,99) }})
                            </td>
                            <td>
                                rand({{ rand(1,3) }})
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-success">Lihat Detail</a>
                            </td>
                        </tr>
                        <tr class="">
                            <td tabindex="0">Nama Orang {{ rand(1,9) }}</td>
                            <td>rand(1181400{{ rand(11,99) }})
                            </td>
                            <td>
                                rand({{ rand(1,3) }})
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-success">Lihat Detail</a>
                            </td>
                        </tr>
                        <tr class="">
                            <td tabindex="0">Nama Orang {{ rand(1,9) }}</td>
                            <td>rand(1181400{{ rand(11,99) }})
                            </td>
                            <td>
                                rand({{ rand(1,3) }})
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-success">Lihat Detail</a>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="text-align: center" rowspan="1" colspan="1">Nama</th>
                            <th style="text-align: center" rowspan="1" colspan="1">NIM</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Mata Kuliah ((Diasisteni??))</th>
                            <th style="text-align: center" rowspan="1" colspan="1">Aski</th>
                        </tr>
                    </tfoot>
                </table>
                <div class="pb-3">
                    <p>Keterangan :
                        <span class="badge badge-success">Lulus</span>
                        <span class="badge badge-secondary">Belum/Tidak Lulus</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        $("#assistant_table").DataTable({
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
        }).buttons().container().appendTo('#assistant_table_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection
