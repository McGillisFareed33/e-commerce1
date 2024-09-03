@extends('template')

@section('content')
   
<form method="post" action="{{ route('user.store') }}" >
    
    @csrf
    <label for="Username">Takma ad:</label>
    <input type="text" id="Username" name="Username" >

    <label for="UserTitle">Kullanıcı ismi:</label>
    <input type="text" id="UserTitle" name="UserTitle" >
    
    <label for="password">Şfire:</label>
    <input type="password" id="password" name="password">
    
    <button type="submit">Onayla</button>
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