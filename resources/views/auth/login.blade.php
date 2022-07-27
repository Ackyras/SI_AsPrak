@extends('auth.master')

@section('content')
<div class="p-4">
    <p class="block m-0 w-full text-center mb-4 text-xl text-white uppercase font-bold">{{ __('Login') }}</p>

    <p class="block m-0 w-full mb-4">
        @include('admin.components.alert')
    </p>

    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="mb-4 relative">
            <input type="email" name="email" class="w-full pl-10"
                placeholder="{{ __('Email') }}" required value="{{ old('email') }}">
            <div class="absolute inset-y-0 left-0 aspect-square flex flex-col items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                </svg>
            </div>
            @error('email')
                <span class="error invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="mb-4 relative overflow-hidden">
            <input type="password" name="password" class="w-full pl-10"
                placeholder="{{ __('Password') }}" required>
            {{-- <p class="block absolute z-[4] inset-y-0 left-10 my-1 w-fit bg-white py-1 text-base">
                passwor
            </p> --}}
            <div class="absolute inset-y-0 left-0 aspect-square flex flex-col items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                </svg>
            </div>
            {{-- <div class="absolute z-[5] inset-y-0 right-0 aspect-square flex flex-col items-center justify-center bg-white m-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                </svg>
            </div> --}}
        </div>
        <div class="flex justify-between items-center">
            <div class="">
                <div class="text-white">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">
                        {{ __('Ingat Saya') }}
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="">
                <button type="submit" class="block py-1 px-5 uppercase bg-blue-600 hover:bg-blue-700 text-white font-bold outline-none border-none rounded">
                    {{ __('Login') }}
                </button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    @if (Route::has('password.request'))
    <p class="mt-1">
        <a class="text-sm text-gray-200 hover:text-gray-300 underline underline-offset-1 " href="{{ route('password.request') }}">{{ __('Lupa kata sandi?') }}</a>
    </p>
    @endif
</div>
<!-- /.login-card-body -->
@endsection
