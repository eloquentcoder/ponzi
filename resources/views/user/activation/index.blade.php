@extends('layouts.dashboard')

@section('title', 'Account Activation')

@section('content')

@if (auth()->user()->activated == 0)
    <livewire:account-activation />
@else
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card text-center bg-white m-b-30">
            <div class="card-header">
                User Activation
            </div>
            <div class="card-body">
                <h5 class="card-title">User has already been activated. Click the button below to go to your dashboard.</h5>
                <a href="{{ route('dashboard') }}" class="btn btn-success btn-lg">Continue To Dashboard</a>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
