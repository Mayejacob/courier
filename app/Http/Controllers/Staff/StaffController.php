<?php

namespace App\Http\Controllers\Staff;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index(){
        return view('staff.dashboard');
    }
    public function profile()
    {
        $au = Auth::user()->id;
        $user = User::find($au);
        return view('staff.profile',compact('user'));
    }
    public function picture()
    {
        $pic = User::find(Auth::user()->id);
        return view('staff.upload',compact('pic'));
    }
    public function upload(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,jpg,png,bmp|max:2048',
        ]);

        $slug = Str::slug(Auth::user()->username);
        $image = $request->file('image');

            $imageName= $slug.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/profile');
            $image->move($destinationPath, $imageName);
       
        $user = User::find(Auth::user()->id);
        $user->image = $imageName;
        $user->save();
        return redirect()->back()->with('success','Profile Picture Updated Successfully');
    }
    public function password()
    {
        $user = User::find(Auth::user()->id);
        return view('staff.password',compact('user'));
    }
    public function change(Request $request)
    {
        $this->validate($request,[
            'old_password' => 'required|string',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // $current = bcrypt(Auth::user()->password);
        $current = (Auth::user()->password);
        $current_pass = $request->old_password;
        if(!Hash::check($current_pass, $current)){
            return back()->with('error','Current Password is incorrect, kindly cross check and try again');
        }else {
            $password = bcrypt($request->password);
            $ch = User::find(1);
            $ch->password = $password;
            $ch->save();
            return redirect()->back()->with('success','Password Updated Successfully, kindly keep it safe');
        }

        
    }
}
