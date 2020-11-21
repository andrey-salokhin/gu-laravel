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
            <br>
            <label for="description" class="col-form-label">Описание новости</label>
            <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
            <br>
            <input type="submit" value="Отправить" class="btn-success">
        </form>
    </div>
    <br>
@endsection
