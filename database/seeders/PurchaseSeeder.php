<?php

namespace Database\Seeders;

use App\Models\Offering;
use App\Models\Purchase;
use Illuminate\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offerings = Offering::limit(5)->get();
        $seedData = [];
        foreach ($offerings as $index => $offering) {
            $seedData[] = [
                'customerName' => 'Test Name ' . $index,
                'offeringID' => $offering->id,
                'quantity' => random_int(0 , 2000)
            ];
        }
        Purchase::insert($seedData);
    }
}
