@extends('layouts.auth')

@section('title', 'Reset Password')


@section('content')
<div class="account-box">
    <div class="card m-b-30">
        <div class="card-body">
            <div class="card-title text-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('home/logo.jpeg') }}" alt="" class="" style="height: 50px">
                </a>
                <h5 class="mt-3"><b>Change Your Password</b></h5>
            </div>
            @if (session('email'))
                <div style="text-align: center;
                font-size: 17px;
                font-weight: 700;
                color: red;">
                    {{ session('email') }}
                </div>
            @endif
            @if (session('status'))
                <div style="text-align: center;
                font-size: 17px;
                font-weight: 700;
                color: green;">
                    {{ session('status') }}
                </div>
            @endif
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
            <form class="form mt-5 contact-form" method="POST" action="{{ route('reset-password.post') }}">
                <input type="hidden" name="token" value="{{ $token }}">
                @csrf
                <div class="form-group ">
                    <div class="col-sm-12">
                        <input class="form-control form-control-line" type="email" name="email" placeholder="Enter Email Address" required>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-sm-12">
                        <input class="form-control form-control-line" type="password" name="password" placeholder="Enter Password" required>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-sm-12">
                        <input class="form-control form-control-line" type="password" name="password_confirmation" placeholder="Enter Email Address" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 mt-4">
                        <button class="btn btn-success btn-block" type="submit">Recover Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
