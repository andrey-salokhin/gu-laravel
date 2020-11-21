@extends('layouts.main')
@section('content')
    <div class="col-8 offset-2" >

        <h1>Изменить новость</h1>
        <br>
        <form method="post" action="{{ route('news.update', ['news' => $news]) }}">
            @method('PUT')
            @csrf
            <label for="title" class="col-form-label">Заголовок</label>
            <input id = "title" type="text" name="title" value="{{ $news->title }}" class="form-control">
            <br>
            <label for="description" class="col-form-label">Описание новости</label>
            <textarea id="description" name="description" class="form-control">{{ $news->description }}</textarea>
            <br>
            <label for="author" class="col-form-label">Ваше имя</label>
            <input id="author" type="text" name="author" value="{{ $news->author }}" class="form-control">
            <br>
            <br>
            <input type="submit" value="Изменить" class="btn-success">
        </form>
    </div>
    <br>
@endsection
