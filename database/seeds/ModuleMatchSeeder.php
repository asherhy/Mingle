<?php

use App\ModuleMatch;
use Illuminate\Database\Seeder;

class ModuleMatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [];
        ModuleMatch::create([
            'match_data' => $array
        ]);
    }
}
