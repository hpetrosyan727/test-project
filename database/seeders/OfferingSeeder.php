<?php

namespace Database\Seeders;

use App\Models\Offering;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OfferingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedData = [
            [
                'title' => 'Test Offeting' . Str::random(5),
                'price' => random_int(0 , 2000),
            ],
            [
                'title' => 'Test Offeting' . Str::random(5),
                'price' => random_int(0 , 2000),
            ],
            [
                'title' => 'Test Offeting' . Str::random(5),
                'price' => random_int(0 , 2000),
            ],
            [
                'title' => 'Test Offeting' . Str::random(5),
                'price' => random_int(0 , 2000),
            ],
            [
                'title' => 'Test Offeting' . Str::random(5),
                'price' => random_int(0 , 2000),
            ]
        ];

        Offering::insert($seedData);
    }
}
