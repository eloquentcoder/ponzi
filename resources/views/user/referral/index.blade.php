@extends('layouts.dashboard')

@section('title', 'Referral List')

@section('content')

    <livewire:stat-boxes />

    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3">Referrals Summary</h5>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Investment Count</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($referrals as $item)
                                        <tr>
                                            <td>{{ $item->full_name }}</td>
                                            <td>{{ $item->phone_number }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ count($item->gethelp) }}</td>
                                        </tr>
                                    @empty
                                        <div class="container">
                                            <p style="text-align: center">No Referrals Yet</p>
                                        </div>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
