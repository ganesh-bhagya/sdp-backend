<?php

namespace Database\Seeders;
 
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('institutions')->insert([
            'InstutionName' => 'Forest',
            'Email' => 'forest@mail.com',
            'ContactNo' => '0769605261',
        ]);

        DB::table('institutions')->insert([
            'InstutionName' => 'Wild Life',
            'Email' => 'wildlife@mail.com',
            'ContactNo' => '0757123832',
        ]);
    }
}
