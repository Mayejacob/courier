@extends('admin.layouts.master')
@section('title','Track Parcels')
@push('css')
    
@endpush
@section('content')
    
{{-- @livewire('admin.parcel.track') --}}

<div class="col-12">
    @include('admin.alert')
</div>
    
<div class="col-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h4>Reports</h4>
        </div>
        <div class="col-12 mb-3">
            <form action="{{ route('admin.parcel.show') }}" method="POST">
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
        <div class="col-12 mb-3">
            
            {{-- <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL. No</th>
                            <th>Reference No</th>
                            <th>Sender Name</th>
                            <th>Receiver Name</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($parcels as $key => $parcel)
                        <tr>
                            <td>{{ $key + 1}}</td>
                            <td>{{ $parcel->reference_number }}</td>
                            <td>{{ $parcel->sender_name }}</td>
                            <td> {{ $parcel->recipient_name }} </td>
                            <td>{{ $parcel->status }}</td>
                            <td>{{ date('l d M Y, g:iA' , strtotime($parcel->created_at)) }}</td>
                            <td>
                                <a href="{{ route('admin.parcel.view',$parcel->id)}} " class="btn btn-warning btn-sm"> <i class="fas fa-eye"></i> </a>
                                <a href="{{ route('admin.parcel.edit',$parcel->id)}} " class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </a>
                                <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $parcel->id}}').submit();" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> </a>
                                <form action="{{ route('admin.parcel.delete',$parcel->id)}} " style="display: none;" method="post" id="delete-form-{{ $parcel->id}}">
                                @csrf
                                @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $parcels->links()}}
            </div> --}}
        </div>


    </div>
    
</div>
@endsection
@push('js')
    
@endpush