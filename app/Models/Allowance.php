<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allowance extends Model
{
    use HasFactory;

    
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_allowances', 'allowance_id', 'employee_id','id','id');

    }

}
