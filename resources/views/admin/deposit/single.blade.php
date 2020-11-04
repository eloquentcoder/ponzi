@extends('layouts.admin-dashboard')

@section('title', 'Investment')

@section('content')
    <livewire:admin.single-investment :id="$id" />
@endsection
