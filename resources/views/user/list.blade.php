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
                <th>Takma ad</th>
                <th>Kullanıcı ismi</th>
                <th>Şifre</th>
                <th>Oluşturulma zamanı</th>
                <th>Güncellenme zamanı</th>
                <th>Aksiyon</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->Username }}</td>
                <td>{{ $user->UserTitle }}</td>
                <td>{{ $user->password }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td>
                    
                    <div class="action-buttons">
                    <form method="get" action="{{route('user.edit', $user->id)}}">
                        @csrf
                        <button class="edit-button" >Düzenle</button>
                    </form>
                    <form id="delete-form" method="get" action="{{route('user.delete', $user->id)}}" onsubmit="return confirm('Bu öğeyi silmek istediğinizden emin misiniz?')">
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