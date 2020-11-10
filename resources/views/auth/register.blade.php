@extends('layouts.auth')


@section('title', 'Register')

@section('content')
<div class="account-box">
    <div class="card m-b-30">
        <div class="card-body">
            <div class="card-title text-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('home/logo.jpeg') }}" alt="" class="" style="height: 50px">
                </a>
            <h5 class="mt-3"><b>Signup for a new Account</b></h5>
            </div>
            @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true"> ×</span></button>
                        {{-- <strong>Snap! </strong>You should check in on some of those fields below. --}}
                            @foreach ($errors->all() as $error)
                                    <li>
                                        <ul>{{ $error }}</ul>
                                    </li>
                            @endforeach
                    </div>
            @endif
            <form class="form mt-5 contact-form" method="POST" action="{{ route('register.post') }}">
                @csrf
                <p style="font-weight: 800">Referred By: {{ $referrer_name ?? 'Green Rich Wide Investment' }}</p>
                <p style="color: #17a2b8">Your details must match the Account Holder name of your bank account in order to process a withdrawal.</p>
                <div class="form-group ">
                    <div class="col-sm-12">
                        <input class="form-control form-control-line" value="{{ old('first_name') }}" name="first_name" type="text" placeholder="First Name" required>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-sm-12">
                        <input class="form-control form-control-line" value="{{ old('middle_name') }}" name="middle_name" type="text" placeholder="Middle Name">
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-sm-12">
                        <input class="form-control form-control-line" name="last_name" value="{{ old('last_name') }}" type="text" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-sm-12">
                        <input class="form-control form-control-line" name="username" value="{{ old('username') }}" type="text" placeholder="Username" required>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-sm-12">
                        <input class="form-control form-control-line" name="email" type="email" value="{{ old('email') }}" placeholder="Email Address" required>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-sm-12">
                        <input class="form-control form-control-line" name="phone_number" type="tel" value="{{ old('phone_number') }}" placeholder="Phone Number" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input class="form-control form-control-line" name="password" type="password" placeholder="Password" required min="8">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input class="form-control form-control-line" name="password_confirmation" type="password" placeholder="Confirm Password" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-12">
                        <label class="cr-styled">
                            <input type="checkbox" required>
                            <i class="fa"></i>
                            I agree to the terms and conditions
                        </label>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-12 mt-4">
                        <button class="btn btn-success btn-block" type="submit">Register</button>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12 mt-4 text-center">
                        <a href="{{ route('login') }}" style="font-weight: 800"> Already Have an Account? <span style="color: blue">Sign In</span></a>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection
