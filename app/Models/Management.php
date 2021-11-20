<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    use HasFactory;


    
    public function departments()
    {
        return $this->hasMany(Department::class, 'management_id', 'id');

    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'company_management', 'management_id', 'user_id','id','id');

    }
}
