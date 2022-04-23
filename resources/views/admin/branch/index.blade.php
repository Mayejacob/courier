@extends('admin.layouts.master')
@section('title','Manage Branch')
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
                            <h4>View All Branches</h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="{{ route('admin.branch.add')}}" class="btn btn-primary btn-sm">Add New Branch</a>
                        </div>    
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
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
                                @foreach ($branches as $key => $branch)
                                <tr>
                                    <td>{{ $key + 1}}</td>
                                    <td>{{ $branch->branch_name }}</td>
                                    <td>
                                        {{ $branch->branch_address }},
                                        {{ $branch->branch_country }}
                                    </td>
                                    <td>
                                        {{ $branch->branch_city }},
                                        {{ $branch->branch_state }},
                                        {{ $branch->branch_pin }}
                                    </td>
                                    <td>{{ $branch->branch_phone }}</td>
                                    <td>{{ $branch->branch_email }}</td>
                                    <td>
                                        <a href="{{ route('admin.branch.edit',$branch->id)}} " class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i> </a>
                                        <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $branch->id}}').submit();" class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i> </a>
                                        <form action="{{ route('admin.branch.delete',$branch->id)}} " style="display: none;" method="post" id="delete-form-{{ $branch->id}}">
                                        @csrf
                                        @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $branches->links() }}
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