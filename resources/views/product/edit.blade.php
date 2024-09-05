@extends('template')

@section('content')

<div class="container">
    <h2 class="product-name">Ürün adı: {{$product->ProductTitle}}
    <hr>

    

    <form method="post" action="{{ route('product.update', $product->id) }}" class="product-image" enctype="multipart/form-data">
        @csrf
        <div>
        <label >Resim yükle</label>
        <input type="file" name="Image" multiple class="form-control" accept="image/*">
        </div>
        <div>
        <button type="submit">Yükle</button>
        </div>
    </form>

    <a href="{{ route('product.list') }}" class="back-button">Geri</a>
</div>
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

