<div class="card mb-4">
    <div class="card-body">
        @if($rates)
            <h2 class="card-title">Курсы валют по состоянию на {{ $rates[0]->updated_at->format('d.m.Y') }}</h2>
            <p class="card-text">
            <table>
                <tr>
                    <th>Название</th>
                    <th>Код</th>
                    <th>Номинал</th>
                    <th>Курс</th>
                </tr>
                @foreach($rates as $r)
                    <tr>
                        <td>{{ $r->name }}</td>
                        <td>{{ $r->charcode }}</td>
                        <td>{{ $r->nominal }}</td>
                        <td>{{ $r->value }}</td>
                    </tr>
                @endforeach
            </table>
        @else
            <h2>Курсы валют не обновлены</h2>
        @endif
    </div>
</div>
