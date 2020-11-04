<?php

namespace Database\Seeders;

use App\Models\Skills;
use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            [
                'name' => 'Trabajador',
                'qualification' => 4,
                'employees_id' => 1,
            ],
            [
                'name' => 'Entusiasta',
                'qualification' => 5,
                'employees_id' => 1,
            ],
            [
                'name' => 'Buena actitud',
                'qualification' => 3,
                'employees_id' => 1,
            ],
            [
                'name' => 'Respetuoso',
                'qualification' => 5,
                'employees_id' => 2,
            ],
            [
                'name' => 'Agil',
                'qualification' => 4,
                'employees_id' => 3,
            ],
            [
                'name' => 'Vendedor',
                'qualification' => 5,
                'employees_id' => 3,
            ],
            [
                'name' => 'Trabajador',
                'qualification' => 4,
                'employees_id' => 3,
            ],
        ];

        foreach ($skills as $skill) {
            Skills::create($skill);
        }
    }
}
