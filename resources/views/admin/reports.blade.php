@extends('admin.layouts.master')

@section('title','Reports')
@push('css')
    
@endpush

@section('content')
<div class="col-12">
    @include('admin.alert')
</div>
    
<div class="col-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h4>Reports</h4>
        </div>
        <div class="col-12 mb-3">
            <form action="{{ route('admin.generate') }}" method="POST">
                @csrf 
                <div class="row">
                    <div class="col-6 mb-2">
                        <label for="fromDate">From Date</label>
                        <input type="date" name="fromDate" placeholder="DD/MM/YY" class="form-control">
                        @error('fromDate')
                            <small class="text-danger">{{ $message}} </small>
                        @enderror
                    </div>
                    <div class="col-6 mb-2">
                        <label for="toDate">New toDate</label>
                        <input type="date" name="toDate" placeholder="DD/MM/YY" class="form-control">
                        @error('toDate')
                            <small class="text-danger">{{ $message}} </small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <button type="submit" class="btn btn-primary">Generate Reports</button>
                </div>
            </form>
        </div>
        <div class="col-12 mb-3">
            @if (!empty($parcels))
            <div class="table-responsive">
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
            </div>
            @endif
        </div>


    </div>
    
</div>

@endsection
@push('js')
    
@endpush