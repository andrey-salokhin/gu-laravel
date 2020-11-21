<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index () {

        $news = News::orderBy('id', 'desc')->paginate(5);
        return view('news.index', ['news' => $news]);
    }

    public function show ($id) {

        $news = News::where('id', $id)->first();
        return view('news.show', ['news' => $news]);

    }

    public function store(Request $request){

    }
}
