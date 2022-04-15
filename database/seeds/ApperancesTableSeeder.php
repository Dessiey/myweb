<?php
use App\Slide;
use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
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

        $slides = [
            [
           
                'name'           => 'B.Sc. in Computer Science (Regular (N))',
                'degreetype'     =>'BSc.',
                'amdegreetype'   =>'ቢ.ኤስ.ሲ',
                'amname'         =>'ኮምፒውተር ሳይንስ ቢ.ኤስ.ሲ',
                'college'        => 'Jimma Institiute of Technology',
                'faculty'        => 'Computing and Informatics',
                'phone'          => '0482212504',
                'created_at'     => '2020-09-19 12:08:28',
                'updated_at'     => '2020-09-19 12:08:28',
            ],
            [
                
                'name'           => 'B.Sc. in Software Engineering (Regular (N))',
                'degreetype'     =>'BSc.',
                'amdegreetype'   =>'ቢ.ኤስ.ሲ',
                'amname'         =>'ሶፍትዌር ኢንጂነሪንግ ቢ.ኤስ.ሲ', 
                'college'        => 'Jimma Institiute of Technology',
                'faculty'        => 'Computing and Informatics',
                'phone'          => '0482212504',
                'created_at'     => '2021-04-19 12:08:28',
                'updated_at'     => '2021-04-19 12:08:28',
            ],
            [
                
                'name'           => 'B.Sc. Information Technology (Regular (N))',
                'degreetype'     =>'BSc.',
                'amdegreetype'     =>'ቢ.ኤስ.ሲ',
                'amname'            =>'ኢንፎርሜሽን ቴክኖሎጂ ቢ.ኤስ.ሲ',
                'college'        => 'Jimma Institiute of Technology',
                'faculty'        => 'Computing and Informatics',
                'phone'          => '0482212504',
                'created_at'     => '2021-04-19 12:08:28',
                'updated_at'     => '2021-04-19 12:08:28',
            ],
            [
                
                'name'           => 'B.Sc. Information Science (Regular (N))',
                'degreetype'     =>'BSc.',
                'amdegreetype'     =>'ቢ.ኤስ.ሲ',
                'amname'            =>'ኢንፎርሜሽን ሳይንስ ቢ.ኤስ.ሲ',
                'college'        => 'Jimma Institiute of Technology',
                'faculty'        => 'Computing and Informatics',
                'phone'          => '0482212504',
                'created_at'     => '2021-04-19 12:08:28',
                'updated_at'     => '2021-04-19 12:08:28',
            
            ],
            
    
        ];

        Slide::insert($slides);
    }
}
