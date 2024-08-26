@extends('template')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<form method="post" action="{{ route('category.edit', $category->id) }}" >

    @csrf
    <label for="CategoryTitle">Kategori ismi:</label>
    <input type="text" id="CategoryTitle" name="CategoryTitle" value="{{ old('CategoryTitle', $category->CategoryTitle) }}">
    
    <label for="CategoryDescription">Kategori tanımı:</label>
    <input type="text" id="CategoryDescription" name="CategoryDescription" value="{{ old('CategoryDescription', $category->CategoryDescription) }}">

    <label for="Status">Kategori durumu:</label>
            <select id="Status" name="Status">
                <option value="pasif">Pasif</option>
                <option value="aktif">Aktif</option>
            </select>
    
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