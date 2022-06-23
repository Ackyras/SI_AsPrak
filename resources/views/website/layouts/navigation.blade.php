<nav class="w-full fixed z-50 flex justify-between drop-shadow-md items-center bg-white p-2 lg:py-2 lg:px-3">
    <div class="flex items-center gap-4 ">
        <a href="{{ route('website.home') }}" class="flex gap-2 items-center group">
            <img src="{{ asset('images/letter-s.png') }}" alt="SIAP Terpadu Logo"
                class="w-8 lg:w-10 h-auto border-4 border-gray-600 rounded-full group-hover:border-emerald-600"
                style="opacity: .8">
            <span class="text-lg lg:text-2xl text-gray-600 group-hover:text-emerald-600 font-black">SIAP Terpadu</span>
        </a>
        <div class="relative hidden lg:block" x-data="{ openPengumuman : false, openCD : true, openCU : false }">
            <a role="button" @click="
                    openPengumuman = ! openPengumuman,
                    openCD =! openCD,
                    openCU =! openCU
                "
                class="text-gray-600 text-lg uppercase tracking-wider font-thin hover:text-emerald-600 duration-[375ms] flex gap-1 items-center">
                <span>Pengumuman</span>
                <svg x-show="openCD" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
                <svg x-cloak x-show="openCU" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                        clip-rule="evenodd" />
                </svg>
            </a>
            <div x-cloak x-show="openPengumuman" class="absolute top-full left-0 w-[200px] bg-white py-3 drop-shadow">
                <a href=""
                    class="block font-semibold w-full uppercase py-1 px-2 text-gray-600 hover:text-white hover:bg-emerald-500 mb-3">Hasil
                    Seleksi Berkas</a>
                <a href=""
                    class="block font-semibold w-full uppercase py-1 px-2 text-gray-600 hover:text-white hover:bg-emerald-500">Hasil
                    Seleksi Tes</a>
            </div>
        </div>
        {{-- <a href="{{ route('website.registration.index') }}"
            class="hidden lg:block text-gray-600 text-lg uppercase tracking-wider font-thin hover:text-emerald-600 duration-[375ms]">
            --}}
            {{-- <span>Pendaftaran</span> --}}
            {{-- </a> --}}
    </div>
    @auth
    <a href="{{ auth()->user()->is_admin ? route('admin.dashboard') : route('user.dashboard') }}"
        class="hidden lg:flex items-center text-base font-bold border-2 hover:bg-emerald-600 border-emerald-600 hover:border-white text-emerald-600 hover:text-white rounded-md py-2 px-3 gap-2 ease-in-out duration-[375ms]">
        <span>Dashboard</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                clip-rule="evenodd" />
        </svg>
    </a>
    @else
    <a href="{{ route('login') }}"
        class="hidden lg:flex items-center text-base font-bold border-2 hover:bg-emerald-600 border-emerald-600 hover:border-white text-emerald-600 hover:text-white rounded-md py-2 px-3 gap-2 ease-in-out duration-[375ms]">
        <span>Login</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
        </svg>
    </a>
    @endauth
    <div class="border lg:hidden" @click="
            opensidebar = ! opensidebar,
            openCM =! openCM,
            openBM =! openBM
        ">
        <svg x-show="openBM" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg x-cloak x-show="openCM" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20"
            fill="currentColor">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
    </div>
</nav>
<div x-cloak x-show="opensidebar" @click.outside="opensidebar = false"
    class="fixed z-50 top-12 right-0 border bg-white w-2/3 md:w-2/5 h-screen py-4 flex flex-col justify-between">
    <div x-data="{ openPengumuman : false, openCD : true, openCU : false }">
        <div class="px-4 mb-4">
            @auth
            <a href="{{ auth()->user()->is_admin ? route('admin.dashboard') : route('user.dashboard') }}"
                class="flex items-center text-base font-bold border-2 hover:bg-emerald-600 border-emerald-600 hover:border-white text-emerald-600 hover:text-white rounded-md py-2 px-3 justify-between ease-in-out duration-[375ms]">
                <span>Dashboard</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </a>
            @else
            <a href="{{ route('login') }}"
                class="flex items-center text-base font-bold border-2 hover:bg-emerald-600 border-emerald-600 hover:border-white text-emerald-600 hover:text-white rounded-md py-2 px-3 justify-between ease-in-out duration-[375ms]">
                <span>Login</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                </svg>
            </a>
            @endauth
        </div>
        <a role="button" @click="
                openPengumuman = ! openPengumuman,
                openCD =! openCD,
                openCU =! openCU
            "
            class="text-gray-600 text-lg uppercase tracking-wider px-4 mb-2 font-thin hover:text-emerald-600 duration-[375ms] flex justify-between items-center">
            <span>Pengumuman</span>
            <svg x-show="openCD" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
            <svg x-cloak x-show="openCU" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                    clip-rule="evenodd" />
            </svg>
        </a>
        <div x-cloak x-show="openPengumuman" class="mt-2 py-1 bg-emerald-50 border-y border-emerald-500">
            <a href=""
                class="block font-semibold w-full uppercase py-1 px-7 text-emerald-500 hover:text-white hover:bg-emerald-500 mb-2">Hasil
                Seleksi Berkas</a>
            <a href=""
                class="block font-semibold w-full uppercase py-1 px-7 text-emerald-500 hover:text-white hover:bg-emerald-500">Hasil
                Seleksi Tes</a>
        </div>
        {{-- <a href="{{ route('website.registration.index') }}"
            class="block text-gray-600 text-lg uppercase tracking-wider px-4 mt-4 font-thin hover:text-emerald-600 duration-[375ms]">
            --}}
            {{-- <span>Pendaftaran</span> --}}
            {{-- </a> --}}
    </div>
    <p>Copyright &copy; 2022 SIAP Terpadu</p>
</div>
