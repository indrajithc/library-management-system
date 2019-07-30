<?php

use Illuminate\Database\Seeder;
use App\User; 
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        

        User::create([
            'name'  =>  'admin',
            'type' => 'admin',
            'email' =>  'admin@lms.com',
            'password'  =>  Hash::make('password'),
        ]);

        
    }
}
