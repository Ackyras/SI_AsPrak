@php
    $period     = "Semester Ganjil TA 2022/2023";
    $subject    = "Rekayasa Perangkat Lunak";
@endphp

@component('mail::message')

# {{ $maildata['title'] }}

---

### Penerimaan Asisten Praktikum Laboratorium Multimedia Institut Teknologi Sumatera Periode {{ $period }}

***

Selamat kepada saudara {{ $maildata['receiver'] }}, telah dinyatakan lulus tahap Seleksi Berkas pada mata kuliah **{{ $subject }}**

Berikut merupakan informasi akun anda :

@component('mail::table')
> |               |                                       |
> | ------------- | ------------------------------------- |
> | **Email**     | {{ $maildata['registrar_email'] }}    |
> | **Password**  | {{ $maildata['registrar_password'] }} |
> |               |                                       |
@endcomponent

yang dapat anda gunakan untuk login ke [Laboratorium Multimedia](https://url.disini.yaa)

@component('mail::button', ['url' => 'https://url.disini.yaa', 'color' => 'success'])
Login Website
@endcomponent

Sekian informasi ini kami sampaikan.

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent

