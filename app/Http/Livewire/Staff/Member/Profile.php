<?php

namespace App\Http\Livewire\Staff\Member;

use App\User;
use Livewire\Component;

class Profile extends Component
{
    public $name;
    public $username;
    public $email;
    public $phone;
    public $city;
    public $state;
    public $pin;
    public $country;
    public $address;
    public $gender;
    public $role_id;
    public $branch_id;
    public $image;
    public $user_id;

    public function mount($user)
    {
        $this->name = $user->name;
        $this->user_id = $user->id;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->city = $user->city;
        $this->state = $user->state;
        $this->pin = $user->pin;
        $this->country = $user->country;
        $this->address = $user->address;
        $this->gender = $user->gender;
        $this->image = $user->image;
    }
    public function render()
    {
        return view('livewire.staff.member.profile');
    }
    public function update()
    {
        $this->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'pin' => 'required|string',
            'country' => 'required|string',
            'address' => 'required',
            'gender' => 'required',
            // 'image' => 'image|mimes:jpeg,jpg,png,bmp',
        ]);


        $user = User::find($this->user_id);
        $user->name = $this->name;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->city = $this->city;
        $user->state = $this->state;
        $user->pin = $this->pin;
        $user->country = $this->country;
        $user->address = $this->address;
        $user->gender = $this->gender;
        $user->save();
        return redirect()->back()->with('success','Profile Updated Successfully');
    }
}
