@extends('template')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<form method="post" action="{{ route('user.update', $user->id) }}" >

    @csrf
    <label for="Username">Takma ad:</label>
    <input type="text" id="Username" name="Username" value="{{ old('Username', $user->Username) }}">

    <label for="UserTitle">Kullanıcı ismi:</label>
    <input type="text" id="UserTitle" name="UserTitle" value="{{ old('UserTitle', $user->UserTitle) }}">
    
    <label for="Password">Şfire:</label>
    <input type="password" id="Password" name="Password">
    
    <button type="submit">Güncelle</button>
</form>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection