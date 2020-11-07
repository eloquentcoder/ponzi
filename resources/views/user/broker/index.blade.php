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
                            <h5 class="card-title">You can also make money without investment by becoming a broker.
                                A Broker earn commissions based on the following calculations:<br>
                                BASIC: This requires a maximum of 15 referrals. Broker get 2% of each investment made by their Basic Level referrals (withdrawable at maximum referrals).<br>
                                PREMIUM: This requires a maximum of 65 referrals. Broker get 3% of each investment made by their Premium Level referrals. (withdrawable at maximum referrals).<br>
                                VIP: This requires a minimum of 66 referrals and above. Broker get 5% of each investment made by their VIP Level referrals.
                                Kindly click the button below to apply.</h5>
                            <a href="{{ route('dashboard') }}" onclick="event.preventDefault(); document.getElementById('broker-frm').submit();" class="btn btn-success btn-lg">Apply</a>
                            <form id="broker-frm" action="{{ route('broker.apply') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                    </div>
            </div>
        </div>
    @else
    <div class="col-lg-12 col-sm-12">
        <div class="card text-center bg-white m-b-30">
            <div class="card-header">
                Broker's Referral Link
            </div>
            <div class="card-body">
                <h5 class="card-title"><span style="color: aqua">Congratulations! You are now a broker!</span><br><br>
                    <span>{{ auth()->user()->referral_link }}</span></h5>
                {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-sm-12">
        <livewire:broker-stat-boxes />
    </div>
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
                                        <th>Bonus</th>
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
                                        @if (count(auth()->user()->referrals) >= 60)
                                            <td>{{ $item->amount * 0.05 }}</td>
                                        @endif
                                        @if (count(auth()->user()->referrals) >= 15 && count(auth()->user()->referrals)  <= 60)
                                            <td>{{ $item->amount * 0.03 }}</td>
                                        @endif
                                        @if (count(auth()->user()->referrals) <= 15)
                                            <td>{{ $item->amount * 0.02 }}</td>
                                        @endif

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
