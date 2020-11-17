<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'categories';

    public function getAllCategories(){
        return DB::table($this->table)->get();
    }

    public function getNewsByCategoryId($category_id){
        $news = [];
        $categoryNewsData = DB::table('category_news')->where(['category_id' => $category_id])->get();
        foreach ($categoryNewsData as $cnd){
            $news[] = DB::table('news')->where(['id' => $cnd->news_id])->first();
        }

        return $news;
    }
}
