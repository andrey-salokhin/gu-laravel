<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'title', 'description', 'slug'
    ];

    public function news()
    {
        return $this->belongsToMany(News::class, 'category_news', 'category_id',
            'news_id');
    }
}
