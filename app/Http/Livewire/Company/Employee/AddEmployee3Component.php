<?php

namespace App\Http\Livewire\Company\Employee;

use Livewire\Component;
use App\Models\Employee;
use App\Models\JobTitle;

class AddEmployee3Component extends Component
{
    public $idd;
    public $sectionn;
    public $job_title = 0;

    public function mount($id, $section)
    {

        $this->idd = $id;
        $this->sectionn = $section;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [

            'job_title' => 'required',

        ]);
    }

    public function addEmployee()
    {
        $this->validate([
            'job_title' => 'required',

        ]);
        $employee = Employee::find($this->idd);
        $employee->job_title_id = $this->job_title;

        $employee->save();
        session()->flash("message", "Employee has been Added successfully!");
        return redirect(route('add.contract', ['id' => $employee->id]));
    }

    public function render()
    {
        $jobs_title = JobTitle::where('department_id',$this->sectionn)->get() ;
        $employees = Employee::where('job_title_id',$this->job_title)->get() ;
        return view('livewire.company.employee.add-employee3-component',['jobs_title'=> $jobs_title ,'employees'=>$employees]);
    }
}
