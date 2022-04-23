@extends('admin.layouts.master')
@section('title','My Profile')

@push('css')
    
@endpush

@section('content')
    
@livewire('admin.member.profile',['user' => $user])

@endsection

@push('js')
    
@endpush