<?php

namespace App\Http\Livewire\Company\Employee;

use Livewire\Component;
use App\Models\Employee;

class ShowEmployeeComponent extends Component
{


    public function render()
    {
        $employees=Employee::all();
        return view('livewire.company.employee.show-employee-component',['employees'=> $employees]);
    }
}
