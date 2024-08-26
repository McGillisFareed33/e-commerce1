@extends('template')

@section('content')
   
<form method="post" action="{{ route('category.store') }}" >
    
    @csrf
    <label for="CategoryTitle">Kategori ismi:</label>
    <input type="text" id="CategoryTitle" name="CategoryTitle" >
    
    <label for="CategoryDescription">Kategori tanımı:</label>
    <input type="text" id="CategoryDescription" name="CategoryDescription">

    <label for="Status">Kategori durumu:</label>
            <select id="Status" name="Status">
                <option value="pasif">Pasif</option>
                <option value="aktif">Aktif</option>
            </select>
    
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