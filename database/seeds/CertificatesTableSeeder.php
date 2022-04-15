<?php

use Illuminate\Database\Seeder;

class certificatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\certificate::factory()->count(10)->create();
    }
}
