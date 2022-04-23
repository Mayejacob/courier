@extends('staff.layouts.master')
@section('title','Track Parcels')
@push('css')
    
@endpush
@section('content')
    
{{-- @livewire('staff.parcel.track') --}}

<div class="col-12">
    @include('staff.alert')
</div>
    
<div class="col-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h4>Reports</h4>
        </div>
        <div class="col-12 mb-3">
            <form action="{{ route('staff.parcel.show') }}" method="POST">
                @csrf 
                <label for="">Enter Tracking Number</label>
				<div class="input-group col-12">
                    <input type="search" name="ref_no" class="form-control form-control-sm" placeholder="Type the tracking number here">
                    <div class="input-group-append">
                        <button type="submit" id="track-btn" class="btn btn-sm btn-primary btn-gradient-primary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
            </form>
        </div>
        <div class="card-body">
            <div class="col-12">
                @if (!empty($tracks))
                    @if (count($tracks) > 0)
                        @foreach ($tracks as $track)
                            <div id="clone_timeline-item" class="mt-3">
                                <div class="iitem">
                                    <div class="timeline-item text-center">
                                        <i class="fas fa-cart bg-blue"></i>
                                        <span class="time"><i class="fas fa-clock"></i> <span class="dtime">{{ date('l d M Y, g:iA', strtotime($track->created_at))}}</span></span>
                                        <div class="timeline-body">
                                        <b class="text-primary">Status:</b> {{ $track->status}}<br>
                                        <b class="text-secondary">Updated by: {{ $track->staff}}</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else 
                        <p class="text-danger text-center">No Update on this parcel yet</p>
                         
                    @endif
                @endif
            </div>
        </div>


    </div>
    
</div>
@endsection
@push('js')
    
@endpush