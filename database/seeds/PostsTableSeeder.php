<?php

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for($i = 0; $i < 10; $i++){

            $new_post = new Post();

            $new_post->title = 'slug';
            $new_post->content = $faker->text;
            $new_post->slug = Post::makeSlug($new_post->title);
            dump($new_post);

            $new_post->save();
        }
    }
}
