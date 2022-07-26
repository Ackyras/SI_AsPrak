<?php
    $pengumuman = array(
        (object)[
            "title"         => "Lorem ipsum dolor sit amet consectetur.",
            "content"       => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam quidem error ratione, illum quaerat praesentium fugit officiis nisi atque alias repellat. Harum sint culpa perferendis porro error. Iste minus a corrupti animi architecto dignissimos eveniet maiores accusantium consequatur. Velit neque ut, repellat soluta autem atque consectetur excepturi dicta laborum quas incidunt omnis, minus tempora at doloremque rem? Dolorem cupiditate eius itaque enim vitae doloremque hic, fugiat reiciendis iusto fugit sed facilis illum voluptates laborum laboriosam ullam voluptatum excepturi, nobis voluptatem laudantium culpa! Error autem deserunt impedit tempore quis enim reprehenderit in quia eius quo, corporis, excepturi repellendus inventore reiciendis aliquid.",
            "attachments"   => "",
            "date"          => "15 Juni 2022",
        ],
        (object)[
            "title"         => "Lorem ipsum dolor sit amet consectetur.",
            "content"       => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam quidem error ratione, illum quaerat praesentium fugit officiis nisi atque alias repellat. Harum sint culpa perferendis porro error. Iste minus a corrupti animi architecto dignissimos eveniet maiores accusantium consequatur. Velit neque ut, repellat soluta autem atque consectetur excepturi dicta laborum quas incidunt omnis, minus tempora at doloremque rem? Dolorem cupiditate eius itaque enim vitae doloremque hic, fugiat reiciendis iusto fugit sed facilis illum voluptates laborum laboriosam ullam voluptatum excepturi, nobis voluptatem laudantium culpa! Error autem deserunt impedit tempore quis enim reprehenderit in quia eius quo, corporis, excepturi repellendus inventore reiciendis aliquid.",
            "attachments"   => "",
            "date"          => "15 Juni 2022"
        ],
        (object)[
            "title"         => "Lorem ipsum dolor sit amet consectetur.",
            "content"       => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam quidem error ratione, illum quaerat praesentium fugit officiis nisi atque alias repellat. Harum sint culpa perferendis porro error. Iste minus a corrupti animi architecto dignissimos eveniet maiores accusantium consequatur. Velit neque ut, repellat soluta autem atque consectetur excepturi dicta laborum quas incidunt omnis, minus tempora at doloremque rem? Dolorem cupiditate eius itaque enim vitae doloremque hic, fugiat reiciendis iusto fugit sed facilis illum voluptates laborum laboriosam ullam voluptatum excepturi, nobis voluptatem laudantium culpa! Error autem deserunt impedit tempore quis enim reprehenderit in quia eius quo, corporis, excepturi repellendus inventore reiciendis aliquid.",
            "attachments"   => "",
            "date"          => "15 Juni 2022"
        ],
        (object)[
            "title"         => "Lorem ipsum dolor sit amet consectetur.",
            "content"       => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam quidem error ratione, illum quaerat praesentium fugit officiis nisi atque alias repellat. Harum sint culpa perferendis porro error. Iste minus a corrupti animi architecto dignissimos eveniet maiores accusantium consequatur. Velit neque ut, repellat soluta autem atque consectetur excepturi dicta laborum quas incidunt omnis, minus tempora at doloremque rem? Dolorem cupiditate eius itaque enim vitae doloremque hic, fugiat reiciendis iusto fugit sed facilis illum voluptates laborum laboriosam ullam voluptatum excepturi, nobis voluptatem laudantium culpa! Error autem deserunt impedit tempore quis enim reprehenderit in quia eius quo, corporis, excepturi repellendus inventore reiciendis aliquid.",
            "attachments"   => "",
            "date"          => "15 Juni 2022"
        ],
        (object)[
            "title"         => "Lorem ipsum dolor sit amet consectetur.",
            "content"       => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam quidem error ratione, illum quaerat praesentium fugit officiis nisi atque alias repellat. Harum sint culpa perferendis porro error. Iste minus a corrupti animi architecto dignissimos eveniet maiores accusantium consequatur. Velit neque ut, repellat soluta autem atque consectetur excepturi dicta laborum quas incidunt omnis, minus tempora at doloremque rem? Dolorem cupiditate eius itaque enim vitae doloremque hic, fugiat reiciendis iusto fugit sed facilis illum voluptates laborum laboriosam ullam voluptatum excepturi, nobis voluptatem laudantium culpa! Error autem deserunt impedit tempore quis enim reprehenderit in quia eius quo, corporis, excepturi repellendus inventore reiciendis aliquid.",
            "attachments"   => "",
            "date"          => "15 Juni 2022"
        ],
    );
