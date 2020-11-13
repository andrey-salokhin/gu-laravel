@extends('layouts.app')
@section('content')
<div class="col-8 offset-2" >
    <h1>Пожалуйста оцените наш проект</h1>
    <br>
    <form method="post" action="{{ route('contact-us.store') }}">
        @csrf
        <input type="text" placeholder="Ваше имя" name="name" value="{{ old('name') }}" class="form-control">
        <br>
        <textarea name="description" placeholder="Напишите сюда, что думаете о проекте" class="form-control">{{ old('description') }}</textarea>
        <br>
        <input type="submit" value="Отправить" class="btn-success">
    </form>
</div>
@endsection
