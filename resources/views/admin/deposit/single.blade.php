@extends('layouts.admin-dashboard')

@section('title', 'Investment')

@section('content')
    <livewire:single-investment :id="$id" />
@endsection
