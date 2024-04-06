<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(storage_path('dishes.json'));
        $data = json_decode($json, true);

        foreach ($data['dishes'] as $dishData) {
            Dish::create([
                'name' => $dishData['name'],
                'restaurant' => $dishData['restaurant'],
                'availableMeals' => implode(', ', $dishData['availableMeals']),
            ]);
        }
    }
}
