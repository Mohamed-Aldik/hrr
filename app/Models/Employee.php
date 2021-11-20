<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class, 'job_title_id', 'id');
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id', 'id');
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class, 'employee_id', 'id');

    }

    public function allowances()
    {
        return $this->belongsToMany(Allowance::class, 'employee_allowances', 'employee_id', 'allowance_id','id','id');

    }



}
