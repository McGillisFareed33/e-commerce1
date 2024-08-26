@extends('template')

@section('content')
   
<form method="post" action="{{ route('kullanici.ekle') }}" >
    
    @csrf
    <label for="Username">Username:</label>
    <input type="text" id="Username" name="Username" >

    <label for="UserTitle">UserTitle:</label>
    <input type="text" id="UserTitle" name="UserTitle" >
    
    <label for="Password">Password:</label>
    <input type="password" id="Password" name="Password">
    
    <button type="submit">Submit</button>
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