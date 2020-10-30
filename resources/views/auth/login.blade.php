@extends('layouts.auth')


@section('title', 'Login')

@section('content')
<div class="account-box">
    <div class="card m-b-30">
        <div class="card-body">
            <div class="card-title text-center">
                <img src="{{ asset('home/logo.jpeg') }}" alt="" class="" style="height: 50px">
                <h5 class="mt-3"><b>Welcome to Greenrichwide Investment</b></h5>
            </div>
            @if (session('error'))
                <div style="text-align: center;
                font-size: 17px;
                font-weight: 700;
                color: red;">
                    {{ session('error') }}
                </div>
            @endif
            <form class="form mt-5 contact-form" action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="form-group ">
                    <div class="col-sm-12">
                        <input class="form-control form-control-line" value="{{ old('email') }}" name="email" type="email" placeholder="Email Address" required>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-sm-12">
                        <input class="form-control form-control-line" type="password" name="password" placeholder="Password" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-12">
                        <label class="cr-styled">
                            <input type="checkbox" checked>
                            <i class="fa"></i>
                            Remember me
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <a href="{{ route('forgot-password') }}"><i class="fa fa-lock m-r-5"></i> Forgot password?</a>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12 mt-4">
                        <button class="btn btn-success btn-block" type="submit">Log In</button>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12 mt-4 text-center">
                        <a href="{{ route('register') }}"> Don't Have an Account? Sign up</a>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection
