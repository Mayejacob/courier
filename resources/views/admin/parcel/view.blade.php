@extends('admin.layouts.master')
@section('title','View Parcel Details')
@push('css')
    
@endpush
@section('content')
<div class="col-12">
    <div class="callout callout-info">
      <h5><i class="fas fa-info"></i> Note:</h5>
      This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
    </div>


    <!-- Main content -->
    <div class="invoice p-3 mb-3">
      <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h4>
            <i class="fas fa-globe"></i> <b>Reference Number:</b>
            <small class="">{{ $parcel->reference_number}}</small>
          </h4>
          <hr>
          <div class="row mb-3">
            <div class="col-6">
              <b> Item Neme: {{ $parcel->item_name}}</b>
            </div>
            <div class="col-6">
              <b>Item Type: {{ $parcel->item_type}}</b>
            </div>
          </div>
          <hr>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Name:</strong> {{ $parcel->sender_name}}<br>
            <strong>Contact:</strong> {{ $parcel->sender_contact}}<br>
            <strong>Address:</strong> <br>
            {{ $parcel->sender_address}}<br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong>Name:</strong> {{ $parcel->recipient_name}}<br>
            <strong>Contact:</strong> {{ $parcel->recipient_contact}}<br>
            <strong>Address:</strong> <br>
            {{ $parcel->recipient_address}}<br>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col  mb-3">
          <b>Invoice ID: {{ $parcel->reference_number}}</b><br>
          <br>
          <b>Payment Mode:</b> Cash<br>
          <b>Account:</b> 1130619332<br>
          <b>Type: {{ $parcel->type}}</b><br>
          <b class="text-primary">Status: {{ $parcel->status}}</b><br>
        </div>
        <!-- /.col -->
      </div>
      <hr>
      <!-- /.row -->

      <div class="col-12 invoice-col  mb-3">
        <b>Branch Processed: {{ $parcel->from_branch_id}}</b><br>
        @if ($parcel->type == 'Pickup')
         <b class="text-primary"> Nearest Branch to Recipient for Pickup</b><br>
         <b class="text-secondary">Next Branch: {{ $parcel->to_branch_id}}</b><br>
        @elseif($parcel->type == 'Delivered')
          <b class="text-success">Delivered client address successfully</b>
        @else
          <b class="text-primary">Parcel in Transit</b>
        @endif
      </div>
      <!-- Table row -->
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Weight (KG)</th>
              <th>Height</th>
              <th>Width</th>
              <th>Lenght</th>
              <th>Price (N)</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>{{ $parcel->weight}} KG</td>
              <td>{{ $parcel->height}} inches</td>
              <td>{{ $parcel->weight}} inches</td>
              <td>{{ $parcel->length}} inches</td>
              <td>{{ number_format($parcel->price)}}</td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- /.row -->
      <div class="row no-print">
        <div class="col-12">
          <a href="{{ route('admin.parcel')}} " class="btn btn-secondary"> Back</a>
          <a href="{{ route('admin.parcel.edit',$parcel->id)}} " class="btn btn-primary float-right"><i class="far fa-edit"></i> Update Status
          </a>
          <a href="#" class="btn btn-default float-right" style="margin-right: 5px;">
            <i class="fas fa-print"></i> Print
          </a>
        </div>
      </div>
    </div>
    <!-- /.invoice -->
  </div>
@endsection

@push('js')
    
@endpush