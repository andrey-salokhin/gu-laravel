<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\RatesParsing;
use App\Services\ParserService;
use Illuminate\Http\Request;

class RatesParserController extends Controller
{
    protected $urls = [
        'https://www.cbr-xml-daily.ru/daily.xml'
    ];

    protected $parseRule = [
        'Values' => ['uses' => 'Valute[NumCode,CharCode,Nominal,Name,Value]'],
        'LastUpdate' => ['uses' => '::Date']
    ];

    public function index() {
        foreach ($this->urls as $url) {
            RatesParsing::dispatch(new ParserService($url, $this->parseRule));
        }
        return redirect()->route('exchange_rates.index')->with('success', 'Задача добавлена в очередь!');
    }
}
