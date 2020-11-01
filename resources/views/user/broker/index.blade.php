@extends('layouts.dashboard')

@section('title', 'Become A Broker')

@section('content')

<div class="row">
    @if (auth()->user()->is_broker == 0)
        <div class="col-lg-12 col-sm-12">
            <div class="card text-center bg-white m-b-30">
                <div class="card-header">
                    Become A Broker
                </div>
                    <div class="card-body">
                            <h5 class="card-title">You can also earn money with or without investing through Broker bonuses. You become a Broker by applying to become a broker your user dashboard, then you can share your refferal link.
                                In Greenrichwide you earn 2% of your refferal's Investments as a bonus. You can withdraw your referral bonuses at N5,000 minimum only when you have no less than 15 referrals.</h5>
                            <a href="{{ route('dashboard') }}" onclick="event.preventDefault(); document.getElementById('broker-frm').submit();" class="btn btn-success btn-lg">Apply</a>
                            <form id="broker-frm" action="{{ route('broker.apply') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                    </div>
            </div>
        </div>
    @else
    <div class="col-lg-12 col-sm-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h5 class="header-title pb-3" style="display: flex; justify-content: space-between;">
                    Broker Summary
                    <a class="btn btn-success btn-sm text-white" href="{{ route('referrals.withdraw') }}">Withdraw Funds</a>
                </h5>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-hover m-b-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($help as $item)
                                    <tr>
                                        <td>{{ $item->user->full_name }}</td>
                                        <td>{{ $item->user->phone_number }}</td>
                                        <td>{{ $item->user->email }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ 'Processed' }}</td>
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


    @endif
</div>

@endsection
