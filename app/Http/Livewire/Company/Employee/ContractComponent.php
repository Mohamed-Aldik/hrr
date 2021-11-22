<?php

namespace App\Http\Livewire\Company\Employee;

use Livewire\Component;
use App\Models\Contract;
use App\Models\Allowance;
use App\Models\Employee;

class ContractComponent extends Component
{
    public $idd;
    public $joining_date;
    public $end_date;
    public $housing = 0;
    public $hous = 0;
    public $probation_period;
    public $annual_balance;
    public $showDiv = false;
    public $basic = 0;
    public $name_allow;
    public $val_allow;


    public function mount($id)
    {
        $this->idd = $id;
        $this->joining_date = now();
    }


    public function render()
    {
        $employee = Employee::find($this->idd);

        return view('livewire.company.employee.contract-component', ['employee' => $employee]);
    }
    public function openDiv()
    {
        $this->showDiv = true;
        $this->end_date = null;
    }
    public function hideDiv()
    {
        $this->showDiv = false;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, [

            'joining_date' => 'required',
            'end_date' => 'required',
            'probation_period' => 'required',
            'annual_balance' => 'required',
            'basic' => 'required | numeric ',
            'housing' => 'required',

        ]);
    }

    public function addContract()
    {
        $this->validate([
            'joining_date' => 'required',
            'end_date' => 'required',
            'probation_period' => 'required',
            'annual_balance' => 'required',
            'basic' => 'required | numeric ',
            'housing' => 'required',
        ]);
        $total = 0;
        $allw = Allowance::find(1);

        $allw->employees()->syncWithPivotValues($this->idd, ['allowance_id' => $allw->id, 'value' => $this->housing]);

        $employ = Employee::find($this->idd);
        foreach ($employ->allowances as $allowance) {
           
            $total += $allowance->pivot->value;
        }
        $employee = Contract::where('employee_id', $this->idd)->first();
        if ($employee == null)
            $employee = new Contract();
        $employee->employee_id  = $this->idd;
        $employee->joining_date  = $this->joining_date;
        $employee->probation_period  = $this->probation_period;
        $employee->annual_balance  = $this->annual_balance;

        $employee->basic_salary  = $this->basic;
        $employee->total_salary  = $total + $this->basic ;
        $employee->gosi_salary  = $this->housing + $this->basic;
        if ($employ->nationality->id == 1) {
            $gosi = (($this->housing + $this->basic) * 0.1) >= 4500 ? 4500 : ($this->housing + $this->basic) * 0.1;
            $employee->gosi_dedc = $gosi;
            $employee->net_salary  = $total + $this->basic - $gosi;
        } else {
            $employee->net_salary  = $total + $this->basic;
            $employee->gosi_dedc  = 0;
        }
        if ($this->end_date === "Unlimited")
            $employee->end_date  = null;
        else
            $employee->end_date  = $this->end_date;








        $employee->save();


        session()->flash("message", "Employee has been Added successfully!");
        return redirect(route('show.employees'));
    }

    public function add()
    {

        $allw = Allowance::where('name', $this->name_allow)->first();
        if (!$allw) {
            $allw = new Allowance();
            $allw->name = $this->name_allow;
            $allw->save();
        }
        $allw->employees()->attach($this->idd, ['allowance_id' => $allw->id, 'value' => $this->val_allow]);
    }
}
