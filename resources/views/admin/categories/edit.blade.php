@extends('layouts.main')
@section('content')
    <div class="col-8 offset-2" >

        <h1>Изменить новость</h1>
        <br>
        <form method="post" action="{{ route('categories.update', ['category' => $category]) }}">
            @method('PUT')
            @csrf
            <label for="title" class="col-form-label">Заголовок</label>
            <input id = "title" type="text" name="title" value="{{ $category->title }}" class="form-control">
            <br>
            <label for="description" class="col-form-label">Описание новости</label>
            <textarea id="description" name="description" class="form-control">{{ $category->description }}</textarea>
            <br>
            <input type="submit" value="Изменить" class="btn-success">
        </form>
    </div>
    <br>
@endsection
