<?php

namespace App\Http\Livewire\Company\Employee;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Allowance;
use App\Models\EmployeeAllowance;

class ShowPayrollsComponent extends Component
{
    public function render()
    {
        $employeeAllowances=EmployeeAllowance::all();
        $employees=Employee::all();
        $allowances=Allowance::all();
        return view('livewire.company.employee.show-payrolls-component',['employees'=> $employees,'allowances'=> $allowances,'employeeAllowances'=> $employeeAllowances ]);
    }
}
