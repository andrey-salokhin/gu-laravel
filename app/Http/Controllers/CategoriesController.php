<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use function React\Promise\all;

class CategoriesController extends Controller
{
    public function index () {

        $categoreis = Category::all();
        return view('categories.index', ['categories' => $categoreis]);

    }

    public function show ($id){

        $category = Category::find($id);

        $newsList = $category->news()->get();
        return view('categories.show', ['newsList' => $newsList]);
    }
}
