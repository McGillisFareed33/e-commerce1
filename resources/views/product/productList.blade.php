@extends('template')
@extends('list')

@section('list')
@section('content')
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>UserTitle</th>
                <th>Password</th>
                <th>Password</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <!-- foreach yapılacak -->
        <tbody>
            <tr>
                <td>1</td>
                <td>john_doe</td>
                <td>Admin</td>
                <td>*******</td>
                <th>Password</th>
                <td>2024-01-01</td>
                <td>2024-01-02</td>
                <td>
                    
                    <div class="action-buttons">
                    <form method="post" action="{{route('urun.silme')}}">
                        @csrf
                        <button class="delete-button" >Sil</button>
                    </form>
                    </div>
                
                </td>
            </tr>
            <!-- Daha fazla satır ekleyebilirsiniz -->
        </tbody>
        
    </table>
</div>
@endsection
@endsection