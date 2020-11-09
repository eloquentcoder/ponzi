@extends('layouts.admin-dashboard')

@section('title', 'Admin Dashboard')

@section('content')
@if (session()->has('message'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ session('message') }}
    </div>
@endif

    <livewire:admin.stat-boxes />
    <livewire:merged-users />
    <livewire:provide-users />
     @if ($gethelp)
     <livewire:amount />
     @endif

    <div class="height" style="height: 40px;"></div>

@endsection
