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
                <th>ID</th>
                <th>Kategori ismi</th>
                <th>Kategori tanımı</th>
                <th>Kategori durumu</th>
                <th>Oluşturulma zamanı</th>
                <th>Güncellenme zamanı</th>
                <th>Aksiyon</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->CategoryTitle }}</td>
                <td>{{ $category->CategoryDescription }}</td>
                <td>{{ $category->Status }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td>
                    <div class="action-buttons">
                    <form method="get" action="{{route('category.edit', $category->id)}}">
                        <button class="edit-button" >Düzenle</button>
                    </form>
                    <form id="delete-form" method="get" action="{{route('category.delete', $category->id)}}" onsubmit="return confirm('Bu öğeyi silmek istediğinizden emin misiniz?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button" >Sil</button>
                    </form>
                    </div>
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
    {{ $categories->links('pagination::bootstrap-4') }}
</div>
@endsection
@endsection