<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name'=>'DEPORTES',
            'slug'=>'deportes'
        ]);
        Category::create([
            'name'=>'ACTUALIDAD',
            'slug'=>'actualidad'
        ]);
        Category::create([
            'name'=>'FARANDULA',
            'slug'=>'farandula'
        ]);
        Category::create([
            'name'=>'POLITICA',
            'slug'=>'politica'
        ]);
    }
}
