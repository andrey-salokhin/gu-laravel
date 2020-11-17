<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }


    public function getData():array {

        $faker = Factory::create('ru_RU');
        $data = [];
        for($i = 0; $i < 50; $i++){
            $title = $faker->sentence(5,10);
            $data[] = [
                'title' => $title,
                'slug' => Str::slug($title),
                'description' => $faker->realText(mt_rand(100, 200)),
                'status' => $faker->randomElement(['ждет публикации', 'опубликован', 'архивный']),
                'created_at' => date('Y-m-d h:i:s', time()),
                'updated_at' => date('Y-m-d h:i:s', time()),
            ];
        }

        return $data;
    }
}
