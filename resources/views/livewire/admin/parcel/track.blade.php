<div>
    {{-- <div class="col-12">
        @include('admin.alert')
    </div> --}}
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-6">
                            <h4>View All parcels</h4>
                        </div> 
                    </div>
                </div>
                <div class="card-body">
                    <input type="text" wire:model="searchTerm" placeholder="Search Here" class="form-control"><br>
                   
                    <div class="table-responsive">
                        @if (!empty($parcels))
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SL. No</th>
                                    <th>Branch Name</th>
                                    <th>Address/country</th>
                                    <th>City/State/ZIP</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>ACtion</th>
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
                        {{ $parcels->links() }}
                        @endif
                    </div>
                    
                    
                </div>
            </div>

        </div>
    </div>
</div>

    


