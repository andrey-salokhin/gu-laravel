@extends('layouts.main')
@section('content')
    <div class="col-8 offset-2" >

        <h1>Изменить новость</h1>
        <br>
        <form method="post" action="{{ route('news.update', ['news' => $news]) }}">
            @method('PUT')
            @csrf
            <label for="title" class="col-form-label">Заголовок</label>
            <input id = "title" type="text" name="title" value="{{ $news->title }}" class="form-control">
            <br>
            @error('title') <div class="alert alert-danger">
                @foreach($errors->get('title') as $error)
                    {{ $error }}
                @endforeach
            </div>
            @enderror

            @if($news->image)
                <p>Текущее изображение </p>
                <img src="{{ Storage::disk('uploads')->url($news->image) }}" style="width: 200px">
                <p>Если хотите поменять изображение, вставьте новое в поле ниже</p>
            @else()
                <p>Изображение отсутсвует </p>
            @endif
            <label for="image" class="col-form-label">Изображение</label>
            <input id="image" type="file" name="image" class="form-control">
            <label for="description" class="col-form-label">Описание новости</label>
            <textarea id="editor" name="description" class="form-control">{{ $news->description }}</textarea>
            @error('description') <div class="alert alert-danger">
                @foreach($errors->get('description') as $error)
                    {{ $error }}
                @endforeach
            </div>
            @enderror
            <br>
            <label for="author" class="col-form-label">Ваше имя</label>
            <input id="author" type="text" name="author" value="{{ $news->author }}" class="form-control">
            @error('author') <div class="alert alert-danger">
                @foreach($errors->get('author') as $error)
                    {{ $error }}
                @endforeach
            </div>
            @enderror
            <br>
            <br>
            <input type="submit" value="Изменить" class="btn-success">
        </form>
    </div>
    <br>
    @push('scripts')
        <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
        <script>
            var route_prefix = "/filemanager";
        </script>
        <script>
            $('textarea[name=description]').ckeditor({
                height: 100,
                filebrowserImageBrowseUrl: route_prefix + '?type=Images',
                filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
                filebrowserBrowseUrl: route_prefix + '?type=Files',
                filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
            });
        </script>
    @endpush
@endsection
