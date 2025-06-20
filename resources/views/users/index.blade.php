@extends('layouts.app')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3>Danh sách người dùng</h1>
    </div>
    @if(session('success'))
        <div style="color:green">{{ session('success') }}</div>
    @endif
<div class="table table-responsive">
    <table class="table table-striped" id="myTable">
        <thead>
            <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>

                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Sửa</a> |
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block"
                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
     </div>

    {{ $users->links() }}
</div>
@endsection
