<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use App\Models\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    protected $employee;
    protected $skill;

    public function __construct(Employees $employee,Skills $skill){
        $this->employee = $employee;
        $this->skill = $skill;
    }

    public function index(){
        return $this->employee->with('skills:id,name,qualification,employees_id')->paginate(10);
    }

    public function create(Request $request){
        try {
            DB::beginTransaction();

            request()->validate([
                'name' => 'required|max:120',
                'email' => 'required|unique:employees',
                'job' => 'required|max:150',
                'birthdate' => 'required|date',
                'address' => 'required|max:150',
                'city' => 'required|max:150',
                'state' => 'required|max:150',
                'latitude' => 'required',
                'longitude' => 'required',
            ],
            [
                '*.required' => 'Este campo es requerido!',
                '*.max' => 'Supera el número de caracteres aceptados!',
                '*.date' => 'No tiene un formato de fecha!',
                'email.unique' => 'El correo ya existe!',
            ]);

            $employye = $this->employee->createEmployee($request);

            if($request->skills){
                foreach ($request->skills as $skill) {
                    $this->skill->createSkill($skill->name,$skill->qualification,$employye->id);
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(),500);
        }

    }
}
