<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(User::where('email', 'admin@admin.se')->doesntExist()){
           User::create([
                'name' => 'Admin', 
                'email' => 'admin@admin.se', 
                'password' => Hash::make('password')]);
        }
    }
}
