@extends('template')

@section('content')
    
<form method="post" action="{{ route('kullanici.duzenle', $user->id) }}" >

    @csrf
    <label for="Username">Username:</label>
    <input type="text" id="Username" name="Username" value="{{ old('Username', $user->Username) }}" required>
    
    <label for="Password">Password:</label>
    <input type="password" id="Password" name="Password">
    
    <button type="submit">Update</button>
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