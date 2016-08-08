<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Add product
        DB::table('products')->insert([
            'name' => 'Purple widget',
            'description' => 'A purple widget',
            'price' => 5.99,
            'attributes' => json_encode([
                'colour' => 'purple',
                'size' => 'Small'
            ]),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
