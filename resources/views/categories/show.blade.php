@extends('layouts.main')
@section('content')
    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">Список категорий:
            </h1>

            <!-- Blog Post -->
            @foreach($newsList as $news)
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">{{ $news->title }}</h2>
                        <p class="card-text">{{ $news->description }}</p>
                        <a href="{{ route('news.show', ['id' => $news->id]) }}" class="btn btn-primary">Посмотреть новость</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

