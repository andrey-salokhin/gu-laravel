<?php

namespace App\Services;
use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;


class ParserService
{

    protected $url;
    protected $parseRule;

    public function __construct(string $url, array $parseRule)
    {
        $this->url = $url;
        $this->parseRule = $parseRule;
    }

    protected function load()
    {
        return XmlParser::load($this->url);
    }

    public function getData() {

        $load = $this->load();

        return $load->parse($this->parseRule);
    }

    public function saveDataAsFile($data) {
        $json = json_encode($data);
        Storage::disk('local')->put($this->url . ".txt", $json);;
    }

    public function saveOrUpdateDataToDatabase($model, Array $condition, Array $dataToUpdate) {
        $model::updateOrCreate($condition, $dataToUpdate);
    }
}
