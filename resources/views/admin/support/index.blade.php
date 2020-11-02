@extends('layouts.admin-dashboard')

@section('title', 'Admin Support Tickets')

@section('content')

<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h5 class="header-title pb-3">Tickets Summary</h5>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-hover m-b-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Location</th>
                                        <th>Body</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($supports as $item)
                                    <tr>
                                        <td>{{ $item->full_name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->user_id ? 'Homepage' : 'Dashboard'  }}</td>
                                        <td>{{ $item->body }}</td>
                                @empty
                                    <div class="container">
                                        <p style="text-align: center">No Tickets Yet</p>
                                    </div>
                                @endforelse
                                </tbody>
                                {{ $supports->links() }}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
