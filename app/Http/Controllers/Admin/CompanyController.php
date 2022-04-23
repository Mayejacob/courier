<?php

namespace App\Http\Controllers\Admin;

use App\CompanyMaster;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = CompanyMaster::all();
        if(count($companies) > 0)
        {
            $company = CompanyMaster::find(1);
            return view('admin.company.index', compact('companies','company'));

        }
        else {
            return view('admin.company.index', compact('companies'));
        }
        
        
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'company_name' => 'required|string',
            'company_logo' => 'required|image|mimes:jpeg,jpg,png,bmp',
            'address' => 'required',
            'company_city' => 'required',
            'company_state' => 'required',
            'company_pin' => 'required',
            'company_country' => 'required|string',
            'company_phone' => 'required|string',
            'company_email' => 'required|email',
            'company_gst' => 'required|string',
        ]);
        $slug = Str::slug($request->company_name);
        $image = $request->file('company_logo');
        if(isset($image))
        {
            $date = Carbon::now()->toDateString();
            $imageName = $slug . '-' . $date . uniqid() . '.' . $image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('company'))
            {
                Storage::disk('public')->makeDirectory('company');
            }
            // $companyLogo = Image::make($image)->resize('100','100');
            $companyLogo = Image::make($image)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('company/'.$imageName,$companyLogo);

        }else{
            $imageName = 'default.png';
        }
        $company = new CompanyMaster();
        $company->company_name = $request->company_name;
        $company->company_logo = $imageName;
        $company->address = $request->address;
        $company->company_city = $request->company_city;
        $company->company_state = $request->company_state;
        $company->company_pin = $request->company_pin;
        $company->company_country = $request->company_country;
        $company->company_phone = $request->company_phone;
        $company->company_email = $request->company_email;
        $company->company_gst = $request->company_gst;
        $company->save();
        return redirect()->back()->with('success','Company Details Saved Successfully');

    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'company_name' => 'required|string',
            'company_logo' => 'image|mimes:jpeg,jpg,png,bmp',
            'address' => 'required',
            'company_city' => 'required',
            'company_state' => 'required',
            'company_pin' => 'required',
            'company_country' => 'required|string',
            'company_phone' => 'required|string',
            'company_email' => 'required|email',
            'company_gst' => 'required|string',
        ]);

        $company = CompanyMaster::find(1);
        $slug = Str::slug($request->company_name);
        $image = $request->file('company_logo');
        if(isset($image))
        {
            $date = Carbon::now()->toDateString();
            $imageName = $slug . '-' . $date . uniqid() . '.' . $image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('company'))
            {
                Storage::disk('public')->makeDirectory('company');
            }
            if(Storage::disk('public')->exists('company/'.$company->company_logo));
            {
                Storage::disk('public')->delete('company/'.$company->company_logo);
            }
            // $companyLogo = Image::make($image)->resize('100','100');
            $companyLogo = Image::make($image)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('company/'.$imageName,$companyLogo);

        }else{
            $imageName = $company->company_logo;
        }
        
        $company->company_name = $request->company_name;
        $company->company_logo = $imageName;
        $company->address = $request->address;
        $company->company_city = $request->company_city;
        $company->company_state = $request->company_state;
        $company->company_pin = $request->company_pin;
        $company->company_country = $request->company_country;
        $company->company_phone = $request->company_phone;
        $company->company_email = $request->company_email;
        $company->company_gst = $request->company_gst;
        $company->save();
        return redirect()->back()->with('success','Company Details Updated Successfully');

    }
}

