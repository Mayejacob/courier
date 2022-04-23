<div>
    <div class="col-12">
        @include('admin.alert')
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('admin.members.view')}}" class="btn btn-secondary btn-sm">Back</a>
                </div>
            </div>
        </div>
        <form wire:submit.prevent="update" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" wire:model="name" class="form-control">
                        @error('name')
                            <small class="text-danger">{{ $message}} </small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="username">Username</label>
                        <input type="text" id="username" wire:model="username" readonly class="form-control">
                        @error('username')
                            <small class="text-danger">{{ $message}} </small>
                        @enderror
                    </div>
                    
                    <div class="col-12">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" wire:model="email" class="form-control">
                        @error('email')
                            <small class="text-danger">{{ $message}} </small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" wire:model="phone" class="form-control">
                        @error('phone')
                            <small class="text-danger">{{ $message}} </small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="city">City</label>
                        <input type="text" id="city" wire:model="city" class="form-control">
                        @error('city')
                            <small class="text-danger">{{ $message}} </small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="state">state</label>
                        <input type="text" id="state" wire:model="state" class="form-control">
                        @error('state')
                            <small class="text-danger">{{ $message}} </small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="pin">pin</label>
                        <input type="text" id="pin" wire:model="pin" class="form-control">
                        @error('pin')
                            <small class="text-danger">{{ $message}} </small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="country">country</label>
                        <input type="text" id="country" wire:model="country" class="form-control">
                        @error('country')
                            <small class="text-danger">{{ $message}} </small>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" wire:model="address" class="form-control" rows="6"></textarea>
                        @error('address')
                            <small class="text-danger">{{ $message}} </small>
                        @enderror
                    </div>
                    <div class="col-12 mt-3">
                        <label for="gender">Gender</label>
                        <select name="gender" wire:model="gender" id="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        @error('gender')
                            <small class="text-danger">{{ $message}} </small>
                        @enderror
                    </div>
                    {{-- <div class="col-12">
                        <label for="image">image</label>
                        <input type="file" id="image" wire:model="image" class="form-control">
                        @error('image')
                            <small class="text-danger">{{ $message}} </small>
                        @enderror
                    </div> --}}
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
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
