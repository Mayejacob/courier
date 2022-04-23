@extends('admin.layouts.master')
@section('title','Company Master')
@push('css')
    
@endpush

@section('content')
<div class="col-12">
    @include('admin.alert')
</div>
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
            <h5 class="m-0" id="heading">
                @if (count($companies) > 0)
                    Edit Existing Company
                    @else
                    Add New Company
                @endif
            
            </h5>
            </div>
            <form action="" id="company-form" method="POST" enctype="multipart/form-data">
                @if (count($companies) > 0)
                    @method('PUT')
                @endif
                
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="company_name"> Company Name</label>
                            <input type="text" name="company_name" class="form-control" 
                            @if (count($companies) > 0 ) value="{{ $company->company_name }}" @endif>
                            @error('company_name')
                                <small class="text-danger">{{ $message}} </small>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label for="company_logo"> Company Logo</label>
                            <input type="file" name="company_logo" class="form-control">
                            @error('company_logo')
                                <small class="text-danger">{{ $message}} </small>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="address"> Company Address</label>
                            <textarea name="address" rows="4" class="form-control">@if (count($companies) > 0 ) {{ $company->address }} @endif</textarea>
                            @error('address')
                                <small class="text-danger">{{ $message}} </small>
                            @enderror
                        </div>
                        <div class="col-4 mb-3">
                            <label for="company_city"> Company city</label>
                            <input type="text" name="company_city" class="form-control" @if (count($companies) > 0 ) value="{{ $company->company_city }}" @endif>
                            @error('company_city')
                                <small class="text-danger">{{ $message}} </small>
                            @enderror
                        </div>
                        <div class="col-4 mb-3">
                            <label for="company_state"> Company state</label>
                            <input type="text" name="company_state" class="form-control" @if (count($companies) > 0 ) value="{{ $company->company_state }}" @endif>
                            @error('company_state')
                                <small class="text-danger">{{ $message}} </small>
                            @enderror
                        </div>
                        <div class="col-4 mb-3">
                        <label for="company_pin"> Company pincode</label>
                            <input type="text" name="company_pin" class="form-control" @if (count($companies) > 0 ) value="{{ $company->company_pin }}" @endif>
                            @error('company_pin')
                                <small class="text-danger">{{ $message}} </small>
                            @enderror
                        </div>
                        <div class="col-3 mb-3">
                            <label for="company_country"> Company Country</label>
                            <input type="text" name="company_country" class="form-control" @if (count($companies) > 0 ) value="{{ $company->company_country }}" @endif>
                            @error('company_country')
                                <small class="text-danger">{{ $message}} </small>
                            @enderror
                        </div>
                        <div class="col-3 mb-3">
                            <label for="company_phone"> Company phone</label>
                            <input type="text" name="company_phone" class="form-control" @if (count($companies) > 0 ) value="{{ $company->company_phone }}" @endif>
                            @error('company_phone')
                                <small class="text-danger">{{ $message}} </small>
                            @enderror
                        </div>
                        <div class="col-3 mb-3">
                            <label for="company_email"> Company email</label>
                            <input type="email" name="company_email" class="form-control" @if (count($companies) > 0 ) value="{{ $company->company_email }}" @endif>
                            @error('company_email')
                                <small class="text-danger">{{ $message}} </small>
                            @enderror
                        </div>
                        <div class="col-3 mb-3">
                            <label for="company_gst"> Company GST</label>
                            <input type="text" name="company_gst" class="form-control" @if (count($companies) > 0 ) value="{{ $company->company_gst }}" @endif>
                            @error('company_gst')
                                <small class="text-danger">{{ $message}} </small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-6">
                            <button onclick="companyFormSubmit()" class="btn btn-primary">{{ count($companies) > 0 ? 'Update Company Details' : 'Save company Details' }} </button>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ route('admin.dashboard')}} " class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection

@push('js')
<script>
    function companyFormSubmit()
    {
        var heading = $('#heading').val();
        if(heading == 'Add New Company')
        {
            $('#company-form').attr('action','{{ route('admin.company.store')}}')
        }
        else{
            $('#company-form').attr('action','{{ route('admin.company.update')}}')
        }
    }
</script>
    
@endpush