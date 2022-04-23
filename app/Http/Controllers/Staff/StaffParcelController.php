<?php

namespace App\Http\Controllers\Staff;

use App\Branch;
use App\Tracks;
use App\Parcels;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffParcelController extends Controller
{
    public function index()
    {
        $parcels = Parcels::latest()->get();
        return view('staff.parcel.index',compact('parcels'));
    }
    public function add()
    {
        $branches = Branch::latest()->get();
        return view('staff.parcel.add',compact('branches'));
    }
    public function new(Request $request)
    {
        $this->validate($request,[
            'item_name' => 'required|string',
            'item_type' => 'required|string',
            'sender_name' => 'required|string',
            'sender_address' => 'required',
            'sender_contact' => 'required|string',
            'recipient_name' => 'required|string',
            'recipient_address' => 'required',
            'recipient_contact' => 'required|string',
            'type' => 'required',
            'from_branch_id' => 'required|string',
            'to_branch_id' => 'string',
            'price' => 'required|string',
            
        ]);
        $status = 'Collected';
       
        
        $reference_number = rand(1111111111,999999999);

        $parcel = new Parcels();
        $parcel->reference_number = $reference_number;
        $parcel->item_type = $request->item_type;
        $parcel->item_name = $request->item_name;
        $parcel->sender_name = $request->sender_name;
        $parcel->sender_address = $request->sender_address;
        $parcel->sender_contact = $request->sender_contact;
        $parcel->recipient_name = $request->recipient_name;
        $parcel->recipient_address = $request->recipient_address;
        $parcel->recipient_contact = $request->recipient_contact;
        $parcel->type = $request->type;
        $parcel->from_branch_id = $request->from_branch_id;
        $parcel->to_branch_id = $request->to_branch_id;
        $parcel->height = $request->height;
        $parcel->weight = $request->weight;
        $parcel->length = $request->length;
        $parcel->width = $request->width;
        $parcel->price = $request->price;
        $parcel->status = $status;
        $parcel->save();
        return redirect()->back()->with('success','New Parcel Created Successfully');

    }
    public function view($id)
    {
        $parcel = Parcels::find($id);
        return view('staff.parcel.view',compact('parcel'));
    }
    public function edit($id)
    {
        $parcel = Parcels::find($id);
        // $branches = Branch::latest()->get();
        return view('staff.parcel.edit',compact('parcel'));
    }
    public function track()
    {
        return view('staff.parcel.track');
    }
    public function show(Request $request)
    {
        $searchTerm = '%'.$request->ref_no.'%';
            
        return view('staff.parcel.track',['tracks' => Tracks::where('reference_number', 'like', $searchTerm)->get()
        ]);
    }
}
