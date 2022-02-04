@extends('layouts.main')
@section('content')
<div>

    @if(session()->has('update-success'))
        <div class="alert alert-success">Новость успешно отредактирована</div>
    @endif

    <div>
        <h2>{{ $news->title }}</h2>
        <p>{{ $news->description }}</p>
        @auth
            @if(\Illuminate\Support\Facades\Auth::user()->is_admin === true)
                <a href="{{ route('news.edit', ['news' => $news]) }}" class="btn btn-primary">Редактировать новость</a>
            @endif
        @endauth

        <br>
        <br>
        @auth
            @if(\Illuminate\Support\Facades\Auth::user()->is_admin === true)
                <form action="{{ route('news.destroy', ['news' => $news]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить новость</button>
                </form>
            @endif
        @endauth
        <br>
    </div>
</div>
@endsection
