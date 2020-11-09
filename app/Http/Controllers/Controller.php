<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected $categories = [
        [
            'id' => 1,
            'slug' => 'one',
            'name' => 'Категория 1',
            'description' => 'Описание категории 1'
        ],

        [
            'id' => 2,
            'slug' => 'two',
            'name' => 'Категория 2',
            'description' => 'Описание категории 2'
        ],

        [
            'id' => 3,
            'slug' => 'three',
            'name' => 'Категория 3',
            'description' => 'Описание категории 3'
        ],

        [
            'id' => 4,
            'slug' => 'four',
            'name' => 'Категория 4',
            'description' => 'Описание категории 4'
        ],

        [
            'id' => 5,
            'slug' => 'five',
            'name' => 'Категория 5',
            'description' => 'Описание категории5'
        ]
    ];

    protected $news = [
        [
            'id' => 1,
            'category_slug' => 'one',
            'name' => 'Название новости 1',
            'description' => 'Описание новости 1'
        ],

        [
            'id' => 2,
            'category_slug' => 'one',
            'name' => 'Название новости 2',
            'description' => 'Описание новости 2'
        ],

        [
            'id' => 3,
            'category_slug' => 'one',
            'name' => 'Название новости 3',
            'description' => 'Описание новости 3'
        ],

        [
            'id' => 4,
            'category_slug' => 'one',
            'name' => 'Название новости 4',
            'description' => 'Описание новости 4'
        ],

        [
            'id' => 5,
            'category_slug' => 'two',
            'name' => 'Название новости 1',
            'description' => 'Описание новости 1'
        ],

        [
            'id' => 6,
            'category_slug' => 'two',
            'name' => 'Название новости 2',
            'description' => 'Описание новости 2'
        ],

        [
            'id' => 7,
            'category_slug' => 'two',
            'name' => 'Название новости 3',
            'description' => 'Описание новости 3'
        ],

        [
            'id' => 8,
            'category_slug' => 'two',
            'name' => 'Название новости 4',
            'description' => 'Описание новости 4'
        ],

        [
            'id' => 9,
            'category_slug' => 'three',
            'name' => 'Название новости 1',
            'description' => 'Описание новости 1'
        ],

        [
            'id' => 10,
            'category_slug' => 'three',
            'name' => 'Название новости 2',
            'description' => 'Описание новости 2'
        ],

        [
            'id' => 11,
            'category_slug' => 'three',
            'name' => 'Название новости 3',
            'description' => 'Описание новости 3'
        ],

        [
            'id' => 12,
            'category_slug' => 'three',
            'name' => 'Название новости 4',
            'description' => 'Описание новости 4'
        ],

        [
            'id' => 13,
            'category_slug' => 'four',
            'name' => 'Название новости 1',
            'description' => 'Описание новости 1'
        ],

        [
            'id' => 14,
            'category_slug' => 'four',
            'name' => 'Название новости 2',
            'description' => 'Описание новости 2'
        ],

        [
            'id' => 15,
            'category_slug' => 'four',
            'name' => 'Название новости 3',
            'description' => 'Описание новости 3'
        ],

        [
            'id' => 16,
            'category_slug' => 'four',
            'name' => 'Название новости 4',
            'description' => 'Описание новости 4'
        ],

        [
            'id' => 17,
            'category_slug' => 'five',
            'name' => 'Название новости 1',
            'description' => 'Описание новости 1'
        ],

        [
            'id' => 18,
            'category_slug' => 'five',
            'name' => 'Название новости 2',
            'description' => 'Описание новости 2'
        ],

        [
            'id' => 19,
            'category_slug' => 'five',
            'name' => 'Название новости 3',
            'description' => 'Описание новости 3'
        ],

        [
            'id' => 20,
            'category_slug' => 'five',
            'name' => 'Название новости 4',
            'description' => 'Описание новости 4'
        ],
    ];

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
