@extends('layouts.auth')

@section('title', 'Recover Password')


@section('content')
<div class="account-box">
    <div class="card m-b-30">
        <div class="card-body">
            <div class="card-title text-center">
                <img src="{{ asset('home/logo.jpeg') }}" alt="" class="" style="height: 50px">
                <h5 class="mt-3"><b>Your Email Is Not Yet Verified. Check Your Email To Verify Your Email Address. Click The Link To Resend Verification Email</b></h5>
            </div>
            <form class="form mt-5 contact-form" method="POST" action="{{ route('forgot.post') }}">
                @csrf
                <div class="form-group">
                    <div class="col-sm-12 mt-4">
                        <button class="btn btn-success btn-block" type="submit">Resend Verification Email</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
