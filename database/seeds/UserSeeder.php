<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create(
            [
                'name' => 'Administrator',
                'email' => 'admin@admin.com',
                'password' => bcrypt('secret123'),
                'role' => -1,
            ]
        )->save();
    }
}
