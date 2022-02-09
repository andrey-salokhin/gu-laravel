<?php

namespace App\View\Components;

use App\Models\ExchangeRates;
use Illuminate\View\Component;

class DatabaseRates extends Component
{

    public $rates;

    public function __construct()
    {
        $rates = ExchangeRates::all();
        if($rates->count() > 0) {
            $this->rates = $rates;
        };
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.database_rates');
    }
}
