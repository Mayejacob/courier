<?php

namespace App\Http\Livewire\Admin\Branch;

use App\Branch;
use Livewire\Component;

class Edit extends Component
{
    public $branch_name;
    public $branch_email;
    public $branch_phone;
    public $branch_address;
    public $branch_city;
    public $branch_state;
    public $branch_pin;
    public $branch_country;
    public $branch_id;

    public function mount($branch)
    {
        $this->branch_name =$branch->branch_name;
        $this->branch_email =$branch->branch_email;
        $this->branch_phone =$branch->branch_phone;
        $this->branch_address =$branch->branch_address;
        $this->branch_city =$branch->branch_city;
        $this->branch_state =$branch->branch_state;
        $this->branch_pin =$branch->branch_pin;
        $this->branch_country =$branch->branch_country;
        $this->branch_id =$branch->id;
    }

    public function render()
    {
        return view('livewire.admin.branch.edit');
    }
    public function update()
    {
        $this->validate([
            'branch_name' => 'required|string',
            'branch_email' => 'required|email',
            'branch_phone' => 'required|string',
            'branch_address' => 'required',
            'branch_city' => 'required|string',
            'branch_state' => 'required|string',
            'branch_pin' => 'required|string',
            'branch_country' => 'required|string',
        ]);
        $branch = Branch::find($this->branch_id);
        $branch->branch_name = $this->branch_name;
        $branch->branch_email = $this->branch_email;
        $branch->branch_phone = $this->branch_phone;
        $branch->branch_address = $this->branch_address;
        $branch->branch_city = $this->branch_city;
        $branch->branch_state = $this->branch_state;
        $branch->branch_pin = $this->branch_pin;
        $branch->branch_country = $this->branch_country;

        $branch->save();
        session()->flash('success','Branch Updated Successfully');
        
        
    }
}
