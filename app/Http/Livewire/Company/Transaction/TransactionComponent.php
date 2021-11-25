<?php

namespace App\Http\Livewire\Company\Transaction;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\Employee;

class TransactionComponent extends Component
{
    public $hours;
    public $name;
    public $number ;
    public $trans = 'over_time';
    public $date;
    public $change;
    public $deduction ='absence';

    public function add()
    {
        $employee = Employee::where('job_number', $this->number)->orWhere('name', $this->name)->first();

        if ($employee == null)
            session()->flash("message", " No Employee");
        else {

            $transaction = new Transaction();
            $transaction->employee_id = $employee->id;
            $transaction->transactions = $this->trans;
            if ($this->trans == 'over_time') {
                $transaction->hours = $this->hours;
                $transaction->price = 0;
            } else {
                $transaction->hours = 0;
                $transaction->price = $this->hours;
                $transaction->deduction = $this->deduction;

            }
            if($this->date)
            $transaction->date = $this->date;
            else
            $transaction->date  = now();

            $transaction->save();
            session()->flash("message", "Transaction has been Added successfully!");
            $this->reset();
        }
    }

    public function deleteTransactions($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();
        session()->flash('message', 'transaction has been delete successfully!');
    }

    public function render()
    {
        if($this->trans == 'over_time')
        $this->change ='Hours';
        else
        $this->change ='Amount';

        $transes=Transaction::all();
        return view('livewire.company.transaction.transaction-component',['transes'=>$transes]);
    }
}
