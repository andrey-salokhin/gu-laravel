@extends('layouts.app')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session()->has('fail'))
        <div class="alert alert-success">{{ session('fail') }}</div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                <a class="btn btn-primary" href="{{ route('admin.parser.news') }}">Получить новости</a>
                <br>
                <br>
                <a class="btn btn-primary" href="{{ route('exchange_rates.index') }}">Проверить курсы валют</a>
            </div>
        </div>
    </div>
<div>
@endsection
