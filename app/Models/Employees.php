<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Employees extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'job',
        'birthdate',
        'address',
        'city',
        'state',
        'latitude',
        'longitude',
    ];

    public function skills(){
        return $this->hasMany(Skills::class,'employees_id');
    }

    public static function createEmployee(Request $request){
        return (new static)::create([
            'name' => $request->name,
            'email'=> $request->email,
            'job'=> $request->job,
            'birthdate'=> $request->birthdate,
            'address'=> $request->address,
            'city'=> $request->city,
            'state'=> $request->state,
            'latitude'=> $request->latitude,
            'longitude'=> $request->longitude,
        ]);
    }
}
