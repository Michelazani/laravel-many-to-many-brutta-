<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnlogySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        $technologies=[
            'HTML',
            'CSS',
            'JavaScript',
            'Vue',
            'PHP', 
            'Laravel'
        ];
        
        foreach ($technologies as $singleTechnology) {
            $newTechnology = new Technology();     
            $newTechnology -> technology = $singleTechnology;
            $newTechnology->save();

        }
    }
}
