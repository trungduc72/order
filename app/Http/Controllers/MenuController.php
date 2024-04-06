<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class MenuController extends Controller
{
    public function handle(Request $request) {
        $data = $request->all();
        $dishes = Dish::all();
        
        $arr = [];
        foreach ($dishes as $dish) {
            $mealsArray = explode(', ', $dish['availableMeals']);
            
            if (in_array($data['data'][0], $mealsArray)) {
                $restaurantLower = str_replace(' ', '', strtolower($dish['restaurant']));

                if ($data['data'][1] == $restaurantLower) {
                    array_push($arr, $dish);
                }
            }
        }

        return response()->json(['message' => 'Success', 'dishes' => $arr]);
    }
}
