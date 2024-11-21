<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Area;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Area>
 */
class AreaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition()
    {
        // uzbekistan regions
        $regionsOfUzbekistan = [
            'Andijan',
            'Bukhara',
            'Fergana',
            'Jizzakh',
            'Namangan',
            'Navoiy',
            'Qashqadaryo',
            'Samarqand',
            'Sirdaryo',
            'Surxondaryo',
            'Tashkent',
            'Xorazm',
            'Tashkent city',
            'Karakalpakstan'
        ];

       
        for($i = 0; $i < count($regionsOfUzbekistan); $i++){
            Area::create([
                'name' => $regionsOfUzbekistan[$i],
                'user_id' => 1
            ]);
        }
    }
}
