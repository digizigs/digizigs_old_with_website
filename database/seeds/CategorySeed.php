<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        
        Category::create(['id'=>0,'name' => 'Uncategorised','slug' => 'uncategorised']);
        Category::create(['name' => 'Posts','slug' => 'posts']);
        Category::create(['name' => 'Blog','slug' => 'blog']);

    }
}
