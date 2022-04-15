<?php
use App\About;
use Illuminate\Database\Seeder;

class AboutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     \App\Tempodegreechain::factory()->count(5)->create();
    // }
    public function run()
    {
//\App\Tempodegreechain::factory()->count(5)->create();

        $abouts = [
            
            
    
        ];

        About::insert($abouts);
    }
}
