<?php

namespace App\Http\Livewire\Company\Employee;

use Livewire\Component;
use App\Models\Nationality;
use App\Models\Employee;

class AddEmployeeComponent extends Component
{
    public $job_number;
    public $name;
    public $id_number;
    public $birthday;
    public $nationalite;
    public $gender;
    public $email;
    public $phone;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
         
            'job_number' => 'required',
            'name' => 'required | string ',
            'id_number' => 'required',
            'birthday' => 'required | before:15 years ago',
        ]);
    }

    public function addEmployee() {
        $this->validate([
            'job_number' => 'required',
            'name' => 'required | string ',
            'id_number' => 'required',
            'birthday' => 'required | before:15 years ago',

        ]);
                $employee=new Employee();
               $employee->job_number = $this->job_number;
               $employee->name = $this->name;
               $employee->id_number= $this->id_number;
               $employee->birthday= $this->birthday;
               if($this->nationalite)
               $employee->nationality_id= $this->nationalite;
               $employee->gender= $this->gender;
               $employee->email= $this->email;
               $employee->phone= $this->phone;               
               $employee->save();
               session()->flash("message", "Employee has been Added successfully!");
               return redirect(route('add2.employee',['id'=>$employee->id]));

       }

    public function render()
    {
        $nationalities=Nationality::all();
        return view('livewire.company.employee.add-employee-component',['nationalities'=>$nationalities]);
    }
}
