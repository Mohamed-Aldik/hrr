<?php

namespace App\Http\Livewire\Company\Payroll;

use Livewire\Component;
use App\Models\Contract;

class VersionPayrollsComponent extends Component
{
    public function render()
    {
        $contracts=Contract::where('joining_date','<=', now())->get();
        return view('livewire.company.payroll.version-payrolls-component',['contracts'=>$contracts]);
    }
}
