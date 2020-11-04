

@extends('layouts.auth')


@section('title', 'User Restricted')

@section('content')
<div class="account-box">
    <div class="card m-b-30">
        <div class="card-body">
            <div class="card-title text-center">
                <p style="color: red; font-weight: 900">Your account has been suspended.  Contact the admin through whatsapp on 09022209254 or send an email to customerservicegreenrichinvest@gmail.com.</p>
                <a href="#" class="btn btn-sm btn-success" onclick="event.preventDefault(); document.getElementById('logout-frm').submit();">Logout</a>
                <form id="logout-frm" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
    </div>
</div>
@endsection
