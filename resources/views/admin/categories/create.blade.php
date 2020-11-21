@extends('layouts.main')
@section('content')
    <div class="col-8 offset-2" >

        @if(session()->has('success'))
            <div class="alert alert-success">Категория успешно добавлена</div>
        @elseif(session()->has('fail'))
            <div class="alert alert-danger">Не удалось добавить категориб</div>
        @endif

        <h1>Добавить новость на сайт</h1>
        <br>
        <form method="post" action="{{ route('categories.store') }}">
            @csrf
            <label for="title" class="col-form-label">Заголовок</label>
            <input id = "title" type="text" name="title" value="{{ old('title') }}" class="form-control">
            @error('title') <div class="alert alert-danger">
                @foreach($errors->get('title') as $error)
                    {{ $error }}
                @endforeach
            </div>
            @enderror
            <br>
            <label for="description" class="col-form-label">Описание новости</label>
            <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
            @error('description') <div class="alert alert-danger">
                @foreach($errors->get('description') as $error)
                    {{ $error }}
                @endforeach
            </div>
            @enderror
            <br>
            <input type="submit" value="Отправить" class="btn-success">
        </form>
    </div>
    <br>
@endsection
