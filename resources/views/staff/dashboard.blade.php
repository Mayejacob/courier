@extends('Staff.layouts.master')
@section('title','Dashboard')
@push('css')
    
@endpush

@section('content')

<div class="col-12">
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Track Orders</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        welcome back {{ Auth::user()->username}}
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Ready for work
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</div>

@stop
@push('js')
    
@endpush