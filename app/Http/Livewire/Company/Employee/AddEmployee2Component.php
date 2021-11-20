<?php

namespace App\Http\Livewire\Company\Employee;

use Livewire\Component;
use App\Models\Management;
use App\Models\Department;

class AddEmployee2Component extends Component
{
    public $section;
    public $managementt;
    public $idd;

    public function mount($id)
    {
        
        $this->idd = $id;

    } 
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'managementt' => 'required',
            'section' => 'required',

        ]);
    }

    public function addEmployee()
    {
        $this->validate([
            'managementt' => 'required',
            'section' => 'required',
        ]);

    
        session()->flash("message", "Employee has been Added successfully!");
        return redirect(route('add3.employee',['id'=>$this->idd,'section'=>$this->section]));
    }
    public function render()
    {
        $managements = Management::all();
        $departments = Department::where('management_id',$this->managementt)->get();
        return view('livewire.company.employee.add-employee2-component', ['managements' => $managements, 'departments' => $departments]);
    }
}
