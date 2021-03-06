<?php

namespace App\Http\Livewire\Company\Employee;

use Livewire\Component;
use App\Models\Nationality;
use App\Models\Employee;
use Illuminate\Support\Str;

class AddEmployeeComponent extends Component
{
    public $job_number;
    public $name;
    public $id_number;
    public $birthday;
    public $nationalite = 1;
    public $gender;
    public $email;
    public $phone;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
         
            'job_number' => 'required | unique:employees,job_number,'.$this->job_number, 
            'name' => 'required | alpha ',
            'id_number' => 'required | numeric| digits_between:10,40 | unique:employees,id_number,'.$this->id_number,
            'birthday' => 'required | before:15 years ago',
            'email' => 'somtimes|nullable| unique:employees,email,' .$this->email,
            'phone' => 'somtimes|nullable| digits_between:4,20 | unique:employees,phone,' . $this->phone,
        ]);
    }

    public function addEmployee() {
        $this->validate([
            'job_number' => 'required | unique:employees,job_number,'.$this->job_number, 
            'name' => 'required | alpha ',
            'id_number' => 'required | numeric| digits_between:10,40 | unique:employees,id_number,'.$this->id_number,
            'birthday' => 'required | before:15 years ago',
            'email' => 'somtimes|nullable| unique:employees,email,' .$this->email,
            'phone' => 'somtimes|nullable| digits_between:4,20 | unique:employees,phone,' . $this->phone,


        ]);
               $employee=new Employee();
               $employee->job_number = $this->job_number;
               $employee->name = $this->name;
               $employee->id_number= $this->id_number;
               $employee->birthday= $this->birthday;
               if(Str::startsWith($this->id_number, 1))
               $employee->nationality_id= 1;
               else
               $employee->nationality_id= $this->nationalite;
               $employee->gender= $this->gender;
               $employee->email= $this->email;
               $employee->phone= $this->phone;               
               $employee->user_id= auth()->user()->id;               
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
