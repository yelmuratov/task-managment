<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

        foreach ($regionsOfUzbekistan as $region) {
            Area::factory()->create([
                'name' => $region,
                'user_id' => 1
            ]);
        }
    }
}
