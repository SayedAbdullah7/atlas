<?php

namespace Database\Seeders;

use App\Models\Area;
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
        if (Category::count() == 0){
            \App\Models\Category::factory(30)->create();
        }
    }
}
