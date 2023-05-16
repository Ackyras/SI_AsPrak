@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('About us') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-2">{{ __('Sistem Informasi Laboratorium Multimedia ITERA') }}</h5>

                            <p class="card-text">
                                {{ __('Sistem Informasi Laboratorium Multimedia ITERA merupakan sistem terintegrasi yang memadukan dukungan akan kemudahan tahap pendaftaran dan seleksi, dalam proses penerimaan Asisten Praktikum Laboratorium Multimedia di Institut Teknologi Sumatera. Selain itu sistem ini juga memudahkan dalam mengatur jadwal praktikum, penempatan Asisten, pencatatan presensi Asisten, hingga melakukan rekapitulasi data honor Asisten.') }}
                            </p>
                            {{-- <p class="card-text">
                                {{ __('Sistem ini dikembangkan sebagai bentuk tanggung jawab dalam menyelesaikan tugas akhir oleh Markus.') }}
                            </p> --}}
                            <p class="card-text">
                                {{ __('Sistem ini dikembangkan sebagai bentuk pelaksanaan tanggung jawab untuk menyelesaikan Tugas Akhir oleh :') }}
                            </p>
                            <p class="card-text font-weight-bold">
                                {{ __('Risno Putri Nainggolan (118140119)') }}
                            </p>
                            <p class="card-text font-weight-bold">
                                {{ __('Ribka Julyasih Sidabutar (118140125)') }}
                            </p>
                            <p class="card-text">
                                {{ __('Kiranya sistem ini dapat berjalan sebagaimana semestinya, untuk memberikan kebermanfaatan dan kemudahan bagi khalayak umum.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection