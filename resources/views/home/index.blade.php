@extends('layouts.home')

@section('title', 'Home')

@section('content')

   <div class="page-header" data-parallax="true" style="background: linear-gradient( rgba(16, 201, 10, 0.5), rgba(16, 201, 10, 0.5) ), url({{ asset('home/banner.jpg') }}) no-repeat; background-size: cover;">
    <div class="filter"></div>
    <div class="container">
      <div class="motto text-center">
        <h1 style="font-weight: 800">Welcome: <br> Green Rich Wide Investment</h1>
        <h3 style="font-weight: 700">Offers you daily growth of your INVESTMENT <br>(cashable every 5 days).</h3>
        <br />
        <a href="{{ route('register') }}" class="btn btn-outline-neutral btn-round"><i class="fa fa-play"></i>Get Started</a>
        <a type="button" href="{{ route('about') }}" class="btn btn-outline-neutral btn-round">Read More</a>
      </div>
    </div>
  </div>
  <div class="main" id="about">
    <div class="section text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title" style="font-weight: 800">Your Key To Financial Freedom</h2>
            <h5 class="description" style="font-weight: 700">Green Rich Wide Investment is a global community, welcoming people from every discipline and culture, we thrive to reach out to people across the globe with the aim of freeing the world from financial crisis.</h5>
            <br>
            <a href="{{ route('about') }}" class="btn btn-success btn-round">See Details</a>
          </div>
        </div>
        <br/>
        <br/>
        <div class="row">
          <div class="col-md-6">
            <div class="info">
              <div class="icon icon-success">
                <i class="nc-icon nc-album-2"></i>
              </div>
              <div class="description">
                <h4 class="info-title" style="font-size: 25px; font-weight: 800;">Vision Statement</h4>
                <p class="description" style="color: black; font-weight: 600">To increase financial opportunities and income through a viable system that provides essential services and linkage.</p>
                <p class="description" style="color: black; font-weight: 600">To connect people that shares similar ideas and orientation in making the world financially stable.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info">
              <div class="icon icon-success">
                <i class="nc-icon nc-bulb-63"></i>
              </div>
              <div class="description">
                <h4 class="info-title" style="font-size: 25px; font-weight: 800;">Mission Statement</h4>
                <p class="description" style="color: black; font-weight: 600">Green Rich Wide Investment is a "stress free" financial platform that can be operated from anywhere.
                    We passionately believe in the power of ideas, to change lives and connect people with similar interest.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section section-dark">
        <div class="container">
          <div class="row">
            <div class="col-md-8 ml-auto mr-auto text-center">
              <h2 class="title" style="font-size: 25px; font-weight: 800;">Attention!!</h2>
              <p class="description">In other to address the issue of merging too many little investors to pay one huge investor, which usually lead to over merging and slowing of withdrawal process, we have decided to create specific investment  packages. This, we hope to serve you better.
                <br>Thank you.</p>
            </div>
          </div>
        </div>
    </div>
    <div class="section text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="info">
              <div class="icon">
                <i class="nc-icon nc-badge"></i>
              </div>
              <div class="description">
                <h4 class="info-title" style="font-size: 25px; font-weight: 800;">Total Investors</h4>
                <p class="description" style="font-size: 18px; font-weight: 800;">{{913 + $investors }}</p>
                {{-- <p class="description">To connect people that shares similar ideas and orientation in making the world financially stable.</p> --}}
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <div class="icon">
                <i class="nc-icon nc-circle-10"></i>
              </div>
              <div class="description">
                <h4 class="info-title" style="font-size: 25px; font-weight: 800;">Total Brokers</h4>
                <p style="font-size: 18px; font-weight: 800;">{{462 + $brokers}}</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <div class="icon">
                <i class="nc-icon nc-bulb-63"></i>
              </div>
              <div class="description">
                <h4 class="info-title" style="font-size: 25px; font-weight: 800;">Total Transactions</h4>
                <p style="font-size: 18px; font-weight: 800;">{{2824 + $transactions}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section section-dark text-center">
      <div class="container">
        <h2 class="title" style="font-weight: 800">Testimonies</h2>
        <div class="row">
          <div class="col-md-4">
            <div class="card card-profile card-plain">
              <div class="card-avatar">
                <a href="#avatar">
                  <img src="{{ asset('flag.jpg') }}" alt="...">
                </a>
              </div>
              <div class="card-body">
                <a href="#paper-kit">
                  <div class="author">
                    <h4 class="card-title">Judith Egwoyi
                    </h4>
                    <h5 class="card-category">Green Rich Wide Investor</h5>
                    <h6 class="card-category">17th November 2020</h6>
                    <p class="card-category">5:23pm</p>
                  </div>
                </a>
                <p class="card-description text-center">
                    Green rich wide is here to stay, just got my money.<br>
                   <span style="font-weight: 800">WITHDRAWN AMOUNT: ₦15,000</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-profile card-plain">
              <div class="card-avatar">
                <a href="#avatar">
                  <img src="{{ asset('flag.jpg') }}" alt="...">
                </a>
              </div>
              <div class="card-body">
                <a href="#paper-kit">
                  <div class="author">
                    <h4 class="card-title">Suleiman Yahaya</h4>
                    <h5 class="card-category">Green Rich Wide Investor</h5>
                    <h6 class="card-category">17th November 2020</h6>
                    <p class="card-category">3:06pm</p>
                  </div>
                </a>
                <p class="card-description text-center">
                    Thank you green rich. Have collect my first payment. But Please work on the platform it should not be like the old one please.
                  <br>
                   <span style="font-weight: 800">WITHDRAWN AMOUNT: ₦15,000</span>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-profile card-plain">
              <div class="card-avatar">
                <a href="#avatar">
                  <img src="{{ asset('flag.jpg') }}" alt="...">
                </a>
              </div>
              <div class="card-body">
                <a href="#paper-kit">
                  <div class="author">
                    <h4 class="card-title">Emmanuel Francis</h4>
                    <h5 class="card-category">Green Rich Wide Investor</h5>
                    <h6 class="card-category">17th November 2020</h6>
                    <p class="card-category">2:43pm</p>
                  </div>
                </a>
                <p class="card-description text-center">
                    This is real I encourage you all to invest. Thanks Greenrichwide<br>
                    <span style="font-weight: 800">WITHDRAWN AMOUNT: ₦45,000</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section text-center">
        <div class="container">
          <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
              <h2 class="title" style="font-weight: 800">How it works</h2>
              <h5 class="description" style="color: black; font-weight: 600">
                You can make money in two ways:<br>
                <li>Be an investor</li>
                <li>Be a broker</li>
                <br>
                Note: You can become both an investor and a broker.
              </h5>
              <br>
            </div>
          </div>
          <br/>
          <br/>
          <div class="row">
            <div class="col-md-6">
              <div class="info">
                <div class="icon icon-success">
                  <i class="nc-icon nc-bank"></i>
                </div>
                <div class="description">
                  <h4 class="info-title" style="font-size: 25px; font-weight: 800;">Become An Investor</h4>
                  <p class="description" style="color: black; font-weight: 600">
                      <br>
                    Minimum investment: ₦5,000<br>
                    Maximum investment: ₦500,000<br><br>
                    Once you've invested, your money starts growing from 24 hours:<br><br>
                    <li style="color: black; font-weight: 600">Day 1 = 2%</li>
                    <li style="color: black; font-weight: 600">Day 2 = 6%</li>
                    <li style="color: black; font-weight: 600">Day 3 = 15%</li>
                    <li style="color: black; font-weight: 600">Day 4 = 30%</li>
                    <li style="color: black; font-weight: 600">Day 5 = 50%</li> <br><br>
                    {{-- <p class="description" style="color: black; font-weight: 600">After Day 5, your investment stops growing at 50%<br>
                    Make payment only to bank account details that appears on your Merged List
                    24 hours to make payment after been merged <span style="color: red">(if not your account will be suspended!)</span>
                    Make withdrawal anytime after 24 hours of your investment</p> --}}
                    <p class="description" style="color: black; font-weight: 600">* After Day 5, your investment stops growing at 50%.
                        * Make payment only to the bank account details that appears on your Merged List.
                        * You have 24 hours to make payment after been merged <span style="color: red">(if not your account will be suspended!)</span>. Note: You can only make withdraw after when your investment is fully mature.</p>
                 </p>
                  {{-- <p class="description">To connect people that shares similar ideas and orientation in making the world financially stable.</p> --}}
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info">
                <div class="icon icon-success">
                  <i class="nc-icon nc-briefcase-24"></i>
                </div>
                <div class="description">
                  <h4 class="info-title" style="font-size: 25px; font-weight: 800;">Become A Broker</h4>
                  <p class="description" style="color: black; font-weight: 600">
                    <br>
                    <div class="description" style="color: black; font-weight: 600">You can also make money without investment by becoming a broker.<br>
                    A Broker earn commissions based on the following calculations:<br></div>
                    <li style="color: black; font-weight: 600">Basic   This requires a maximum of 15 referrals. Broker get 2% of each investment made by their Basic Level referrals (withdrawable at maximum referrals).</li>
                    <li style="color: black; font-weight: 600">Premium   This requires a maximum of 65 referrals. Broker get 3% of each investment made by their Premium Level referrals. (withdrawable at maximum referrals).</li>
                    <li style="color: black; font-weight: 600"> VIP   This requires a minimum of 66 referrals and above. Broker get 5% of each investment made by their VIP Level referrals.</li>

               </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>

@endsection

