<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::create([
            'name' => 'Matematika',

        ]);
        
        Subject::create([
            'name' => 'Fizika',

        ]);
        
        Subject::create([
            'name' => 'Programming',

        ]);
        
        Subject::create([
            'name' => 'Illustrator',
  
        ]);
        
        Subject::create([
            'name' => 'Python',
      
        ]);
    }
}
