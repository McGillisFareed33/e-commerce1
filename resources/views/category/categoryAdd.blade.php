@extends('template')

@section('content')
   
<form method="post" action="{{ route('kategori.ekle') }}" >
    
    @csrf
    <label for="CategoryTitle">CategoryTitle:</label>
    <input type="text" id="CategoryTitle" name="CategoryTitle" >
    
    <label for="CategoryDescription">CategoryDescription:</label>
    <input type="text" id="CategoryDescription" name="CategoryDescription">

    <label for="Status">Ürün Durumu:</label>
            <select id="Status" name="Status">
                <option value="pasif">Pasif</option>
                <option value="aktif">Aktif</option>
            </select>
    
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