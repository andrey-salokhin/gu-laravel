@extends('layouts.main')
@section('content')
    <div class="col-8 offset-2" >
        @if(session()->has('update-success'))
            <div class="alert alert-success">{{ session('update-success') }}</div>
        @endif
        @if(session()->has('remove-success'))
            <div class="alert alert-success">{{ session('remove-success') }}</div>
        @endif
        <h1>Изменить пользователя {{ $user->name }}</h1>
        <br>
        <form method="post" action="{{ route('users.update', ['user' => $user]) }}">
            @method('PUT')
            @csrf
            <label for="name" class="col-form-label">Логин</label>
            <input id = "name" type="text" name="name" value="{{ $user->name }}" class="form-control">
            <br>
            @error('name') <div class="alert alert-danger">
                @foreach($errors->get('name') as $error)
                    {{ $error }}
                @endforeach
            </div>
            @enderror
            <label for="password" class="col-form-label">Пароль</label>
            <input id = "password" type="password" name="password" class="form-control">
            <br>
            @error('password') <div class="alert alert-danger">
                @foreach($errors->get('password') as $error)
                    {{ $error }}
                @endforeach
            </div>
            @enderror
            <label for="email" class="col-form-label">Email</label>
            <input id = "email" type="email" name="email" value="{{ $user->email }}" class="form-control">
            @error('email') <div class="alert alert-danger">
                @foreach($errors->get('email') as $error)
                    {{ $error }}
                @endforeach
            </div>
            @enderror
            <br>
            <label for="is_admin" class="col-form-label">Админ</label>
            <input id="is_admin" type="checkbox" name="is_admin"
                   @if($user->is_admin === true)
                   checked
                   @endif
                   class="form-control">
            @error('is_admin') <div class="alert alert-danger">
                @foreach($errors->get('is_admin') as $error)
                    {{ $error }}
                @endforeach
            </div>
            @enderror
            <br>
            <br>
            <input type="submit" value="Изменить" class="btn-success">
        </form>
    </div>
    <br>
@endsection
