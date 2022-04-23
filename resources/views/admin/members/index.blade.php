@extends('admin.layouts.master')
@section('title','Manage Members')
@push('css')
    
@endpush

@section('content')
<div class="col-12">
    @include('admin.alert')
</div>
    <div class="col-lg-12">
        <div class="card card-primary card-outline">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-6">
                            <h4>View All Members</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ route('admin.members.add')}}" class="btn btn-primary btn-sm">Add New Member</a>
                        </div>    
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SL. No</th>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Date Registered</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $key => $member)
                                <tr>
                                    <td>{{ $key + 1}}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->username }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td>
                                        @if ($member->role_id == 1)
                                            Admin
                                            @else
                                            Staff
                                        @endif
                                    </td>
                                    <td>{{ date('l d M Y, g:iA' , strtotime($member->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('admin.members.view-member',$member->id)}} " class="btn btn-primary btn-sm">view</a>
                                        <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $member->id}}').submit();" class="btn btn-danger btn-sm">Delete</a>
                                        <form action="{{ route('admin.members.delete',$member->id)}} " style="display: none;" method="post" id="delete-form-{{ $member->id}}">
                                        @csrf
                                        @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $members->links()}}
                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection

@push('js')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endpush