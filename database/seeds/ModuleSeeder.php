<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;


class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $responses = Http::get('https://api.nusmods.com/v2/2020-2021/moduleList.json')->json();
        foreach ($responses as $response)  {
            DB::table('roles')->insert([
                [
                    'moduleCode' => $response['moduleCode'],
                    'title' => $response['title']
                ]
            ]);
         }

       
    }
}
