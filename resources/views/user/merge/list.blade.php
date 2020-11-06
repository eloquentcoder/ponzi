@extends('layouts.dashboard')

@section('title', 'Merge List')

@section('content')

    <livewire:merged-users />

    <livewire:provide-users />

    <livewire:amount />

@endsection
