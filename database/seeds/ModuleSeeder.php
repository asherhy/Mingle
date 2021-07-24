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
        DB::table('modules')->insert([
            [
                'code' => 'None',
                'title' => 'None',
                'code_title' => 'None'
            ]
        ]);
        foreach ($responses as $response)  {
            DB::table('modules')->insert([
                [
                    'code' => $response['moduleCode'],
                    'title' => $response['title'],
                    'code_title' => $response['moduleCode']." ".$response['title']
                ]
            ]);
         }

       
    }
}
