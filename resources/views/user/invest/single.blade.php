@extends('layouts.dashboard')

@section('title', 'Make Investment')

@section('content')
    <livewire:single-investment :id="$id" />
@endsection
