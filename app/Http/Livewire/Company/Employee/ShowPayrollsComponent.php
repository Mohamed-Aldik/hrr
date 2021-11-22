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
        $employeeAllowances=EmployeeAllowance::get()->groupBy(function($data) {
            return $data->allowance_id;});
        $employees=Employee::all();
        $allowances=EmployeeAllowance::all();
        return view('livewire.company.employee.show-payrolls-component',['employees'=> $employees,'allowances'=> $allowances,'employeeAllowances'=> $employeeAllowances ]);
    }
}
