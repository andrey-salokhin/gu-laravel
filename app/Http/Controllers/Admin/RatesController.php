<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExchangeRates;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class RatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $load = XMLParser::load('https://www.cbr-xml-daily.ru/daily.xml');
        $result = $load->parse([
            'Values' => ['uses' => 'Valute[NumCode,CharCode,Nominal,Name,Value]'],
            'LastUpdate' => ['uses' => '::Date']
        ]);
        return view('admin.exchange_rates.index', ['xchanges' => $result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExchangeRates  $exchangeRates
     * @return \Illuminate\Http\Response
     */
    public function show(ExchangeRates $exchangeRates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExchangeRates  $exchangeRates
     * @return \Illuminate\Http\Response
     */
    public function edit(ExchangeRates $exchangeRates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExchangeRates  $exchangeRates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExchangeRates $exchangeRates)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExchangeRates  $exchangeRates
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExchangeRates $exchangeRates)
    {
        //
    }

    public function removeAll() {
        $truncate = ExchangeRates::truncate();
        if($truncate) {
            return redirect()->route('exchange_rates.index')->with('success', 'Записи удалены');
        } else {
            return redirect()->route('exchange_rates.index')->with('fail', 'Не удалось удалить записи');
        }
    }
}
