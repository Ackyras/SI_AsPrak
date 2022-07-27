@extends('auth.master')

@section('content')
<div class="p-4">
    <p class="block m-0 w-full text-center mb-4 text-xl text-white uppercase font-bold">{{ __('Atur Ulang Kata Sandi') }}</p>

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-4 relative">
            <input type="email" name="email" class="w-full pl-10"
                placeholder="{{ __('Masukkan Email Anda') }}" required value="{{ old('email') }}">
            <div class="absolute inset-y-0 left-0 aspect-square flex flex-col items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                </svg>
            </div>
        </div>

        <button type="submit" class="block w-full text-center py-1 uppercase bg-blue-600 hover:bg-blue-700 text-white font-bold outline-none border-none rounded">
            {{ __('Kirim Tautan Atur Ulang Kata Sandi') }}
        </button>
    </form>
</div>
@endsection
