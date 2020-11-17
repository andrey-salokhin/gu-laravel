<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    public function getData():array {

        $faker = Factory::create('ru_RU');
        $data = [];
        for($i = 0; $i < 5; $i++){
            $title = $faker->word();
            $data[] = [
                'title' => $title,
                'slug' => Str::slug($title),
                'description' => $faker->realText(mt_rand(100, 200)),
                'created_at' => date('Y-m-d h:i:s', time()),
                'updated_at' => date('Y-m-d h:i:s', time()),
            ];
        }

        return $data;
    }
}
