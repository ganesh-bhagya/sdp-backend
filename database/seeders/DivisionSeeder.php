<?php

namespace Database\Seeders;
 
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('divisions')->insert([
            'DivisionName' => 'Forest',
            'Location' => 'Colombo',
            'ContactNo' => '0769605261',
        ]);

        DB::table('divisions')->insert([
            'DivisionName' => 'Wild Life',
            'Location' => 'Colombo',
            'ContactNo' => '0757123832',
        ]);
    }
}
