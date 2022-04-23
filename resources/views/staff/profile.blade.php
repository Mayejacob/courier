@extends('staff.layouts.master')
@section('title','My Profile')

@push('css')
    
@endpush

@section('content')
    
@livewire('staff.member.profile',['user' => $user])

@endsection

@push('js')
    
@endpush