<?php

namespace App\Jobs;

use App\Models\ExchangeRates;
use App\Services\ParserService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RatesParsing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $parser;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ParserService $parser)
    {
        $this->parser = $parser;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data = $this->parser->getData();
        foreach ($data['Values'] as $d) {
            $conditionData = [
                'name' => $d['Name']
            ];
            $preparedData = [
                'charcode' => $d['CharCode'],
                'nominal' => $d['Nominal'],
                'value' => floatval($d['Value']),
            ];
            $this->parser->saveOrUpdateDataToDatabase(new ExchangeRates(), $conditionData, $preparedData);
        }
    }
}

