@extends('admin.layouts.master')
@section('title','Edit Existing Branch')
@push('css')
    
@endpush

@section('content')

@livewire('admin.branch.edit',['branch' => $branch])







@endsection
@push('js')
    
@endpush