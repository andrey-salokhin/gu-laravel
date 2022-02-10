@extends('layouts.main')
@section('content')
    <div class="col-8 offset-2" >

        @if(session()->has('success'))
            <div class="alert alert-success">Новость успешно добавлена</div>
        @elseif(session()->has('fail'))
            <div class="alert alert-danger">Не удалось добавить новость</div>
        @endif
        <h1>Добавить новость на сайт</h1>
        <br>
        <form method="post" action="{{ route('news.store') }}" enctype="multipart/form-data">
            @csrf
            <label for="title" class="col-form-label">Заголовок</label>
            <input id = "title" type="text" name="title" value="{{ old('title') }}" class="form-control">
            @error('title') <div class="alert alert-danger">
                @foreach($errors->get('title') as $error)
                    {{ $error }}
                @endforeach
            </div>
            @enderror
            <br>
            <label for="image" class="col-form-label">Изображение</label>
            <input id="image" type="file" name="image" value="" class="form-control">
            <br>
            <label for="description" class="col-form-label">Описание новости</label>
            <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
            @error('description') <div class="alert alert-danger">
                @foreach($errors->get('description') as $error)
                    {{ $error }}
                @endforeach
            </div>
            @enderror
            <br>
            <label for="author" class="col-form-label">Ваше имя</label>
            <input id="author" type="text" name="author" value="{{ old('author') }}" class="form-control">
            @error('author') <div class="alert alert-danger">
                @foreach($errors->get('author') as $error)
                    {{ $error }}
                @endforeach
            </div>
            @enderror
            <br>
            <br>
            <input type="submit" value="Отправить" class="btn-success">
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

