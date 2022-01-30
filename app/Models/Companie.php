<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Companie extends Model
{
    use HasFactory;



    protected $fillable =[
        'name',
        'email',
        'logo',
        'website'
    ];


    /**
     * Get the user that owns the Companie
     *
     * 
     */
    public function employees()
    {
        return $this->hasMany(Employee::class, 'company', 'id');
    }
}
