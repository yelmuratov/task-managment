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
    protected static $regionsOfUzbekistan = [
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

    protected static $shuffledRegions = [];

    public function definition()
    {
        if (empty(self::$shuffledRegions)) {
            self::$shuffledRegions = self::$regionsOfUzbekistan;
            shuffle(self::$shuffledRegions);
        }

        $region = array_pop(self::$shuffledRegions);

        return [
            'name' => $region,
            'user_id' => 1
        ];
    }
}
