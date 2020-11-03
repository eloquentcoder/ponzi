@extends('layouts.admin-dashboard')

@section('title', 'Admins')

@section('content')

<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h5 class="header-title pb-3">Admins Summary</h5>
                @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> {{ session('message') }}
                </div>
            @endif
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-hover m-b-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Activation Status</th>
                                        <th>Withdrawal Count</th>
                                        <th>Withdrawal Count</th>
                                        <th>Withdrawal Count</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $item)
                                    <tr>
                                        <td>{{ $item->full_name }}</td>
                                        <td>{{ $item->phone_number }}</td>
                                        <td>{{ count($item->gethelp) }}</td>

                                    </tr>
                                @empty
                                    <div class="container">
                                        <p style="text-align: center">No Admins Yet</p>
                                    </div>
                                @endforelse
                                </tbody>
                                {{ $admins->links() }}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection