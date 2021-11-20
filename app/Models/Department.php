<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function management()
    {
        return $this->belongsTo(Management::class, 'management_id', 'id');
    }

    public function jobTitles()
    {
        return $this->hasMany(JobTitle::class, 'department_id', 'id');

    }
}
