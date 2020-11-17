<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index () {

        $obj = new Category();
        return view('categories.index', ['categories' => $obj->getAllCategories()]);
    }

    public function show ($id){

        $obj = new Category();
        return view('categories.show', ['categories' => $obj->getNewsByCategoryId($id), 'id' => $id]);
    }
}
