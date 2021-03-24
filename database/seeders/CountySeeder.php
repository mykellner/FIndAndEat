<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\County;

class CountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(County::where('name', 'Skåne')->doesntExist()){
            County::create([
                 'name' => 'Skåne', 
            ]);
        }
    }
    
}
