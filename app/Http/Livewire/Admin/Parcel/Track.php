<?php

namespace App\Http\Livewire\Admin\Parcel;

use App\Parcels;
use Livewire\Component;
use Livewire\WithPagination;

class Track extends Component
{
    use WithPagination;

    public $searchTerm;

    public function render()
    {
        // $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.admin.parcel.track');
    }
    public function search()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.admin.parcel.track', [
            'parcels' => Parcels::where('reference_number', 'like', $searchTerm)->paginate(10)
        ]);
    }
}
