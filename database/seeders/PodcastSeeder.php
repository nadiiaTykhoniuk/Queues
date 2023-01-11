<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PodcastSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('podcasts')->insert([
            [
                'name' => 'Impactive: campaign management software, an app for volunteers and communities'
            ],
            [
                'name' => 'David Siegel on how good decision-making drives success to digital product'
            ],
            [
                'name' => "Etgar Shpivak: Use customer's pain to build an effective product strategy"
            ],
            [
                'name' => 'Navot Volk: From launch to sustained business | Building Digital Product'
            ],
            [
                'name' => 'WordPress VS custom Website: How to scale from WP to custom software | Building Digital Product'
            ],
            [
                'name' => 'What is a QA engineer and how they help to save money | Building Digital Product'
            ],
            [
                'name' => 'Product ownership: how not to lose intellectual software property rights | Building Digital Product'
            ],
            [
                'name' => 'Business Analysis of New Product Development | Building Digital Product'
            ],
            [
                'name' => 'Digital product creation: what we learned after 100 digital projects | Building Digital Products'
            ],
            [
                'name' => 'How Apps Make Money: 8 Proven Strategies | Building Digital Product'
            ]
        ]);
    }
}
