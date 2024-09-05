@extends('template')

@section('content')
@if ($errors->any())
    <div class="red-background">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<h1>こんにちは！</h1>
@endsection