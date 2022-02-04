@extends('layouts.main')
@section('content')
<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

        @if(session()->has('update-success'))
            <div class="alert alert-success">Категория успешно отредактирована</div>
        @endif
        @if(session()->has('remove-success'))
            <div class="alert alert-success">Категория успешно удалена</div>
        @endif

        <h1 class="my-4">Список категорий:
        </h1>
            @auth
                @if(\Illuminate\Support\Facades\Auth::user()->is_admin === true)
                    <a href="{{ route('categories.create') }}" class="btn btn-primary">Добавить категорию</a>
                @endif
            @endauth
            <br>
            <br>
        <!-- Blog Post -->
        @foreach($categories as $c)
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title">{{ $c->title }}</h2>
                    <p class="card-text">{{ $c->description }}</p>

                    <a href="{{ route('categories.show', ['id' => $c->id]) }}" class="btn btn-primary">Посмотреть новости &rarr;</a>
                    <br><br>
                    @auth
                        @if(\Illuminate\Support\Facades\Auth::user()->is_admin === true)
                            <a href="{{ route('categories.edit', ['category' => $c]) }}" class="btn btn-primary">Редактировать</a>
                            <br><br>
                            <form action="{{ route('categories.destroy', ['category' => $c]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
