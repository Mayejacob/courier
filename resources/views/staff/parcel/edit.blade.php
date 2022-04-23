@extends('staff.layouts.master')
@section('title','Edit Parcel')

@push('css')
    
@endpush

@section('content')

@livewire('staff.parcel.edit',['parcel' => $parcel])
@endsection

@push('js')

@endpush