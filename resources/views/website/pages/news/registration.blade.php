@extends('website.layouts.master')

@section('content')
<div
    class="w-full lg:w-3/5 m-auto bg-white drop-shadow-md p-4 lg:p-10 min-h-[calc(100vh-4.75rem)] lg:min-h-[calc(100vh-5.5rem)]">
    <div class="mb-4">
        <p class="text-xl lg:text-2xl text-center text-emerald-600 font-serif font-bold tracking-wider">
            Seleksi Penerimaan Asisten Praktikum <br class="hidden lg:block"> {{ $period->name }}
        </p>
    </div>
    @if ($period->selection_poster)
        <div class="w-full lg:w-2/3 mx-auto p-2 bg-gray-200 relative group mb-4">
            <img src="{{ asset('storage/'.$period->selection_poster) }}" alt="" class="w-full">
            <div class="hidden lg:group-hover:block absolute inset-0 bg-[#00000050]"></div>
            <div class="hidden lg:group-hover:flex absolute inset-0 items-center justify-center">
                <a href="{{ asset('storage/'.$period->selection_poster) }}"
                    class="flex justify-center items-center gap-3 py-2 pl-2 pr-4 rounded bg-emerald-600 hover:bg-emerald-500 ease-in-out duration-300 text-white"
                    download>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    <p class="text-xl font-semibold">Download Poster</p>
                </a>
            </div>
            <a href="{{ asset('storage/'.$period->selection_poster) }}"
                class="flex lg:hidden mt-2 justify-center items-center gap-3 py-2 pl-2 pr-4 rounded bg-emerald-600 hover:bg-emerald-500 ease-in-out duration-300 text-white"
                download>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <p class="text-lg font-semibold">Download Poster</p>
            </a>
        </div>
    @endif
    <div class="w-full mb-2 pb-2 border-b-2 border-emerald-600">
        <p class="font-bold text-emerald-600 text-lg lg:text-xl mb-2">
            Deskripsi Penerimaan
        </p>
        <p class="mb-2 lg:pl-2">
            Telah dibuka pendaftaran Asisten Praktikum Laboratorium Multimedia ITERA.
            Berikut adalah daftar Mata Kuliah dan jumlah Asisten Praktikum yang dibutuhkan pada saat ini.
        </p>
        @if ($period->subjects->count() > 0)
        <p class="font-bold text-emerald-600 text-lg lg:text-xl mb-2">Daftar Asisten Praktikum Dibutuhkan</p>
        @endif
        <table class="lg:ml-2">
            @forelse ($period->subjects as $subject)
            <tr>
                <td class="pr-2">{{ $loop->index+1 }}.</td>
                <td>{{ $subject->name }}</td>
                <td class="pl-3">( <span class="font-semibold text-emerald-700">{{
                        $subject->pivot->number_of_lab_assistant }} orang</span> )</td>
            </tr>
            @empty
            <tr>
                <td>Tidak ada asisten yang dibutuhkan</td>
            </tr>
            @endforelse
        </table>
    </div>
    <div class="mt-4">
        <p class="block text-lg lg:text-xl font-bold text-emerald-600">
            Siap untuk mendapatkan pengalaman berharga?
        </p>
        <a href="{{ route('website.registration.index', $period) }}"
            class="block bg-emerald-600 hover:bg-emerald-500 ease-in-out duration-300 font-serif mt-2 py-2 px-3 w-fit rounded uppercase text-white font-bold">
            klik disini untuk mendaftar
        </a>
    </div>
</div>
@endsection
