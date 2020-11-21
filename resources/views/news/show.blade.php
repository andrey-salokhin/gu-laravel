@extends('layouts.main')
@section('content')
<div>

    @if(session()->has('update-success'))
        <div class="alert alert-success">Новость успешно отредактирована</div>
    @endif

    <div>
        <h2>{{ $news->title }}</h2>
        <p>{{ $news->description }}</p>
        <a href="{{ route('news.edit', ['news' => $news]) }}" class="btn btn-primary">Редактировать новость</a>
        <br>
        <br>
        <form action="{{ route('news.destroy', ['news' => $news]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить новость</button>
        </form>
        <br>
    </div>
</div>
@endsection
