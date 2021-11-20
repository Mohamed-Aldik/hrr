<?php

namespace App\Http\Livewire\Company\Employee;

use Livewire\Component;

class Contract2Component extends Component
{
    public $idd;

    public function mount($id)
    {
        
        $this->idd = $id;

    } 
    public function render()
    {
        return view('livewire.company.employee.contract2-component');
    }
}
