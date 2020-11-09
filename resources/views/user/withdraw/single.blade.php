@extends('layouts.dashboard')

@section('title', 'Withdrawals')

@section('content')
    <livewire:single-withdrawal :id="$providehelp->id" />
@endsection
