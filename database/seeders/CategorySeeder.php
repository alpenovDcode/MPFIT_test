<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'легкий'],
            ['name' => 'хрупкий'],
            ['name' => 'тяжелый'],
        ];
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
} 