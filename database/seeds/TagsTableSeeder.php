<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tags=['Back end', 'Front end', 'Design', 'UX', 'Laravel'];

        foreach ($tags as $tag) {
            
            //1 Istance
            $new_tag = new Tag();
            
    
            //2 population
            $new_tag-> name = $tag;
            $new_tag -> slug = Str::slug($tag, '-');
    
    
            //3 save
            $new_tag -> save();
        }
    }
}
