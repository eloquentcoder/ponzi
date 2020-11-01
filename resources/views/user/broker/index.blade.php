@extends('layouts.dashboard')

@section('title', 'Become A Broker')

@section('content')

<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card text-center bg-white m-b-30">
            <div class="card-header">
                Become A Broker
            </div>
            <div class="card-body">
                @if (auth()->user()->is_broker == 0)
                    <h5 class="card-title">You can also earn money with or without investing through Broker bonuses. You become a Broker by applying to become a broker your user dashboard, then you can share your refferal link.
                        In Greenrichwide you earn 2% of your refferal's Investments as a bonus. You can withdraw your referral bonuses at N5,000 minimum only when you have no less than 15 referrals.</h5>
                    <a href="{{ route('dashboard') }}" onclick="event.preventDefault(); document.getElementById('broker-frm').submit();" class="btn btn-success btn-lg">Apply</a>
                    <form id="broker-frm" action="{{ route('broker.apply') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                <h5 class="card-title">You Are Already A Broker. Start sharing your referral link to earn.</h5>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection
