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
                <th>Category Title</th>
                <th>Category Description</th>
                <th>Status</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <!-- foreach yapılacak -->
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
                    <form method="get" action="{{route('kategori.duzenleme', $category->id)}}">
                        @csrf
                        <button class="edit-button" >Düzenle</button>
                    </form>
                    <form method="get" action="{{route('kategori.silme', $category->id)}}">
                        @csrf
                        <button class="delete-button" >Sil</button>
                    </form>
                    </div>
                    @endforeach
                </td>
            </tr>
            <!-- Daha fazla satır ekleyebilirsiniz -->
        </tbody>
    </table>
</div>
@endsection
@endsection