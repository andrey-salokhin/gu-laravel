@extends('layouts.main')
@section('content')
<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <h1 class="my-4">Список категорий:
        </h1>

        <!-- Blog Post -->
        @foreach($categories as $c)
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title">{{ $c->title }}</h2>
                    <p class="card-text">{{ $c->description }}</p>
                    <a href="{{ route('categories.show', ['id' => $c->id]) }}" class="btn btn-primary">Посмотреть новости &rarr;</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
