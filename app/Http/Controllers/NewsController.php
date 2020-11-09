<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index ($category_slug = NULL) {
        return view('news.index', ['news' => $this->news, 'category_slug' => $category_slug]);
    }

    public function show ($category_slug = NULL, $id) {
        return view('news.show', ['news' => $this->news, 'id' => $id]);
    }
}
