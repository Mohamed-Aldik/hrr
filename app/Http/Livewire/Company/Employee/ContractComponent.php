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
    public $housing=0;
    public $hous=0;
    public $probation_period;
    public $annual_balance;
    public $showDiv = false;
    public $basic=0;
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
        return view('livewire.company.employee.contract-component', ['employee'=>$employee]);
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
            'basic' => 'required',
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
            'basic' => 'required',
            'housing' => 'required',
        ]);

        $employee=new Contract();
        $employee->employee_id  = $this->idd ;
        $employee->joining_date  = $this->joining_date ;
        $employee->probation_period  = $this->probation_period  ;
        $employee->annual_balance  = $this->annual_balance  ;
        $employee->basic_salary  = $this->basic  ;
        $employee->end_date  = $this->end_date  ;
        $employee->save();

        $allw=Allowance::where('name','housing')->first();
        if(!$allw){
            $allw=new Allowance();
            $allw->name='housing';
            $allw->save();
            }
            $allw->employees()->syncWithPivotValues($this->idd, ['allowance_id' => $allw->id,'value' => $this->housing]);
            session()->flash("message", "Employee has been Added successfully!");
            return redirect(route('show.employees'));

    }

    public function add()
    {

        $allw=Allowance::where('name',$this->name_allow)->first();
        if(!$allw){
        $allw=new Allowance();
        $allw->name=$this->name_allow;
        $allw->save();
        }
        $allw->employees()->syncWithPivotValues($this->idd, ['allowance_id' => $allw->id,'value' => $this->val_allow]);


    }
}
