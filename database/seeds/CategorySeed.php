<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create(
            [
                'name' => 'Uncategorised',
                'slug' => 'uncategorised'         
            ]
        );
    }
}
