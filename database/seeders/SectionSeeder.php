<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Section::count() == 0){
            \App\Models\Section::factory(30)->create();
        }
    }
}
