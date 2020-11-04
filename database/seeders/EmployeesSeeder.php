<?php

namespace Database\Seeders;

use App\Models\Employees;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
            [
                'name' => 'Empleado 1',
                'email'=> 'tes1@tes1.com',
                'job'=> 'Desarrollador web',
                'birthdate'=> '1997-05-12',
                'address'=> 'Colonia de prueba',
                'city'=> 'Ciudad de prueba',
                'state'=> 'Estado de prueba',
                'latitude'=> 28.236478,
                'longitude'=> 80.288712,
            ],
            [
                'name' => 'Empleado 2',
                'email'=> 'tes2@tes2.com',
                'job'=> 'Limpieza',
                'birthdate'=> '1994-06-10',
                'address'=> 'Colonia de prueba 1',
                'city'=> 'Ciudad de prueba 1',
                'state'=> 'Estado de prueba 1',
                'latitude'=> 40.236478,
                'longitude'=> 90.288712,
            ],
            [
                'name' => 'Empleado 3',
                'email'=> 'tes3@tes3.com',
                'job'=> 'Promotor',
                'birthdate'=> '1994-07-10',
                'address'=> 'Colonia de prueba 2',
                'city'=> 'Ciudad de prueba 2',
                'state'=> 'Estado de prueba 2',
                'latitude'=> 50.236478,
                'longitude'=> 80.288712,
            ],
        ];

        foreach ($employees as $employee) {
            Employees::create($employee);
        }
    }
}
