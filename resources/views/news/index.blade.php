@extends('layouts.main')
@section('content')
                <div class="row">

                    <!-- Blog Entries Column -->
                    <div class="col-md-8">

                        <h1 class="my-4">Список всех новостей:
                        </h1>

                        <!-- Blog Post -->
                        @foreach($news as $n)
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h2 class="card-title">{{  $n->title }}</h2>
                                    <p class="card-text">{{ $n->description }}</p>
                                    <a href="{{ route('news.show', ['id' => $n->id]) }}" class="btn btn-primary">Посмотреть новость</a>
                                </div>
                                <div class="card-footer text-muted">
                                    Posted on {{ $n->created_at }}
                                    <a href="#">{{ $n->author }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
@endsection
