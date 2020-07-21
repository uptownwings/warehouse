<?php

use Illuminate\Database\Seeder;

class WarehouseItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\WarehouseItem::class, 100)->create()->each(function ($item) {
            $item->save();
        });
    }
}
