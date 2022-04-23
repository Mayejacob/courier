<?php

namespace App\Http\Livewire\Admin\Members;

use App\User;
use App\Branch;
use Livewire\Component;

class Add extends Component
{
    public $name;
    public $username;
    public $email;
    public $phone;
    public $role_id;
    public $branch_id;
    public $password;
    public $password_confirmation;
    public $branches;

    public function mount()
    {
        $this->branches = Branch::all();
    }
    
    public function render()
    {
        return view('livewire.admin.members.add');
    }
    public function add()
    {
        $this->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'role_id' => 'required|string',
            'branch_id' => 'required|string',
            'password' => 'required|confirmed',
        ]);

        $password = bcrypt($this->password);

        $user = new User();
        $user->name = $this->name;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->role_id = $this->role_id;
        $user->branch_id = $this->branch_id;
        $user->password = $password;
        $user->save();
        session()->flash('success','New User Added Successfully');
        $this->reset();
    }
}
