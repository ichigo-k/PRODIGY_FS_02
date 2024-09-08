<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;

class SearchBar extends Component
{
    public string $search="";

    public function render()
    {

        $results=[];


        if (strlen($this->search) > 1) {
            $results = Employee::where('fName', 'like', '%' . $this->search . '%')
                ->orWhere('lName', 'like', '%' . $this->search . '%')
                ->get();
        }
        return view('livewire.search-bar',
        [
            "results" => $results,
        ]);
    }
}
