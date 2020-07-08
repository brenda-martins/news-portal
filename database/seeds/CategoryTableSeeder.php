<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Politica', 'is_active' => 1],
            ['name' => 'Economia',  'is_active' => 1],
            ['name' => 'Artes',  'is_active' => 1],
            ['name' => 'Opnião',  'is_active' => 1]
        ];

        foreach ($categories as $key => $value) {
            Category::create($value);
        }
    }
}
