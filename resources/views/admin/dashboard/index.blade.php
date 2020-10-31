@extends('layouts.admin-dashboard')

@section('title', 'Admin Dashboard')

@section('content')

    <livewire:admin.stat-boxes />
    <livewire:merged-users />
    <livewire:provide-users />
    @if ($gethelp)
    <livewire:amount />
    @endif


@endsection
