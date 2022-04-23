@extends('admin.layouts.master')
@section('title','Add New Parcel')

@push('css')
    
@endpush

@section('content')
<div class="col-12">
  @include('admin.alert')
</div>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
    <form action="{{ route('admin.parcel.add.new')}} " id="manage-parcel" method="POST">
      @csrf
      <div class="card-body">
          <div class="row">
            <div class="row col-12 mb-2">
              <div class="form-group col-6">
                <label for="item_name" class="control-label">Item Name</label>
                <input type="text" name="item_name" id="" class="form-control form-control-sm" required>
                @error('item_name')
                  <small class="text-danger">{{ $message}} </small>
                @enderror
              </div>
              <div class="form-group col-6">
                <label for="item_type" class="control-label">Item Type</label>
                <select name="item_type"  class="form-control form-control-sm" required>
                  <option value="">Select Item Type</option>
                  <option value="Electronics">Electronics</option>
                  <option value="Mobiles">Mobiles</option>
                  <option value="Books">Books</option>
                  <option value="Certificates">Certificates</option>
                  <option value="Equipments">Equipments</option>
                  <option value="Clothings">Clothings</option>
                  <option value="Valuables">Valuables</option>
                  <option value="Confidential Documents">Confidential Documents</option>
                  <option value="Banners/Posters">Banners/Posters</option>
                  <option value="Portable Documents">Portable Documents</option>
                  <option value="Others">Others</option>
                </select>
                @error('item_type')
                  <small class="text-danger">{{ $message}} </small>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
                <b class="">Sender Information</b>
                <div class="form-group mt-3">
                  <label for="sender_name" class="control-label">Name</label>
                  <input type="text" name="sender_name" id="" class="form-control form-control-sm" required>
                  @error('sender_name')
                    <small class="text-danger">{{ $message}} </small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="sender_address" class="control-label">Address</label>
                  <input type="text" name="sender_address" id="" class="form-control form-control-sm" required>
                  @error('sender_address')
                    <small class="text-danger">{{ $message}} </small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="sender_contact" class="control-label">Contact #</label>
                  <input type="text" name="sender_contact" id="" class="form-control form-control-sm" required>
                  @error('sender_contact')
                    <small class="text-danger">{{ $message}} </small>
                  @enderror
                </div>
            </div>
            <div class="col-md-6">
                <b>Recipient Information</b>
                <div class="form-group mt-3">
                  <label for="recipient_name" class="control-label">Name</label>
                  <input type="text" name="recipient_name" id="" class="form-control form-control-sm" required>
                  @error('recipient_name')
                    <small class="text-danger">{{ $message}} </small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="recipient_address" class="control-label">Address</label>
                  <input type="text" name="recipient_address" id="" class="form-control form-control-sm" required>
                  @error('recipient_address')
                    <small class="text-danger">{{ $message}} </small>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="recipient_contact" class="control-label">Contact #</label>
                  <input type="text" name="recipient_contact" id="" class="form-control form-control-sm" required>
                  @error('recipient_contact')
                    <small class="text-danger">{{ $message}} </small>
                  @enderror
                </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="type">Type</label><br>
                PickUp: <input type="radio" name="type" value="Pickup" checked>
                Delivery: <input type="radio" name="type" value="Delivery" ><br>
                <small>Delivery = Delivered to Recipient Address</small>
                <small>, Pickup = Pickup to nearest Branch</small><br>
                  @error('type')
                      <small class="text-danger">{{ $message}} </small>
                  @enderror
              </div>
            </div>
            <div class="col-md-6" id="">
                <div class="form-group" id="fbi-field">
                  <label for="from_branch_id" class="control-label">Branch Processed</label>
                  <select name="from_branch_id" id="from_branch_id" class="form-control select2" required>
                  <option value=""> Select Pick Up Branch</option>
                  @if (count($branches) > 0)
                    @foreach ($branches as $branch)
                    <option value="{{ $branch->branch_name}} ">{{ $branch->branch_name}} </option>
                    @endforeach
                    @error('from_branch_id')
                        <small class="text-danger">{{ $message}} </small>
                    @enderror
                  @endif
                </select>
              </div>
              <div class="form-group" id="tbi-field">
                <label for="to_branch_id" class="control-label">Pickup Branch</label>
                <select name="to_branch_id" id="to_branch_id" class="form-control select2" required>
                  <option value=""> Select Destination Branch</option>
                  @if (count($branches) > 0)
                    @foreach ($branches as $branch)
                    <option value="{{ $branch->branch_name}} ">{{ $branch->branch_name}} </option>
                    @endforeach
                    @error('to_branch_id')
                        <small class="text-danger">{{ $message}} </small>
                    @enderror
                  @endif
                </select>
              </div>
            </div>
          </div>
          <hr>
          <div class="col-md-12">
            <b class="mb-3">Parcel Information</b>
            <div class="row mt-3">
              <div class="form-group">
                <label for="height" class="control-label">Height</label>
                <input type="text" name="height" id="" class="form-control form-control-sm" required>
                @error('height')
                  <small class="text-danger">{{ $message}} </small>
                @enderror
              </div>
              <div class="form-group">
                <label for="weight" class="control-label">Weight</label>
                <input type="text" name="weight" id="" class="form-control form-control-sm" required>
                @error('weight')
                  <small class="text-danger">{{ $message}} </small>
                @enderror
              </div>
              <div class="form-group">
                <label for="length" class="control-label">Length</label>
                <input type="text" name="length" id="" class="form-control form-control-sm" required>
                @error('length')
                  <small class="text-danger">{{ $message}} </small>
                @enderror
              </div>
              <div class="form-group">
                <label for="width" class="control-label">Width</label>
                <input type="text" name="width" id="" class="form-control form-control-sm" required>
                @error('width')
                  <small class="text-danger">{{ $message}} </small>
                @enderror
              </div>
              <div class="form-group">
                <label for="price" class="control-label">Price(N)</label>
                <input type="text" name="price" id="" class="form-control form-control-sm" required>
                @error('price')
                  <small class="text-danger">{{ $message}} </small>
                @enderror
              </div>
            </div>
          </div>
      </div>
      <div class="card-footer">
        <div class="row">
            <div class="col-6">
                <button  class="btn btn-primary" type="submit">Add Parcel</button>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('admin.parcel.add')}} " class="btn btn-secondary">Back</a>
            </div>
        </div>
      </div>
    </form>
</div>
@endsection

@push('js')

@endpush