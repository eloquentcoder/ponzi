@extends('layouts.home')

@section('title', 'Home')

@section('content')

   <div class="page-header" data-parallax="true" style="background: linear-gradient( rgba(16, 201, 10, 0.5), rgba(16, 201, 10, 0.5) ), url({{ asset('home/banner.jpg') }}) no-repeat; background-size: cover;">
    <div class="filter"></div>
    <div class="container">
      <div class="motto text-center">
        <h1 style="font-weight: 800">Welcome To Greenrichwide Investment</h1>
        <h3 style="font-weight: 700">We offer you daily growth of your INVESTMENT <del>(cashable every 24 Hours).</del></h3>
        <br />
        <a href="{{ route('register') }}" class="btn btn-outline-neutral btn-round"><i class="fa fa-play"></i>Get Started</a>
        <button type="button" class="btn btn-outline-neutral btn-round">Read More</button>
      </div>
    </div>
  </div>
  <div class="main">
    <div class="section text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title" style="font-weight: 800">Your Key To Financial Freedom</h2>
            <h5 class="description" style="font-weight: 500">Greenrichwide Investment is a global community, welcoming people from every discipline and culture, we thrive to reach out to people across the globe with the aim of freeing the world from financial crisis.</h5>
            <br>
            <a href="#paper-kit" class="btn btn-success btn-round">See Details</a>
          </div>
        </div>
        <br/>
        <br/>
        <div class="row" id="about">
          <div class="col-md-6">
            <div class="info">
              <div class="icon icon-success">
                <i class="nc-icon nc-album-2"></i>
              </div>
              <div class="description">
                <h4 class="info-title">Vision Statement</h4>
                <p class="description">To increase financial opportunities and income through a viable system that provides essential services and linkage.</p>
                <p class="description">To connect people that shares similar ideas and orientation in making the world financially stable.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="info">
              <div class="icon icon-success">
                <i class="nc-icon nc-bulb-63"></i>
              </div>
              <div class="description">
                <h4 class="info-title">Mission Statement</h4>
                <p>Greenrichwide Investment is a "stress free" financial platform that can be operated from anywhere.
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
              <h2 class="title">Attention!!</h2>
              <p class="description">In other to address the issue of merging too many little investors to pay one huge investor, which usually lead to over merging and slowing of withdrawal process, we have decided to create specific investment  packages. This, we hope to serve you better.
                <br>Thanks you</p>
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
                <h4 class="info-title">Total Investors</h4>
                <p class="description">30</p>
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
                <h4 class="info-title">Total Brokers</h4>
                <p>10</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <div class="icon">
                <i class="nc-icon nc-bulb-63"></i>
              </div>
              <div class="description">
                <h4 class="info-title">Total Transactions</h4>
                <p>42</p>
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
                  <img src="{{ asset('home/default.jpg') }}" alt="...">
                </a>
              </div>
              <div class="card-body">
                <a href="#paper-kit">
                  <div class="author">
                    <h4 class="card-title">Alexander Obayomi</h4>
                    <h6 class="card-category">Greenrichwide Investor</h6>
                  </div>
                </a>
                <p class="card-description text-center">
                    Thank you green life investment. More grace
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-profile card-plain">
              <div class="card-avatar">
                <a href="#avatar">
                  <img src="{{ asset('home/default.jpg') }}" alt="...">
                </a>
              </div>
              <div class="card-body">
                <a href="#paper-kit">
                  <div class="author">
                    <h4 class="card-title">Ejimkonye Roxy</h4>
                    <h6 class="card-category">Greenrichwide Investor</h6>
                  </div>
                </a>
                <p class="card-description text-center">
                    Indeed Greenrichwide is a wonderful platform I have now faith in them I just received #7500 today , 06-08-2020
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-profile card-plain">
              <div class="card-avatar">
                <a href="#avatar">
                  <img src="{{ asset('home/default.jpg') }}" alt="...">
                </a>
              </div>
              <div class="card-body">
                <a href="#paper-kit">
                  <div class="author">
                    <h4 class="card-title">Destiny David</h4>
                    <h6 class="card-category">Greenrichwide Investor</h6>
                  </div>
                </a>
                <p class="card-description text-center">
                    Reliable and trustworthy. Thanks to Greenwich investment
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
              <h5 class="description">
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
                  <h4 class="info-title">Become An Investor</h4>
                  <p class="description">
                      <br>
                    Minimum investment: ₦100,000<br>
                    Maximum investment: ₦1,000,000<br><br>
                    Once you've invested, your money starts growing from 24 hours:<br><br>
                    <li>Day 1 = 2%</li>
                    <li>Day 2 = 6%</li>
                    <li>Day 3 = 15%</li>
                    <li>Day 4 = 30%</li>
                    <li>Day 5 = 50%</li> <br><br>
                    After Day 5, your investment stops growing at 50%<br>
                    Make payment only to bank account details that appears on your Merged List
                    24 hours to make payment after been merged <span style="color: red">(if not your account will be suspended!)</span>
                    Make withdrawal anytime after 24 hours of your investment
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
                  <h4 class="info-title">Become A Broker</h4>
                  <p class="description">
                    <br>
                    You can also make money without investment by becoming a broker.<br>
                    A Broker earn commissions based on the following calculations:<br>
                    <li>Basic   This requires a maximum of 15 referrals. Broker get 2% of each investment made by their Basic Level referrals (withdrawable at maximum referrals).</li>
                    <li>Premium   This requires a maximum of 65 referrals. Broker get 3% of each investment made by their Premium Level referrals. (withdrawable at maximum referrals).</li>
                    <li>VIP   This requires a minimum of 66 referrals and above. Broker get 5% of each investment made by their VIP Level referrals.</li>

               </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>

@endsection

