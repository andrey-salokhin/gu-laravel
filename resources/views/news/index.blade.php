@extends('layouts.main')
@section('content')
                <div class="row">

                    <!-- Blog Entries Column -->
                    <div class="col-md-8">

                        @if(session()->has('remove-success'))
                            <div class="alert alert-success">Новость успешно удалена</div>
                        @endif

                        <h1 class="my-4">Список всех новостей:
                        </h1>

                            <a href="{{ route('news.create') }}" class="btn btn-primary">Добавить новость</a>
                            <br>
                            <br>

                        <!-- Blog Post -->
                        @foreach($news as $n)
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h2 class="card-title">{{  $n->title }}</h2>
                                    <p class="card-text">{{ $n->description }}</p>
                                    <a href="{{ route('news.show', ['id' => $n->id]) }}" class="btn btn-primary">Посмотреть новость</a>
                                    <a href="{{ route('news.edit', ['news' => $n]) }}" class="btn btn-primary">Редактировать новость</a>
                                    <br>
                                    <br>
                                    <form action="{{ route('news.destroy', ['news' => $n]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Удалить новость</button>
                                    </form>
                                </div>
                                <div class="card-footer text-muted">
                                    Posted on {{ $n->created_at }}
                                    <a href="#">{{ $n->author }}</a>
                                </div>
                            </div>
                        @endforeach
                        <div class="clearfix">
                            {{ $news->links() }}
                        </div>
                    </div>
                </div>
@endsection
