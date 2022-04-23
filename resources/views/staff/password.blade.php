@extends('staff.layouts.master')

@section('title','Manage Password')
@push('css')
    
@endpush

@section('content')
<div class="col-12">
    @include('staff.alert')
</div>
    
<div class="col-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h4>Update Password</h4>
        </div>
        <div class="col-12 mb-3">
            <form action="{{ route('staff.profile.password.change') }}" method="POST">
                @csrf 
                <div class="col-12 mb-2">
                    <label for="old_password">Current Password</label>
                    <input type="password" name="old_password" class="form-control">
                    @error('old_password')
                        <small class="text-danger">{{ $message}} </small>
                    @enderror
                </div>
                <div class="col-12 mb-2">
                    <label for="password">New Password</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                        <small class="text-danger">{{ $message}} </small>
                    @enderror
                </div>
                <div class="col-12 mb-2">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                    @error('password_confirmation')
                        <small class="text-danger">{{ $message}} </small>
                    @enderror
                </div>
                <div class="col-12 mb-3">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </form>
        </div>


    </div>
    
</div>

@endsection
@push('js')
    
@endpush