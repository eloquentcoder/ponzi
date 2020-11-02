@extends('layouts.auth')


@section('title', 'Update Bank Details')

@section('content')
<div class="account-box">
    <div class="card m-b-30">
        <div class="card-body">
            <div class="card-title text-center">
                <img src="{{ asset('home/logo.jpeg') }}" alt="" class="" style="height: 50px">
                <h5 class="mt-3"><b>Update Bank Details</b></h5>
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
            <form class="form mt-5 contact-form" action="{{ route('account.post') }}" method="POST">
                @csrf
                <div class="form-group ">
                    <div class="col-sm-12">
                        <input type="number" class="form-control form-control-line" value="{{ old('account_details') }}" name="account_details" type="text" placeholder="Enter Account Number" required>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-sm-12">
                        <select class="form-control form-control-line" name="bank_name"  required>
                                <option value="">-- Select Bank --</option>
                            @foreach ($banks as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-sm-12">
                        <input class="form-control form-control-line" type="text" name="account_name" placeholder="Enter Account Name" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12 mt-4">
                        <button class="btn btn-success btn-block" type="submit">Update</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection
