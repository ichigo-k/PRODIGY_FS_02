<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;


#[Layout('layouts.auth')]
class ViewDetails extends Component
{

    use WithFileUploads;

    public $employee;
    public $fName, $lName, $email, $phone_number, $DoB, $gender, $nationality, $address, $department, $job_title, $joining_date;
    public $deleteConfirm = false;

    public function mount(Employee $employee)
    {
        $this->employee = $employee;
        $this->fName = $employee->fName;
        $this->lName = $employee->lName;
        $this->email = $employee->email;
        $this->phone_number = $employee->phone_number;
        $this->DoB = $employee->DoB;
        $this->gender = $employee->gender;
        $this->nationality = $employee->nationality;
        $this->address = $employee->address;
        $this->department = $employee->Department;
        $this->job_title = $employee->job_title;
        $this->joining_date = $employee->joining_date;
    }

    public function save()
    {

        $this->employee->update([
            'fName' => $this->fName,
            'lName' => $this->lName,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'DoB' => $this->DoB,
            'gender' => $this->gender,
            'nationality' => $this->nationality,
            'address' => $this->address,
            'department' => $this->department,
            'job_title' => $this->job_title,
            'joining_date' => $this->joining_date,

        ]);

        session()->flash('message', 'Employee details updated successfully.');
    }

    public function confirmDelete()
    {
        $this->deleteConfirm = true;
    }

    public function delete()
    {
        $this->employee->delete();
        session()->flash('message', 'Employee deleted successfully.');
        return redirect()->to('/dashboard');
    }

    public function render()
    {
        return view('livewire.view-details');
    }
}
