@extends('layouts.main')
@section('content')
    <div class="col-8 offset-2" >
        @if(session()->has('update-success'))
            <div class="alert alert-success">{{ session('update-success') }}</div>
        @endif
        @if(session()->has('remove-success'))
            <div class="alert alert-success">{{ session('remove-success') }}</div>
        @endif

        <h1>Создать нового пользователя</h1>

        <form method="post" action="{{ route('users.store') }}">
            @csrf
            <label for="name" class="col-form-label">Логин</label>
            <input id = "name" type="text" name="name" value="{{ old('name') }}" class="form-control">
            <br>
            @error('name') <div class="alert alert-danger">
                @foreach($errors->get('name') as $error)
                    {{ $error }}
                @endforeach
            </div>
            @enderror
            <label for="password" class="col-form-label">Пароль</label>
            <input id = "password" type="password" name="password"  class="form-control">
            <br>
            @error('password') <div class="alert alert-danger">
                @foreach($errors->get('password') as $error)
                    {{ $error }}
                @endforeach
            </div>
            @enderror
            <label for="email" class="col-form-label">Email</label>
            <input id = "email" type="email" name="email" value="{{ old('email') }}" class="form-control">
            @error('email') <div class="alert alert-danger">
                @foreach($errors->get('email') as $error)
                    {{ $error }}
                @endforeach
            </div>
            @enderror
            <br>
            <label for="is_admin" class="col-form-label">Админ</label>
            <input id="is_admin" type="checkbox" name="is_admin" class="form-control">
            <br>
            <input type="submit" value="Создать" class="btn-success">
        </form>
    </div>
    <br>
@endsection
