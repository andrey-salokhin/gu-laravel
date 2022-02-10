<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\Models\News;
use App\Models\Parser;
use App\Services\ParserService;
use Illuminate\Support\Str;

class NewsParserController extends Controller
{
    protected $urls = [
        'https://news.yandex.ru/music.rss',
        'https://news.yandex.ru/auto.rss',
        'https://news.yandex.ru/army.rss',
        'https://news.yandex.ru/games.rss',
        'https://news.yandex.ru/movies.rss',
        'https://news.yandex.ru/cosmos.rss',
        'https://news.yandex.ru/health.rss'
    ];

    protected $parseRule = [
        'title' => [
            'uses' => 'channel.title'
        ],
        'link' => [
            'uses' => 'channel.link'
        ],
        'description' => [
            'uses' => 'channel.description'
        ],
        'image' => [
            'uses' => 'channel.image.url'
        ],
        'news' => [
            'uses' => 'channel.item[title,link,guid,description,pubDate]'
        ],
    ];

    public function index() {
        foreach ($this->urls as $url) {
            NewsParsing::dispatch(new ParserService($url, $this->parseRule));
        }

        return redirect()->back()->with('success', 'Задача добавлена в очередь!');
    }
}
