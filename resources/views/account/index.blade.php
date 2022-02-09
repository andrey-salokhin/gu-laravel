@extends('layouts.main')

@section('content')

    @if(session()->has('password'))
        <div class="alert alert-success">{{ session('password') }}</div>
    @endif
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1>Добро пожаловать {{ \Illuminate\Support\Facades\Auth::user()->name }}</h1>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input type="submit" value="Выйти" class="btn-success">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
