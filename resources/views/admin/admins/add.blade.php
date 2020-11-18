@extends('layouts.admin-dashboard')

@section('title', 'Add Admin')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h5 class="header-title pb-3">Add Admin</h5>
                <div class="general-label">
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
                    <form role="form" action="{{ route('admin.admins.add.post') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" placeholder="Enter First Name" required>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" name="user_name" class="form-control" value="{{ old('user_name') }}" placeholder="Enter Username" required>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" placeholder="Enter Last Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">Phone Number</label>
                                <input type="tel" name="phone_number" class="form-control" value="{{ old('phone_number') }}" placeholder="Enter Phone Number" required>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">Email Address</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter Email Address" required>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">Is Special</label>
                                <select name="is_special" class="form-control">
                                    <option value=""></option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">Bank Name</label>
                                <select class="form-control" name="bank_name" required>
                                    <option value="">-- Select Bank Name</option>
                                    @foreach ($banks as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">Account Number</label>
                                <input type="number" name="account_details" value="{{ old('account_details') }}" class="form-control" placeholder="Enter Account Details" required>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">Account Name</label>
                                <input type="text" name="account_name" class="form-control" value="{{ old('account_name') }}" placeholder="Enter Account Details" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
