@extends('admin.layouts.master')
@section('title','Update Profile Picture')
@push('css')
    
@endpush

@section('content')
    
<div class="col-12">
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="post">
                <div class="row mb-3">
                  <div class="col-12">
                    <img class="img-fluid" src="{{ asset('profile/'.$pic->image)}}" width="100%" alt="Photo">
                  </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-3">
            <form action="{{ route('admin.profile.upload') }}" enctype="multipart/form-data" method="POST">
                @csrf 
                <div class="col-12 mb-2">
                    <label for="image">Profile Picture</label>
                    <input type="file" name="image" class="form-control">
                    @error('image')
                        <small class="text-danger">{{ $message}} </small>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <button type="submit" class="btn btn-primary">Update Profile Picture</button>
                </div>
            </form>
        </div>


    </div>
    
</div>


@endsection

@push('js')
    
@endpush