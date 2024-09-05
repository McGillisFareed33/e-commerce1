@extends('template')

@section('content')
   
<form method="post" action="{{ route('product.store') }}" >
    
    @csrf
    <label for="ProductTitle">Ürün ismi:</label>
    <input type="text" id="ProductTitle" name="ProductTitle" >
    
    <label for="ProductCategoryId">Kategori Seç:</label>
            <select id="ProductCategoryId" name="ProductCategoryId">
              
                <option value="" disabled selected>Kategori Seçin</option>
                @foreach($categories as $category)
                     <option value="{{ $category->id }}">{{ $category->CategoryTitle }}</option>
                @endforeach
            </select>

            <label for="ProductStatus">Ürün Durumu:</label>
            <select id="ProductStatus" name="ProductStatus">
                <option value="pasif">Pasif</option>
                <option value="aktif">Aktif</option>
            </select>
    
    <button type="submit">Onayla</button>
</form>
@if ($errors->any())
    <div class="alert-error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection