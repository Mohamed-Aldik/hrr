<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use HasFactory;
    protected $fillable = [];
    protected $table = 'job_titles';

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    public function employees()
    {
        return $this->hasMany(Employee::class, 'employee_id', 'id');

    }

}
