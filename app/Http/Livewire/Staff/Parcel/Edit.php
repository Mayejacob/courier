<?php

namespace App\Http\Livewire\Staff\Parcel;

use App\Track;
use App\Branch;
use App\Tracks;
use App\Parcels;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{
    public $branch_id;
    public $branches;
    public $parcel;
    public $reference_number;
    public $sender_name;
    public $sender_address;
    public $sender_contact;
    public $recipient_name;
    public $recipient_address;
    public $recipient_contact;
    public $type;
    public $from_branch_id;
    public $to_branch_id;
    public $height;
    public $weight;
    public $width;
    public $length;
    public $price;
    public $status;
    public $pcl;
    public $parcel_id;
    public $item_name;
    public $item_type;
    public $updated_at;
    public $staff;
    

    public function mount($parcel)
    {
        $this->branches = Branch::all();

        $this->parcel_id = $parcel->id;
        $this->reference_number = $parcel->reference_number;
        $this->item_name = $parcel->item_name;
        $this->item_type = $parcel->item_type;
        $this->sender_name = $parcel->sender_name;
        $this->sender_address = $parcel->sender_address;
        $this->sender_contact = $parcel->sender_contact;
        $this->recipient_name = $parcel->recipient_name;
        $this->recipient_address = $parcel->recipient_address;
        $this->recipient_contact = $parcel->recipient_contact;
        $this->type = $parcel->type;
        $this->from_branch_id = $parcel->from_branch_id;
        $this->to_branch_id = $parcel->to_branch_id;
        $this->height = $parcel->height;
        $this->weight = $parcel->weight;
        $this->width = $parcel->width;
        $this->length = $parcel->length;
        $this->price = $parcel->price;
        $this->status = $parcel->status;
        $this->staff = Auth::user()->name;
        $this->updated_at = time(); //Carbon::now()->toDateString();
        $this->pcl = $parcel;
    }

    public function render()
    {
        return view('livewire.staff.parcel.edit');
    }
    public function update()
    {
        $this->validate([
            'status' => 'required|string',
        ]);

        // update track record
        $trac = new Tracks;
        $trac->parcel_id = $this->parcel_id;
        $trac->reference_number = $this->reference_number;
        $trac->status = $this->status;
        $trac->staff = $this->staff;
        $trac->save();

        $parc = Parcels::find($this->parcel_id);
        $parc->reference_number = $this->reference_number;
        $parc->sender_name = $this->sender_name;
        $parc->sender_address = $this->sender_address;
        $parc->sender_contact = $this->sender_contact;
        $parc->recipient_name = $this->recipient_name;
        $parc->recipient_address = $this->recipient_address;
        $parc->recipient_contact = $this->recipient_contact;
        $parc->type = $this->type;
        $parc->from_branch_id = $this->from_branch_id;
        $parc->to_branch_id = $this->to_branch_id;
        $parc->height = $this->height;
        $parc->weight = $this->weight;
        $parc->length = $this->length;
        $parc->width = $this->width;
        $parc->price = $this->price;
        $parc->status = $this->status;
        $parc->updated_at = $this->updated_at;
        $parc->save();

        return redirect()->back()->with('success','Parcel Updated Successfully');
    }
}
