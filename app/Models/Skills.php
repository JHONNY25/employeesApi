<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Skills extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'qualification',
        'employees_id',
    ];

    public function employees(){
        return $this->belongsTo(Employees::class,'employees_id');
    }

    public static function createSkill(string $name,int $qualification,int $employees_id){
        return (new static)::create([
            'name' => $name,
            'qualification'=> $qualification,
            'employees_id'=> $employees_id,
        ]);
    }
}
