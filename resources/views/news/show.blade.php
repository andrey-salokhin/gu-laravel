@extends('layouts.main')
@section('content')
<div>
        <div>
            <h2>{{ $news->title }}</h2>
            <p>{{ $news->description }}</p>
        </div>
</div>
@endsection
