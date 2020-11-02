@extends('layouts.admin-dashboard')

@section('title', 'Admin Testimonies')

@section('content')

<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h5 class="header-title pb-3">Testimonies Summary</h5>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-hover m-b-0">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Testimonies</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($testimonies as $item)
                                    <tr>
                                        <td>{{ $item->user->full_name }}</td>
                                        <td>{{ $item->body  }}</td>
                                @empty
                                    <div class="container">
                                        <p style="text-align: center">No Testimonies Yet</p>
                                    </div>
                                @endforelse
                                </tbody>
                                {{ $testimonies->links() }}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
