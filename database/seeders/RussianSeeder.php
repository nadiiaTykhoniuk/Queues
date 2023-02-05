<?php

namespace Database\Seeders;

use App\Models\Russian;
use Illuminate\Database\Seeder;

class RussianSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<=20; $i++) {
            Russian::create();
        }
    }
}
