<?php

namespace App\Http\Livewire\Company\Employee;

use Livewire\Component;
use App\Models\Contract;
use App\Models\Allowance;

class ContractComponent extends Component
{
    public $idd;
    public $joining_date;
    public $end_date;
    public $probation_period;
    public $annual_balance;
    public $showDiv = false;
    public $basic;
    public $name_allow;
    public $val_allow;


    public function mount($id)
    {
        $this->idd = $id;
        $this->joining_date = now();
    }


    public function render()
    {
        $allowances = Allowance::all();
        return view('livewire.company.employee.contract-component', ['allowances'=>$allowances]);
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

    public function add()
    {
        $allw=new Allowance();
        $allw->name=$this->name_allow;
        $allw->save();
        $allw->employees()->attach($this->idd, ['allowance_id' => $allw->id,'value' => $this->val_allow]);


    }
}
