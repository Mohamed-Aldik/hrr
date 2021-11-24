<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [];
    protected $table = 'transactions';

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

}
