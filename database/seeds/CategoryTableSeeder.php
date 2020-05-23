<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'laptops',
            'slug'  => 'laptop',
            'details' => 'laptops',
         ]);
         Category::create([
            'name' => 'watches',
            'slug'  => 'watch',
            'details' => 'watches',
         ]);
         Category::create([
            'name' => 'mobiles',
            'slug'  => 'mobile',
            'details' => 'mobile phones ',
         ]);
         Category::create([
            'name' => 'tv',
            'slug'  => 'tv',
            'details' => 'tv',
         ]);
    }
}
