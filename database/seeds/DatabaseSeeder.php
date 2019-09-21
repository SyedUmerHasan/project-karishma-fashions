<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('contacts')->insert([
                'contact_name' => $faker->name,
                'contact_city' => $faker->city,
                'contact_province' => $faker->city,
                'contact_number1' => $faker->randomDigit,
                'contact_number2' => $faker->randomDigit,
                'contact_address' => $faker->word,
            ]);
        }
    }
}
