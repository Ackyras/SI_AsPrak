@extends('mail.master')

@section('title')
    {{ $maildata['title'] }}
@endsection

@section('content')
    {{ $maildata['receiver'] }} 
    {{ $maildata['registrar_email'] }}    
    {{ $maildata['registrar_password'] }} 
@endsection
