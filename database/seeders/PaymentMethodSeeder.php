<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert default payment methods
        DB::table('payment_methods')->insert([
            ['name' => 'Contraentrega', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
