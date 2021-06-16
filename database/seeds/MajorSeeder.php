<?php

use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('majors')->insert([
            [
                'name' => 'Data Science and Economics'
            ], [
                'name' => 'Food Science and Technology'
            ], [
                'name' => 'Humanities and Sciences'
            ], [
                'name' => 'Pharmaceutical Science'
            ], [
                'name' => 'Philosophy, Politics and Economics'
            ], [
                'name' => 'Business Administration (Accountancy)'
            ], [
                'name' => 'Business Administration'
            ], [
                'name' => 'Business Analytics'
            ], [
                'name' => 'Computer Science'
            ], [
                'name' => 'Information Security'
            ], [
                'name' => 'Information Systems'
            ], [
                'name' => 'Computer Engineering'
            ], [
                'name' => 'Dentistry'
            ], [
                'name' => 'Architecture'
            ], [
                'name' => 'Industrial Design'
            ], [
                'name' => 'Landscape Architecture'
            ], [
                'name' => 'Project & Facilities Management'
            ], [
                'name' => 'Real Estate'
            ], [
                'name' => 'Biomedical Engineering'
            ], [
                'name' => 'Chemical Engineering'
            ], [
                'name' => 'Civil Engineering'
            ], [
                'name' => 'Environmental Engineering'
            ], [
                'name' => 'Electrical Engineering'
            ], [
                'name' => 'Industrial and Systems Engineering'
            ], [
                'name' => 'Material Science & Engineering'
            ], [
                'name' => 'Mechanical Engineering'
            ], [
                'name' => 'Computer Engineering'
            ], [
                'name' => 'Undergraduate Law Programme'
            ], [
                'name' => 'Medicine'
            ], [
                'name' => 'Nursing'
            ], [
                'name' => 'Pharmacy'
            ], [
                'name' => 'Music'
            ]
        ]);
    }
}
