@extends('layouts.main')
@section('content')
            @if($category_slug == NULL)
                <div class="row">

                    <!-- Blog Entries Column -->
                    <div class="col-md-8">

                        <h1 class="my-4">Список всех новостей:
                        </h1>

                        <!-- Blog Post -->
                        @foreach($news as $n)
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h2 class="card-title">{{  $n['name'] }}</h2>
                                    <p class="card-text">{{ $n['description'] }}</p>
                                    <p class="card-text">Категория новости: {{ $n['category_slug'] }}</p>
                                    <a href="{{ route('news.show', ['category_slug' => $n['category_slug'], 'id' => $n['id']]) }}" class="btn btn-primary">Посмотреть новость</a>
                                </div>
                                <div class="card-footer text-muted">
                                    Posted on January 1, 2020 by
                                    <a href="#">Admin</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="row">

                    <!-- Blog Entries Column -->
                    <div class="col-md-8">

                        <h1 class="my-4">Список новостей категории {{ $category_slug }}
                        </h1>

                        <!-- Blog Post -->
                        @foreach($news as $n)
                            @if($n['category_slug'] == $category_slug)
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h2 class="card-title">{{  $n['name'] }}</h2>
                                    <p class="card-text">{{ $n['description'] }}</p>
                                    <p class="card-text">Категория новости: {{ $n['category_slug'] }}</p>
                                    <a href="{{ route('news.show', ['category_slug' => $n['category_slug'], 'id' => $n['id']]) }}" class="btn btn-primary">Посмотреть новость</a>
                                </div>
                                <div class="card-footer text-muted">
                                    Posted on January 1, 2020 by
                                    <a href="#">Admin</a>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
@endsection
