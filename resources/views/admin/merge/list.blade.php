@extends('layouts.admin-dashboard')

@section('title', 'Admin Merge List')

@section('content')

    <livewire:merged-users />

    <livewire:provide-users />

@endsection
