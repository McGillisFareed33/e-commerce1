@extends('template')
@extends('list')

@section('list')
@section('content')
<div class="table-container">
    <table>
        <thead>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <tr>
                <th>Resim</th>
                <th>ID</th>
                <th>Ürün ismi</th>
                <th>Ürün kategorisi</th>
                <th>Barkod</th>
                <th>Ürün durumu</th>
                <th>Oluşturulma zamanı</th>
                <th>Güncellenme zamanı</th>
                <th>Resimler</th>
                <th>Aksiyon</th>
            </tr>
        </thead>
        <!-- foreach yapılacak -->
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>
                    <img src="{{asset($product->Image)}}" style="width: 70px; height: 70px;" alt="Img">
                </td>
                <td>{{ $product->id }}</td>
                <td>{{ $product->ProductTitle }}</td>
                <td>
                    {{ $product->category ? $product->category->CategoryTitle : 'Kategori Yok' }}
                </td>
                <td>{{ $product->Barcode }}</td>
                <td>{{ $product->ProductStatus }}</td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->updated_at }}</td>
                <td>
                    <a href="{{$product->id.'/upload'}}" class="edit-button">Resim ekle/görüntüle</a>
                </td>
                <td>
                    <div class="action-buttons">
                    <form id="delete-form" method="get" action="{{route('product.delete', $product->id)}}" onsubmit="return confirm('Bu öğeyi silmek istediğinizden emin misiniz?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button" >Sil</button>
                    </form>
                    </div>
                
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>
@endsection
@endsection