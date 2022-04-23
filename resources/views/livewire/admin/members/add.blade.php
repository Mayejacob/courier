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
        <form wire:submit.prevent="add">
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
                        <input type="text" id="username" wire:model="username" class="form-control">
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
                        <label for="branch_id">Branch</label>
                        <select name="branch_id" wire:model="branch_id" id="branch_id" class="form-control">
                            <option value="">Select Staff Branch</option>
                            @if (count($branches) > 0)
                                @foreach ($branches as $branch)
                                <option value="{{ $branch->id}} ">{{ $branch->branch_name}} </option>
                                @endforeach
                                @error('branch_id')
                                    <small class="text-danger">{{ $message}} </small>
                                @enderror
                            @endif
                        </select>
                        
                    </div>
                    <div class="col-12 mt-3">
                        <label for="role_id">Role</label>
                        <select name="role_id" wire:model="role_id" id="role_id" class="form-control">
                            <option value="">Select User Role</option>
                            <option value="1">Admin</option>
                            <option value="2">Staff</option>
                        </select>
                        @error('role_id')
                            <small class="text-danger">{{ $message}} </small>
                        @enderror
                    </div>
                    <div class="col-12 mt-3">
                        <label for="password">Password</label>
                        <input type="password" id="password" wire:model="password" class="form-control">
                        @error('password')
                            <small class="text-danger">{{ $message}} </small>
                        @enderror
                    </div>
                    <div class="col-12 mt-3">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" wire:model="password_confirmation" class="form-control">
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message}} </small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Add User</button>
                    </div>
                    <div class="col-6 text-right" wire:loading wire:target="add">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading....</span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
