@extends('layouts.home')

@section('title', 'About Us')

@section('content')


<div class="page-header" data-parallax="true" style="background: linear-gradient( rgba(16, 201, 10, 0.5), rgba(16, 201, 10, 0.5) ), url({{ asset('home/banner.jpg') }}); min-height: 400px;">
    <div class="filter"></div>
    <div class="container">
      <div class="motto text-center">
        <h1 style="font-weight: 800">About Us</h1>
      </div>
    </div>
</div>

<div class="section landing-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="text-center" style="font-weight: 900; font-size: 19px;">🇬 🇷 🇪 🇪 🇳 🇷 🇮 🇨 🇭 WIDE is a global Person to Person financial platform where users get 50% of their Investment in 5 days.</h2><br>
          <br>
          <div class="row">
            <div class="col-md-12">
              <div class="info">
                <div class="description">
                  <h4 class="info-title" style="font-size: 25px; font-weight: 800;">How Does GreenRich Wide Investment Work?</h4>
                  <p class="description" style="color: darkgreen;">Users of this platform can either be investors, Broker's or both.
                    An investor is required to invest a minimum of ₦5,000 and maximum of ₦500,000.
                   A broker gains continuous bonus from the investment of their downlines.</p>
                  {{-- <p class="description" style="color: black;">To connect people that shares similar ideas and orientation in making the world financially stable.</p> --}}
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="info">
                <div class="description">
                  <h4 class="info-title" style="font-size: 25px; font-weight: 800;">How Long Does It Take To Be Merged?</h4>
                  <p class="description" style="color: darkgreen;">Merging takes place within the 24hours of provide help or get help. Investors are given 24hours to make payments or confirm payment (Failure to do this will lead to account suspension).</p>
                </div>
              </div>
            </div>
            <div class="col-md-12">
                <div class="info">
                  <div class="description">
                    <h4 class="info-title" style="font-size: 25px; font-weight: 800;">How Does My Investment Grow?</h4>
                    <p class="description" style="color: darkgreen;">Once you invest your investment starts growing from day one. Here is how your investment grows.</p>
                    <li style="color: darkgreen; font-weight: 600">Day 1 = 2%</li>
                    <li style="color: darkgreen; font-weight: 600">Day 2 = 6%</li>
                    <li style="color: darkgreen; font-weight: 600">Day 3 = 15%</li>
                    <li style="color: darkgreen; font-weight: 600">Day 4 = 30%</li>
                    <li style="color: darkgreen; font-weight: 600">Day 5 = 50%</li> <br>
                    <span style="color: darkgreen">Your investment stops growing at day five. A withdrawal button shall pop up for withdraw.</span>
                  </div>
                </div>
              </div>
            <div class="col-md-12">
                <div class="info">
                  <div class="description">
                    <h4 class="info-title" style="font-size: 25px; font-weight: 800;">How Do I Make Payment?</h4>
                    <p class="description" style="color: darkgreen;">You are required to make payment only to the account details that appear on your Merged List, through USSD, BANK DEPOSIT, POS or MOBILE TRANSFER to begin your investment.</p>
                  </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="info">
                  <div class="description">
                    <h4 class="info-title" style="font-size: 25px; font-weight: 800;">When Do I Get Paid & How?</h4>
                    <p class="description" style="color: darkgreen;">To get paid, your investment must be COMPLETE after which, you request for your payment by clicking on the Withdrawal Button, an investor would be merged to pay you which will be displayed on your Merged List.</p>
                  </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="info">
                  <div class="description">
                    <h4 class="info-title" style="font-size: 25px; font-weight: 800;">What Do I Gain From Being A Broker?</h4>
                    <p class="description" style="color: darkgreen;">A Broker earn commissions based on the following calculations:</p><br>
                    <span style="color: darkgreen">BASIC: This requires a maximum of 15 referrals. Broker get 2% of each investment made by their Basic Level referrals (withdrawable at maximum referrals).<br><br>
                    PREMIUM: This requires a maximum of 65 referrals. Broker get 3% of each investment made by their Premium Level referrals. (withdrawable at maximum referrals).<br><br>
                    VIP: This requires a minimum of 66 referrals and above. Broker get 5% of each investment made by their VIP Level referrals.<br><br></span>
                  </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="info">
                  <div class="description">
                    <h4 class="info-title" style="font-size: 25px; font-weight: 800;">Do I Need To Invest To Become A Broker?</h4>
                    <p class="description" style="color: darkgreen;">You can apply to become a Broker after your registration.
                        Note: You can become both a Broker and an investor.</p>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
