<?php

namespace App\Models;

use App\Models\Companie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;



    protected $fillable =[
        'name',
        'last_name',
        'email',
        'phone',
        'company',
    ];


    /**
     * Get all of the comments for the Employee
     *
     *
     */
    public function companies()
    {
        return $this->belongsTo(Companie::class, 'company', 'id');
    }

    
}
