@extends('layouts.app')
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session()->has('fail'))
        <div class="alert alert-success">{{ session('fail') }}</div>
    @endif
    <div style="display: flex; justify-content: center;">
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

                </div>
        </div>
                <x-database_rates></x-database_rates>
    </div>
    <div style="display: flex; justify-content: center;">
        <a class="btn btn-primary" style="margin-right: 15px;" href="{{ route('admin.parser.rates') }}">Обновить записи в базе данных</a>
        <a class="btn btn-danger" href="{{ route('exchange_rates.remove_all') }}">Удалить все записи</a>
    </div>

@endsection
