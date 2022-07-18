@php
    $period     = "Semester Ganjil TA 2022/2023";
    $subject    = "Rekayasa Perangkat Lunak";
@endphp

@component('mail::message')

# {{ $maildata['title'] }}

---

### Penerimaan Asisten Praktikum Laboratorium Multimedia Institut Teknologi Sumatera Periode {{ $period }}

***

Selamat kepada saudara {{ $maildata['receiver'] }},  
telah dinyatakan lulus tahap Seleksi Tes pada Penerimaan Asisten Praktikum Mata Kuliah **{{ $subject }}**

Dengan ini anda telah resmi menjadi Asisten Praktikum Laboratorium Multimedia Institut Teknologi Sumatera Periode {{ $period }}.

Diharapkan untuk dapat memberikan kontribusi terbaiknya dalam tanggung jawab sebagai asisten praktikum.

Pastikan anda selalu memantau perkembangan Jadwal Praktikum yang akan anda ampu, dan menggunakan fitur presensi yang tersedia pada website [Laboratorium Multimedia ITERA](https://url.disini.yaa)

@component('mail::button', ['url' => 'https://url.disini.yaa', 'color' => 'success'])
Login Website
@endcomponent

Sekian informasi ini kami sampaikan.

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent

