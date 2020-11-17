<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_news')->insert($this->getData());
    }

    public function getData():array {
        $faker = Factory::create('ru_RU');
        $data = [];
        $counter = 0;
        $index = 0;

        $categories = DB::table('categories')->get();
        $news = DB::table('news')->get();
        foreach ($news as $n){
            $data[] = [
                'category_id' => $categories[$index]->id,
                'news_id' => $n->id,
            ];

            $counter++;

            if($counter == 5 && $index<count($categories)-1){
                $index++;
                $counter=0;
            }
        }

        return $data;
    }
}
