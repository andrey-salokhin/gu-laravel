@extends('layouts.app')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session()->has('fail'))
        <div class="alert alert-success">{{ session('fail') }}</div>
    @endif
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Курсы серверных валют по состоянию на {{ $xchanges['LastUpdate'] }}</h2>
                <p class="card-text">
                    <table>
                    <tr>
                        <th>Название</th>
                        <th>Код</th>
                        <th>Номинал</th>
                        <th>Курс</th>
                    </tr>
                    @foreach($xchanges['Values'] as $x)
                        <tr>
                            <td>{{ $x['Name'] }}</td>
                            <td>{{ $x['CharCode'] }}</td>
                            <td>{{ $x['Nominal'] }}</td>
                            <td>{{ $x['Value'] }}</td>
                        </tr>
                    @endforeach
                </table>
                <a href="{{ route('exchange_rates.update_all')}}">Создать или обновить записи в базе данных</a>
                <a href="{{ route('exchange_rates.remove_all') }}">Удалить все записи</a>
                </div>
        </div>
        <h2 class="card-title">Курсы валют в базе данных</h2>
                <x-database_rates></x-database_rates>
@endsection
