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
                <th>Username</th>
                <th>User Title</th>
                <th>Password</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->Username }}</td>
                <td>{{ $user->UserTitle }}</td>
                <td>{{ $user->Password }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td>
                    
                    <div class="action-buttons">
                    <form method="get" action="{{route('kullanici.duzenleme', $user->id)}}">
                        @csrf
                        <button class="edit-button" >Düzenle</button>
                    </form>
                    <form method="get" action="{{route('kullanici.silme', $user->id)}}">
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