?>

@extends('website.layouts.master')

@section('content')
<div class="w-full lg:w-3/5 m-auto bg-white drop-shadow-md py-4 px-3 lg:p-10 min-h-[calc(100vh-4.75rem)] lg:min-h-[calc(100vh-5.5rem)]">
    <div class="mb-4">
        <p class="text-2xl lg:text-3xl text-center text-emerald-600 font-serif font-bold tracking-wider">
            Berita dan Pengumuman
        </p>
    </div>
    @forelse ($periods as $period)
        <div class="mb-4 flex justify-between items-center border-b-2 border-emerald-400 text-gray-700 pb-2">
            <p id="periodNameNews_{{ $period->id }}" class="cursor-pointer flex items-center period-name">
                <span class="text-base text-gray-600 lg:text-xl font-bold lg:tracking-wide">
                    {{ $period->name }}
                </span>
                <br>
                <span class="w-fit text-[8px] lg:text-xs ml-2 py-0.5 px-1 rounded border-[1px] font-bold leading-3
                    {{ $period->is_active ? 'text-blue-50 bg-blue-600 border-blue-600' : 'text-slate-50 bg-slate-400 border-slate-400' }}"
                >
                    {{ $period->is_active ? 'AKTIF' : 'TIDAK AKTIF' }}
                </span>
            </p>
            <div id="periodOpenNews_{{ $period->id }}" class="cursor-pointer text-gray-600 open-period-news">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 lg:h-8 w-6 lg:w-8" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        @if ($period->is_exam_selection_over || $period->is_file_selection_over || $period->is_open_for_selection)
            <div id="news_{{ $period->id }}" class="{{ $period->is_active ? '' : 'hidden' }} p-1 pt-3 bg-gray-200 w-full mb-2">
                @if ($period->is_exam_selection_over)
                    <div class="p-2 bg-white rounded mb-3">
                        <a href="{{ route('website.news.exam_selection_over',$period) }}"
                            class="text-base font-semibold text-emerald-700 hover:text-emerald-600"
                        >
                            Daftar Mahasiswa Lulus Menjadi Asisten Praktikum 
                            {{ $period->name }}
                        </a>
                        <p class="text-xs font-light text-gray-500 mb-2">{{ $period->is_exam_selection_over_date }}</p>
                        <p class="truncate mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque nulla rem, magni, ducimus reiciendis, magnam ut animi dolor autem laudantium distinctio repellendus laborum eveniet accusamus!
                        </p>
                        <a class="min-w-fit flex items-center gap-2 text-blue-600" 
                            href="{{ route('website.news.exam_selection_over',$period) }}">
                            <p class="font-semibold">Lihat lebih lanjut</p>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </a>
                    </div>
                @endif

                @if ($period->is_file_selection_over)
                    <div class="p-2 bg-white rounded mb-3">
                        <a href="{{ route('website.news.exam_selection_over',$period) }}"
                            class="text-base font-semibold text-emerald-700 hover:text-emerald-600"
                        >
                            Hasil Seleksi Berkas Asisten Praktikum
                            {{ $period->name }}
                        </a>
                        <p class="text-xs font-light text-gray-500 mb-2">{{ $period->is_file_selection_over_date }}</p>
                        <p class="truncate mb-2">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Fugiat doloribus sapiente, cum officia corrupti veniam ad, officiis accusantium sequi alias obcaecati eveniet dolore explicabo tenetur deleniti mollitia, dolorum odit rerum pariatur neque aut delectus quia quasi! Minima necessitatibus quos recusandae, deserunt impedit, error omnis eius cumque iusto doloremque maxime nemo accusamus perferendis id aspernatur fuga qui quam rerum iste quod itaque quasi alias! Sed vitae quis, pariatur quasi quo modi quia ducimus dolorem, odit minus doloremque non, delectus in perferendis similique commodi sit blanditiis obcaecati repellendus corrupti? Illum quia, maxime vitae fugiat velit laborum neque ratione? Dolor qui magni ullam.
                        </p>
                        <a class="min-w-fit flex items-center gap-2 text-blue-600" 
                            href="{{ route('website.news.file_selection_over',$period) }}"
                        >
                            <p class="font-semibold">Lihat lebih lanjut</p>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </a>
                    </div>
                @endif

                @if ($period->is_open_for_selection)
                    <div class="p-2 bg-white rounded mb-3">
                        <a href="{{ route('website.news.exam_selection_over',$period) }}"
                            class="text-base font-semibold text-emerald-700 hover:text-emerald-600"
                        >
                            Seleksi Penerimaan Asisten Praktikum
                            {{ $period->name }}
                            Telah Dibuka
                        </a>
                        <p class="text-xs font-light text-gray-500 mb-2">{{ $period->is_open_for_selection_date }}</p>
                        <p class="truncate mb-2">Telah dibuka pendaftaran Asisten Praktikum Laboratorium Multimedia ITERA. Berikut adalah daftar Mata Kuliah dan jumlah Asisten Praktikum yang dibutuhkan pada saat ini.
                        </p>
                        <a class="min-w-fit flex items-center gap-2 text-blue-600" 
                            href="{{ route('website.news.open_for_selection', $period) }}"
                        >
                            <p class="font-semibold">Lihat lebih lanjut</p>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </a>
                    </div>
                @endif
            </div>
        @else
            <div id="news_{{ $period->id }}" class="{{ $period->is_active ? '' : 'hidden' }} border w-full mb-2">
                <p class="text-lg lg:text-xl text-center p-6 py-[72px] lg:py-[128px] text-gray-500 bg-gray-50">
                    Belum ada berita untuk periode ini
                </p>
            </div>
        @endif
    @empty
        <div class="w-full min-h-[calc(100vh-12rem)] lg:min-h-[calc(100vh-15rem)] border flex flex-col justify-center items-center border-3 border-gray-500  bg-gray-50">
            <div class="lg:flex gap-6 justify-center items-center text-gray-500">
                <span class="block w-fit m-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
                <p class="text-2xl lg:text-3xl text-center">
                    Belum ada periode yang dibuka
                </p>
            </div>
        </div>
    @endforelse
</div>
@endsection

@section('scripts')
    <script>
        function print(data){
            console.log(data);
        }

        $(document).ready(function () {
            $(".period-name").click(function (e) { 
                e.preventDefault();
                let id = $(this).attr("id").split('_')[1];
                if($("#news_"+id).hasClass("hidden")){
                    $("#periodOpenNews_"+id).addClass("rotate-180");
                    $("#news_"+id).removeClass("hidden");
                }else{
                    $("#periodOpenNews_"+id).removeClass("rotate-180");
                    $("#news_"+id).addClass("hidden");
                }
            });
            $(".open-period-news").click(function (e) { 
                e.preventDefault();
                let id = $(this).attr("id").split('_')[1];
                if($("#news_"+id).hasClass("hidden")){
                    $(this).addClass("rotate-180");
                    $("#news_"+id).removeClass("hidden");
                }else{
                    $(this).removeClass("rotate-180");
                    $("#news_"+id).addClass("hidden");
                }
            });
        });
    </script>
@endsection