<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i=1; $i < 11; $i++) { 
            DB::table('links')->insert([
                'username' => $faker->userName,
                'dest_link' => $faker->url,
                'wrapper_url' => $faker->url,
            ]);
        }
    }
}
