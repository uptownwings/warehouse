<?php declare(strict_types=1);

use Illuminate\Database\Seeder;

class PriceHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\PriceHistory::class, 5000)->create()->each(function ($price) {
            $price->save();
        });
    }
}
