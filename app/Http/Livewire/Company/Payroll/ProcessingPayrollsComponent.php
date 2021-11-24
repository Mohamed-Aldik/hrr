<?php

namespace App\Http\Livewire\Company\Payroll;

use Livewire\Component;
use App\Models\Contract;
class ProcessingPayrollsComponent extends Component

{
    public $yer;
    public $mnth;

    public function mount($year,$month)
    {

        $this->yer = $year;
        $this->mnth = $month;
        
    }
    public function render()
    {
        $contracts=Contract::where('joining_date','<=','20'.$this->yer.'-'.$this->mnth.'-31')->get();
        return view('livewire.company.payroll.processing-payrolls-component',['contracts'=> $contracts]);
    }
}
