<?php

namespace App\Http\Livewire\Company\Payroll;

use Livewire\Component;
use Carbon\Carbon;
class ViewProcessingPayrollsComponent extends Component
{
    public $date;

    public function pross()
    {
        
        $year=Carbon::parse($this->date)->format('y');
        $month=Carbon::parse($this->date)->format('m');

        return redirect(route('processing.payrolls', ['year' => $year,'month'=> $month]));


    }

    public function render()
    {
        return view('livewire.company.payroll.view-processing-payrolls-component');
    }
}
