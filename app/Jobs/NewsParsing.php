<?php

namespace App\Jobs;

use App\Models\News;
use App\Services\ParserService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class NewsParsing implements ShouldQueue
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
        foreach ($data['news'] as $d) {
            $conditionData = [
                'title' => $d['title']
            ];
            $preparedData =[
                'description' => $d['description'],
                'author' => 'Yandex News' . $d['link'],
                'slug' => Str::slug($d['title'])
            ];
            $this->parser->saveOrUpdateDataToDatabase(new News(), $conditionData, $preparedData);
        }
    }
}
