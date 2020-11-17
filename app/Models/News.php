<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getAllNews(){
        return DB::table($this->table)->get();
    }

    public function getNewsById($id){
        return DB::table($this->table)->where(['id' => $id])->first();
    }

}
