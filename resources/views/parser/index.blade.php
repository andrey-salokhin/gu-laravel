@extends('layouts.app')
@section('content')
    @if(session()->has('success'))
        <div class="card-body text-center">
            <h1 class="card-title">{{ session()->get('success') }}</h1>
        </div>
    @else
        <div class="card-body text-center">
            <h1 class="card-title">Что-то пошло не так :(</h1>
        </div>
    @endif
@endsection
