@extends('layouts.admin-dashboard')

@section('title', 'Add Admin')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h5 class="header-title pb-3">Add Admin</h5>
                <div class="general-label">
                    <form role="form" action="{{ route('admin.admins.add') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" required>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" name="user_name" class="form-control" placeholder="Enter Username" required>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">Last Name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Phone Number</label>
                                <input type="tel" name="phone_number" class="form-control" placeholder="Enter Phone Number" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email Address" required>
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
                                <input type="number" name="account_details" class="form-control" placeholder="Enter Account Details" required>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">Account Name</label>
                                <input type="text" name="account_name" class="form-control" placeholder="Enter Account Details" required>
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
