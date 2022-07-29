@component('mail::message')

# {{ $maildata['title'] }}

---

### Penerimaan Asisten Praktikum Laboratorium Multimedia Institut Teknologi Sumatera Periode {{ $period->name }}

***

Selamat kepada saudara {{ $maildata['receiver'] }},
telah dinyatakan lulus tahap Seleksi Tes pada Penerimaan Asisten Praktikum Mata Kuliah
@foreach ($registrar->period_subjects as $subject)
@if ($subject->pivot->is_pass_exam_selection)
- **{{ $subject->subject->name }}**
@endif

@endforeach

Dengan ini anda telah resmi menjadi Asisten Praktikum Laboratorium Multimedia Institut Teknologi Sumatera Periode {{
$period->name }}.

Diharapkan untuk dapat memberikan kontribusi terbaiknya dalam tanggung jawab sebagai asisten praktikum.

Pastikan anda selalu memantau perkembangan Jadwal Praktikum yang akan anda ampu, dan menggunakan fitur presensi yang
tersedia pada website [Laboratorium Multimedia ITERA]({{ route('login') }})

@component('mail::button', ['url' => route('login'), 'color' => 'success'])
Login Website
@endcomponent

Sekian informasi ini kami sampaikan.

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
