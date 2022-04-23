<div>
    <div class="col-12">
        @include('admin.alert')
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="row">
                <div class="col-3">
                    <a href="{{ route('admin.members.view')}}" class="btn btn-secondary btn-sm">Back</a>
                </div>
                <div class="col-8 text-right">
                    <b class="text-primary">Tracking ID: {{ $pcl->reference_number}}</b> | 
                    <b class="text-success">Status: {{ $pcl->status}}</b> | 
                    <b class="text-primary">Last Update: {{ date('l d M Y, g:iA' , strtotime($pcl->updated_at))}}</b>
                </div>
            </div>
        </div>
        <form wire:submit.prevent="update">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="row col-12 mb-2">
                        <div class="form-group col-6">
                          <label for="item_name" class="control-label">Item Name</label>
                          <input type="text" name="item_name" id="item_name" wire:model="item_name" class="form-control form-control-sm" required>
                          @error('item_name')
                            <small class="text-danger">{{ $message}} </small>
                          @enderror
                        </div>
                        <div class="form-group col-6">
                          <label for="item_type" class="control-label">Item Type</label>
                          <select name="item_type" id="item_type" wire:model="item_type" class="form-control form-control-sm" required>
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
                        <b>Sender Information</b>
                        <div class="form-group mt-3">
                            <label for="sender_name" class="control-label">Name</label>
                            <input type="text" name="sender_name" id="sender_name" wire:model="sender_name" class="form-control form-control-sm">
                            @error('sender_name')
                                <small class="text-danger">{{ $message}} </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sender_address" class="control-label">Address</label>
                            <input type="text" name="sender_address" id="sender_address" wire:model="sender_address" class="form-control form-control-sm">
                            @error('sender_address')
                                <small class="text-danger">{{ $message}} </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sender_contact" class="control-label">Contact #</label>
                            <input type="text" name="sender_contact" id="sender_contact" wire:model="sender_contact" class="form-control form-control-sm">
                            @error('sender_contact')
                                <small class="text-danger">{{ $message}} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <b>Recipient Information</b>
                        <div class="form-group mt-3">
                            <label for="recipient_name" class="control-label">Name</label>
                            <input type="text" name="recipient_name" id="recipient_name" wire:model="recipient_name" class="form-control form-control-sm">
                            @error('recipient_name')
                                <small class="text-danger">{{ $message}} </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="recipient_address" class="control-label">Address</label>
                            <input type="text" name="recipient_address" id="recipient_address" wire:model="recipient_address" class="form-control form-control-sm">
                            @error('recipient_address')
                                <small class="text-danger">{{ $message}} </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="recipient_contact" class="control-label">Contact #</label>
                            <input type="text" name="recipient_contact" id="recipient_contact" wire:model="recipient_contact" class="form-control form-control-sm">
                            @error('recipient_contact')
                                <small class="text-danger">{{ $message}} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type">Type</label><br>
                                PickUp: <input type="radio" id="type" wire:model="type" name="type" value="Pickup">
                                Delivery: <input type="radio" id="type" wire:model="type"name="type" value="Delivery" ><br>
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
                                <select name="from_branch_id" id="from_branch_id" wire:model="from_branch_id" class="form-control select2">
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
                        </div>
                        <div class="form-group col-12" id="tbi-field">
                            <label for="to_branch_id" class="control-label">Pickup Branch</label>
                            <select name="to_branch_id" id="to_branch_id" wire:model="to_branch_id" class="form-control">
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
                        <div class="col-12">
                            <b class="mb-3">Parcel Information</b>
                            <div class="row col-12 mt-3">
                                <div class="form-group col-3">
                                    <label for="height" class="control-label">Height</label>
                                    <input type="text" name="height" id="height" wire:model="height" class="form-control form-control-sm">
                                    @error('height')
                                    <small class="text-danger">{{ $message}} </small>
                                    @enderror
                                </div>
                                <div class="form-group col-3">
                                    <label for="weight" class="control-label">Weight</label>
                                    <input type="text" name="weight" id="weight" wire:model="weight" class="form-control form-control-sm">
                                    @error('weight')
                                    <small class="text-danger">{{ $message}} </small>
                                    @enderror
                                </div>
                                <div class="form-group col-3">
                                    <label for="length" class="control-label">Length</label>
                                    <input type="text" name="length" id="length" wire:model="length" class="form-control form-control-sm">
                                    @error('length')
                                    <small class="text-danger">{{ $message}} </small>
                                    @enderror
                                </div>
                                <div class="form-group col-3">
                                    <label for="width" class="control-label">Width</label>
                                    <input type="text" name="width" id="width" wire:model="width" class="form-control form-control-sm">
                                    @error('width')
                                    <small class="text-danger">{{ $message}} </small>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="price" class="control-label">Price(N)</label>
                                    <input type="text" name="price" id="price" wire:model="price" class="form-control form-control-sm">
                                    @error('price')
                                    <small class="text-danger">{{ $message}} </small>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="Status" class="control-label">Parcel Status</label>
                                    <select name="status" id="status" wire:model="status" class="form-control select2">
                                    <option value=""> Select Parcel Status</option>
                                        <option value="Collected">Collected</option>
                                        <option value="Shipped">Shipped</option>
                                        <option value="In Transit">In Transit</option>
                                        <option value="Arrived at Destination">Arrived at Destination</option>
                                        <option value="Out for Delivery">Out for Delivery</option>
                                        <option value="Ready to Pickup">Ready to Pickup</option>
                                        <option value="Picked-up">Picked-up</option>
                                        <option value="Delivered">Delivered</option>
                                        <option value="Unsuccessfull Delivery Attempt">Unsuccessfull Delivery Attempt</option>
                                        @error('status')
                                            <small class="text-danger">{{ $message}} </small>
                                        @enderror
                                   
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Update Parcel</button>
                    </div>
                    <div class="col-6 text-right" wire:loading wire:target="update">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading....</span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
