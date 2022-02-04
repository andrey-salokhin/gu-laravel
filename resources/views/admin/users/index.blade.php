@extends('layouts.main')
@section('content')

    <a href="{{ route('users.create') }}">Создать нового пользователя</a>
    @if(session()->has('update-success'))
        <div class="alert alert-success">{{ session('update-success') }}</div>
    @endif
    @if(session()->has('remove-success'))
        <div class="alert alert-success">{{ session('remove-success') }}</div>
    @endif
    <table>
        <tr>
            <th>Login</th>
            <th>Email</th>
            <th>Last login</th>
            <th>Admin</th>
        </tr>
    @foreach($users as $u)
            <tr>
                <th>{{ $u->name }}</th>
                <th>{{ $u->email }}></th>
                <th>{{ $u->last_login_at }}</th>
                <th>
                    @if($u->is_admin === true)
                        yes
                    @else
                        no
                    @endif</th>
                    <th><a href="{{ route('users.edit', ['user' => $u]) }}">Изменить</a> </th>
                <th>
                    <form action="{{ route('users.destroy', ['user' => $u]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </th>
            </tr>
    @endforeach
    </table>
@endsection
