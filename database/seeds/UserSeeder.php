<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => Hash::make('testtest')
        
        ]);
        $user->assignRole('student');
    }
}
