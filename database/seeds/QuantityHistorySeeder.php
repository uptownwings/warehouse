<?php declare(strict_types=1);

use Illuminate\Database\Seeder;

class QuantityHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\QuantityHistory::class, 2000)->create()->each(function ($quantity) {
            $quantity->save();
        });
    }
}
