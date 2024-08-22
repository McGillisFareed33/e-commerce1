@extends('template')
@extends('list')

@section('list')
@section('content')
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Title</th>
                <th>Product CategoryId</th>
                <th>Barcode</th>
                <th>Product Status</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <!-- foreach yapılacak -->
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->ProductTitle }}</td>
                <td>{{ $product->ProductCategoryId }}</td>
                <td>{{ $product->Barcode }}</td>
                <td>{{ $product->ProductStatus }}</td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->updated_at }}</td>
                <td>
                    <div class="action-buttons">
                    <form method="get" action="{{route('urun.silme', $product->id)}}">
                        @csrf
                        <button class="delete-button" >Sil</button>
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