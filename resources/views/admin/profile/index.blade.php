@extends('layouts.admin-dashboard')

@section('title', 'Profile')

@section('content')

<div class="container-fluid">
    <div class="page-head"></div>
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card-title tab-2">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active show" href="#about" data-toggle="tab" aria-expanded="false"><i class="ti-user mr-2"></i>About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#settings" data-toggle="tab" aria-expanded="false"><i class="ti-settings mr-2"></i>Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#password" data-toggle="tab" aria-expanded="false"><i class="ti-split-v-alt mr-2"></i>Password</a>
                            </li>
                        </ul>
                        <div class="tab-content p-4 bg-white">
                            <div class="tab-pane p-4 active show" id="about">
                                <div class="row justify-content-center">
                                    <div class="col-md-12  profile-detail">
                                        <div class="text-center">
                                            <i class="fa fa-graduation-cap"></i>
                                            <h5>Personal Details</h5>
                                            <div class="profile-border my-3"></div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col-md-12">
                                                <div class="presonal-inform">
                                                    <ul class="list-unstyled">
                                                        <li><b>Name:</b>{{ auth()->user()->full_name }}</li>
                                                        <li><b>Phone:</b>{{ auth()->user()->phone_number }}</li>
                                                        <li><b>Email:</b>{{ auth()->user()->email }}</li>
                                                        <li><b>Username:</b>{{ auth()->user()->user_name }}</li>
                                                        <li><b>Account Number:</b>{{ auth()->user()->account_details }}</li>
                                                        <li><b>Bank Details:</b>{{ auth()->user()->bank_name }}</li>
                                                        <li><b>Account Name:</b>{{ auth()->user()->account_name }}</li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!--END ROW-->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="settings">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="card-body">
                                            @if (session()->has('message'))
                                                <div class="alert alert-success alert-dismissible">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                      {{ session('message') }}
                                                </div>
                                            @endif
                                            <form class="form-horizontal form-material" method="POST" action="{{ route('admin.post.profile') }}">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <input type="text" placeholder="First Name" class="form-control form-control-line" name="first_name" value="{{ auth()->user()->first_name }}" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" placeholder="Last Name" class="form-control form-control-line" name="last_name" value="{{ auth()->user()->last_name }}" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <input type="email" placeholder="Email" class="form-control form-control-line" name="email" value="{{ auth()->user()->email }}" disabled>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="tel" placeholder="Phone No" name="phone_number" value="{{ auth()->user()->phone_number }}" class="form-control form-control-line" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="Username" name="user_name" value="{{ auth()->user()->user_name }}" class="form-control form-control-line" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="Account Name" class="form-control form-control-line" name="account_name" value="{{ auth()->user()->account_name }}" disabled>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="Bank Name" name="bank_name" value="{{ auth()->user()->bank_name }}" class="form-control form-control-line" disabled>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" placeholder="Account Number" name="account_details" value="{{ auth()->user()->account_details }}" class="form-control form-control-line" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-info" type="submit">Update Profile</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="password">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="card-body">
                                            <form class="form-horizontal form-material" method="POST" action="{{ route('admin.password.profile') }}">
                                                @if (session()->has('message_password'))
                                                    <div class="alert alert-success alert-dismissible">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                          {{ session('message_password') }}
                                                    </div>
                                                @endif
                                                @if (session()->has('error'))
                                                    <div class="alert alert-success alert-dismissible">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                          {{ session('error') }}
                                                    </div>
                                                @endif
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <input type="password" placeholder="Old Password" class="form-control form-control-line" required name="old_password">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="password" placeholder="New Password" class="form-control form-control-line" required name="password">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="password" placeholder="Confirm Password" class="form-control form-control-line" required name="password_confirmation">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn btn-info">Update Profile</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
        </div>
    </div><!--end row-->

</div>

@endsection
