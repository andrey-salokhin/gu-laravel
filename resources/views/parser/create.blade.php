@extends('layouts.app')
@section('content')
    <div class="col-8 offset-2" >
        <h1>Форма заказа на получение выгрузки данных из источника</h1>
        <br>
        <form method="post" action="{{ route('parser.store') }}">
            @csrf
            <input type="text" placeholder="Ваше имя" name="name" value="{{ old('name') }}" class="form-control">
            <br>
            <input type="number" placeholder="Ваше номер телефона" name="phone" value="{{ old('phone') }}" class="form-control">
            <br>
            <input type="email" placeholder="Ваше e-mail адрес" name="email" value="{{ old('email') }}" class="form-control">
            <br>
            <textarea name="description" placeholder="Напишите сюда, что вы хотите получить" class="form-control">{{ old('description') }}</textarea>
            <br>
            <input type="submit" value="Отправить" class="btn-success">
        </form>
    </div>
@endsection
