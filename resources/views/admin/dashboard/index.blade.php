@extends('layouts.admin-dashboard')

@section('title', 'Admin Dashboard')

@section('content')
@if (session()->has('message'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> {{ session('message') }}
    </div>
@endif

    <livewire:admin.stat-boxes />
    {{-- <livewire:admin.merged-users /> --}}
    <livewire:provide-users />
     @if ($gethelp)
     <livewire:amount />
     @endif


@endsection
