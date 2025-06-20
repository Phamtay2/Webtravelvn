@extends('layouts.app')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Sửa người dùng</h3>
    </div>

    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Tên:</label>
                <input type="text" id="name" name="name" class="form-control" 
                       value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" 
                       value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role:</label>
                @php
                    $userRole = old('role', $user->role);
                @endphp
                <select name="role" id="role" class="form-select" required>
                    <option value="admin" {{ $userRole == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="editor" {{ $userRole == 'editor' ? 'selected' : '' }}>Editor</option>
                    <option value="categoryMng" {{ $userRole == 'categoryMng' ? 'selected' : '' }}>Category Manager</option>
                    <option value="tourMng" {{ $userRole == 'tourMng' ? 'selected' : '' }}>Tour Manager</option>
                    <option value="viewer" {{ $userRole == 'viewer' ? 'selected' : '' }}>Viewer</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary ms-2">Hủy</a>
        </form>
    </div>
</div>
@endsection
