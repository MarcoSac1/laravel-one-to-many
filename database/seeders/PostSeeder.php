<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Post;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //
        for ($i=0; $i < 250 ; $i++) {
            $newPost = new Post();

            $newPost -> title =$faker ->realText(40);
            $newPost -> author =$faker ->name(40);
            $newPost -> content =$faker ->realText(600);
            $newPost -> creation_date =$faker ->dateTimeThisMonth();
            $newPost -> image_url =$faker ->imageUrl(400,250, 'posts');
            $newPost -> save();
        }
    }
}
