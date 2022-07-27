@extends('auth.master')

@section('content')
    <div class="p-4">
        <p class="block m-0 w-full text-center mb-4 text-xl text-white uppercase font-bold">{{ __('Atur Ulang Kata Sandi') }}</p>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

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

            {{-- <div class="input-group mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="{{ __('Password') }}" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </div> --}}

            <div class="mb-4 relative overflow-hidden">
                <input type="password" name="password" class="w-full pl-10"
                    placeholder="{{ __('Kata Sandi Baru') }}" required>
                <div class="absolute inset-y-0 left-0 aspect-square flex flex-col items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

            <div class="mb-4 relative overflow-hidden">
                <input type="password" name="password_confirmation" class="w-full pl-10"
                    placeholder="{{ __('Konfirmasi Kata Sandi') }}" required>
                <div class="absolute inset-y-0 left-0 aspect-square flex flex-col items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            
            <button type="submit" class="block w-full text-center py-1 uppercase bg-blue-600 hover:bg-blue-700 text-white font-bold outline-none border-none rounded">
                {{ __('Atur Ulang Kata Sandi') }}
            </button>
        </form>
    </div>
@endsection
