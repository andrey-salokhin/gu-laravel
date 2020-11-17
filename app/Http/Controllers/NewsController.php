<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index () {

        $obj = new News();
        return view('news.index', ['news' => $obj->getAllNews()]);
    }

    public function show ($id) {

        $obj = new News();
        return view('news.show', ['news' => $obj->getNewsById($id), 'id' => $id]);
    }
}
