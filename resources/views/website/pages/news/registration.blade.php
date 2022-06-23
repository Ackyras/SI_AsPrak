@extends('website.layouts.master')

@section('content')
    <h1>Pengumuman Pendaftaran Seleksi Asisten Praktikum {{ $period->name }}</h1>
    <p>Kacekace pengantar</p>
    @forelse ($period->subjects as $subject)
    <li>{{ $subject->name }} ({{ $subject->pivot->number_of_lab_assistant }} orang)</li>
    @empty

    @endforelse
    <p>berminat kah manis? <a href="{{ route('website.registration.index', $period) }}">klik disini ya maniez</a></p>
@endsection
