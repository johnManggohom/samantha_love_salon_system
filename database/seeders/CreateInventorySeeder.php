<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateInventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run()
    {
        Inventory::create([
            'name' => 'rebond set',
            'quantity' => 1,
        ]);
             Inventory::create([
            'name' => 'hair color',
            'quantity' => 1,
        ]);
                Inventory::create([
            'name' => 'cuticle',
            'quantity' => 1,
        ]);

    


    }
}
