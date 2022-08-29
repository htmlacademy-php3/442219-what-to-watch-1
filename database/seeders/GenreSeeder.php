<?php

namespace Database\Seeders;

use App\Models\Genre;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genreTypes = [
            'триллер',
            'мелодрама',
            'боевик',
            'драма',
            'ужасы',
            'вестерн',
            'приключение',
            'фантастика',
        ];

        $faker = Factory::create();

        foreach($genreTypes as $genreType) {

            DB::table('genres')->insert([
                'title' => $genreType,
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
