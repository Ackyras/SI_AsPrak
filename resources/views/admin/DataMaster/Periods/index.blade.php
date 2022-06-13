@extends('layouts.app')

@section('content')
    <h2>This Is Period Index</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
        @foreach($periods as $period)
            <tr>
                <td>{{ $period->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection