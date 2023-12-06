<?php

namespace Database\Seeders;
 
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'Username' => 'ilhar',
            'Password' => '12345678',
            'UserType' => '0',
            'Email' => 'ilhar@gmail.com',
            'ContactNo' => '0757123832',
            'Status' => '1',
        ]);

        DB::table('users')->insert([
            'Username' => 'ilharul',
            'Password' => '12345678',
            'UserType' => '0',
            'Email' => 'ilhar@gmail.com',
            'ContactNo' => '0757123832',
            'Status' => '1',
        ]);
    }
}
