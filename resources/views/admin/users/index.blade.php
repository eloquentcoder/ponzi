@extends('layouts.admin-dashboard')

@section('title', 'Users')

@section('content')

<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h5 class="header-title pb-3">Users Summary</h5>
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          {{ session('message') }}
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
                                        <th>Suspension Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $item)
                                    <tr>
                                        <td>{{ $item->full_name }}</td>
                                        <td>{{ $item->phone_number }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->activated == 0 ? 'Not Activated' : 'Activated' }}</td>
                                        <td>{{ $item->is_restricted == 0 ? 'Active' : 'Suspended' }}</td>
                                        <td style="white-space: nowrap; width: 15%;"><div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                            <div class="btn-group btn-group-sm" style="float: none;">
                                                <button type="button" title="toggle suspension" class="tabledit-edit-button btn btn-sm btn-info" onclick="event.preventDefault(); document.getElementById('suspend-frm{{$item->id}}').submit();" style="float: none; margin: 5px;">
                                                    <span class="ti-cut"></span>
                                                </button>
                                                <form id="suspend-frm{{$item->id}}" action="{{ route('admin.user.suspend', $item->id) }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}

                                                </form>
                                                <button type="button" class="tabledit-delete-button btn btn-sm btn-info" style="float: none; margin: 5px;">
                                                    <span class="ti-trash"></span>
                                                </button>
                                            </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="container">
                                        <p style="text-align: center">No Users Yet</p>
                                    </div>
                                @endforelse
                                </tbody>
                                {{ $users->links() }}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
