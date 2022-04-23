@extends('admin.layouts.master')
@section('title','Edit Parcel')

@push('css')
    
@endpush

@section('content')

@livewire('admin.parcel.edit',['parcel' => $parcel])
@endsection

@push('js')

@endpush