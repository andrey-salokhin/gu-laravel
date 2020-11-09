@extends('layouts.main')
@section('content')
<div>
    @foreach($news as $n)
        @if($id == $n['id'])
            <div>
                <h2>{{ $n['name'] }}</h2>
                <p>{{ $n['description'] }}</p>
                <p>{{ $n['category_slug'] }}</p>
            </div>
        @endif
    @endforeach
</div>
@endsection
