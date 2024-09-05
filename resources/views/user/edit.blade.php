@extends('template')

@section('content')

<form method="post" action="{{ route('user.update', $user->id) }}" >

    @csrf
    <label for="Username">Takma ad:</label>
    <input type="text" id="Username" name="Username" value="{{ old('Username', $user->Username) }}">

    <label for="UserTitle">Kullanıcı ismi:</label>
    <input type="text" id="UserTitle" name="UserTitle" value="{{ old('UserTitle', $user->UserTitle) }}">
    
    <label for="password">Şfire:</label>
    <input type="password" id="password" name="password">
    
    <button type="submit">Güncelle</button>
</form>
<div>
    @if ($errors->any())
    <div class="red-background">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
@endsection