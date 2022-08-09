@component('mail::message')

# {{ $maildata['title'] }}

---

### Penerimaan Asisten Praktikum Laboratorium Multimedia Institut Teknologi Sumatera Periode {{ $period->name }}

***

Selamat kepada saudara {{ $maildata['receiver'] }}, telah dinyatakan lulus tahap Seleksi Berkas pada mata kuliah

@forelse ($maildata['subjects'] as $subject)
@if ($subject->pivot->is_pass_file_selection)
- **{{ $subject->subject->name }}**
@endif

@empty
@endforelse

Berikut merupakan informasi akun anda :

@component('mail::table')
> | | |
> | ------------- | ------------------------------------- |
> | **Email** | {{ $maildata['registrar_email'] }} |
> | **Password** | {{ $maildata['registrar_password'] }} |
> | | |
@endcomponent

yang dapat anda gunakan untuk login ke [Laboratorium Multimedia]( {{ route('login') }} )

@component('mail::button', ['url' => route('login'), 'color' => 'success'])
Login Website
@endcomponent

Sekian informasi ini kami sampaikan.

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
