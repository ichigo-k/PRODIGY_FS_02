<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.auth')]
class AddEmployee extends Component
{
    use WithFileUploads;

    public $fName;
    public $lName;
    public $DoB;
    public $gender;
    public $profile_pic;
    public $nationality;
    public $phone_number;
    public $address;
    public $email;
    public $job_title;
    public $joining_date;
    public $department;

    protected $rules = [
        'fName' => 'required|string|max:255',
        'lName' => 'required|string|max:255',
        'DoB' => 'required|date',
        'gender' => 'required|string|in:Male,Female,Other',
        'profile_pic' => 'nullable|image|max:1024', // Max size 1MB
        'nationality' => 'required|string|max:255',
        'phone_number' => 'required|string|max:15',
        'address' => 'required|string|max:255',
        'email' => 'required|email|unique:employees,email',
        'job_title' => 'required|string|max:255',
        'joining_date' => 'required|date',
        'department' => 'required|string|max:255',
    ];

    public function save()
    {
        $this->validate();

        // Handle profile picture upload
        $profilePicPath = $this->profile_pic ? $this->profile_pic->store('profile_pics', 'public') : null;

        // Create the new user
        Employee::create([
            'fName' => $this->fName,
            'lName' => $this->lName,
            'DoB' => $this->DoB,
            'gender' => $this->gender,
            'profile_pic' => $profilePicPath,
            'nationality' => $this->nationality,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'email' => $this->email,
            'job_title' => $this->job_title,
            'joining_date' => $this->joining_date,
            'Department' => $this->department,
        ]);


        session()->flash('message', 'Employee details added successfully.');

        $this->reset();
    }

    public function test()
    {
        return $this->redirect("/dashboard");
    }

    public function render()
    {
        return view('livewire.add-employee');
    }
}
