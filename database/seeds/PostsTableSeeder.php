<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use League\CommonMark\Block\Element\Paragraph;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for ($i=0; $i < 80; $i++) { 
            //1 istanza post
            $new_post = new Post();
            //2 popoliamo db
            $new_post->title = $faker->text(100);
            $new_post->slug = Str::slug($new_post->title, '-');
            $new_post->content = $faker->paragraphs(2, true);
            $new_post->author = '';

            //3 save
            $new_post->save();
        }   


        
    }
}
