<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mannat Themes">
        <meta name="keyword" content="">

        <title>Green Rich Wide Investment | @yield('title')</title>

        <!-- Theme icon -->
        <link rel="shortcut icon" href="{{ asset('home/logo.jpeg') }}">

        <link href="assets/plugins/morris-chart/morris.css" rel="stylesheet">
        <!-- Theme Css -->
        <script src="{{ asset('dashboard/plugin/sweetalert2/dist/sweetalert2.css')}}"></script>
        <link href="{{ asset('dashboard/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{ asset('dashboard/css/slidebars.min.css')}}" rel="stylesheet">
        <link href="{{ asset('dashboard/css/icons.css')}}" rel="stylesheet">
        <link href="{{ asset('dashboard/css/menu.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('dashboard/css/style.css')}}" rel="stylesheet">
        @livewireStyles
        <style>
            .page-head {
                display: flex;
                justify-content: space-between;
            }

            @media(max-width: 768px) {
                .page-head {
                    margin-top: 61px;
                }
            }

            .card-header {
                background: black;
                color: white;
                font-size: 20px;
                font-weight: 700;
            }

        </style>
    </head>

    <body class="sticky-header" style="background-color: darkgreen;">
        <section>
            <!-- sidebar left start-->
            <div class="sidebar-left">
                <div class="sidebar-left-info">

                    <div class="user-box">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('default.jpg') }}" alt="#" class="img-fluid rounded-circle">
                        </div>
                        <div class="text-center text-white mt-2">
                            <h6>{{ auth()->user()->full_name }}</h6>
                            @if (auth()->user()->is_broker == 1)
                                <p class="m-0" style="color: white; font-size: 12px">{{ auth()->user()->referral_link }}</p>
                            @endif
                        </div>
                    </div>

                    <!--sidebar nav start-->
                    <ul class="side-navigation">
                        <li>
                            <h3 class="navigation-title">Navigation</h3>
                        </li>
                        <li>
                            <a href="{{ route('dashboard') }}">
                                <i class="mdi mdi-gauge"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('merge') }}">
                                <i class="mdi mdi-buffer"></i> <span>Merge List</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('broker') }}">
                                <i class="mdi mdi-table"></i>
                                <span>Broker</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('referrals') }}">
                                <i class="mdi mdi-google-circles-extended"></i> <span>Referrals</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('investments') }}">
                                <i class="mdi mdi-table"></i>
                                <span>Investment</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('withdrawals') }}">
                                <i class="mdi mdi-table"></i>
                                <span>Withdrawals</span>
                            </a>
                        </li>
                    </ul><!--sidebar nav end-->
                </div>
            </div><!-- sidebar left end-->

            <!-- body content start-->
            <div class="body-content">
                <!-- header section start-->
                <div class="header-section">
                    <!--logo and logo icon start-->
                    <div class="logo" style="background-color: black;">
                        <a href="{{ route('dashboard') }}">
                            <span class="logo-img">
                                <img src="{{ asset('home/logo.jpeg') }}" alt="" height="26">
                            </span>
                            <!--<i class="fa fa-maxcdn"></i>-->
                            <span class="brand-name">Green Rich Wide</span>
                        </a>
                    </div>

                    <!--toggle button start-->
                    <a class="toggle-btn"><i class="ti ti-menu"></i></a>
                    <!--toggle button end-->

                    <!--mega menu start-->
                    <div id="navbar-collapse-1" class="navbar-collapse collapse mega-menu">
                        <ul class="nav navbar-nav">
                            <!-- Classic dropdown -->
                        </ul>
                    </div>
                    <!--mega menu end-->

                    <div class="notification-wrap">
                        <!--right notification start-->
                        <div class="right-notification">
                            <ul class="notification-menu">
                                <li>
                                    <a href="javascript:;" class="notification" data-toggle="dropdown">
                                        <i class="mdi mdi-bell-outline"></i>
                                        <span class="badge badge-success"></span>
                                    </a>
                                    {{-- <ul class="dropdown-menu mailbox dropdown-menu-right">
                                        <li>
                                          <div class="drop-title">Notifications</div>
                                        </li>
                                        <li class="notification-scroll">
                                            <div class="message-center">
                                                <a href="#">
                                                    <div class="user-img">
                                                        <i class="ti ti-star"></i>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6>Jane A. Seward</h6>
                                                        <span class="mail-desc">Iwon meddle and...</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="user-img">
                                                        <i class="ti ti-heart"></i>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6>Michael W. Salazar</h6>
                                                        <span class="mail-desc">Lovely gide learn for you...</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="user-img">
                                                        <i class="ti ti-image"></i>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6>David D. Chen</h6>
                                                        <span class="mail-desc">Send his new photo...</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="user-img">
                                                        <i class="ti ti-bell"></i>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6>Irma J. Hendren</h6>
                                                        <span class="mail-desc">6:00 pm our meeting so...</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <a class="text-center bg-light" href="javascript:void(0);">
                                                <strong>See all notifications</strong>
                                            </a>
                                        </li>
                                    </ul> --}}
                                </li>
                                <li>
                                    <a href="javascript:;" data-toggle="dropdown">
                                        <img src="{{ asset('default.jpg') }}" alt="">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-menu">
                                        <a class="dropdown-item" href="{{ route('profile') }}"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-frm').submit();"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                        <form id="logout-frm" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div><!--right notification end-->
                    </div>
                </div>
                <!-- header section end-->

                <div class="container-fluid">
                    <div class="page-head" style="display: flex; justify-content: space-between">
                        <h4 class="mt-2 mb-2">@yield('title')</h4>
                        <a class="btn btn-success text-white" href="{{ route('deposit') }}">Invest Now</a>
                        {{-- <a class="btn btn-info text-white" href="{{ route('referrals.withdraw') }}">Withdraw Referral Bonus</a> --}}
                    </div>

                    @yield('content')

                </div><!--end container-->

                <!--footer section start-->
                <footer class="footer">
                    2020 &copy; Green Rich Wide Investment.
                </footer>
                <!--footer section end-->


                <!-- Right Slidebar start -->
                <div class="sb-slidebar sb-right sb-style-overlay">
                    <div class="right-bar slimscroll">
                        <span class="r-close-btn sb-close"><i class="fa fa-times"></i></span>

                        <ul class="nav nav-tabs nav-justified-">
                            <li class="">
                                <a href="#chat" class="active" data-toggle="tab">Chat</a>
                            </li>
                            <li class="">
                                <a href="#activity" data-toggle="tab">Activity</a>
                            </li>
                            <li class="">
                                <a href="#settings" data-toggle="tab">Settings</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="chat">
                                <div class="online-chat">
                                    <div class="online-chat-container">
                                        <div class="chat-list">
                                            <form class="search-content" action="index.html" method="post">
                                                <input type="text" class="form-control" name="keyword" placeholder="Search...">
                                                <span class="search-button"><i class="ti ti-search"></i></span>
                                            </form>
                                        </div>
                                        <div class="side-title-alt">
                                            <h2>online</h2>
                                        </div>

                                        <ul class="team-list chat-list-side">
                                            <li>
                                                <a href="#" class="ml-3">
                                                    <span class="thumb-small">
                                                        <img class="rounded-circle" src="assets/images/users/avatar-1.jpg" alt="">
                                                        <i class="online dot"></i>
                                                    </span>
                                                    <div class="inline">
                                                        <span class="name">Alison Jones</span>
                                                        <small class="text-muted">Start exploring</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="ml-3">
                                                    <span class="thumb-small">
                                                        <img class="rounded-circle" src="assets/images/users/avatar-3.jpg" alt="">
                                                        <i class="online dot"></i>
                                                    </span>
                                                    <div class="inline">
                                                        <span class="name">Jonathan Smith</span>
                                                        <small class="text-muted">Alien Inside</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="ml-3">
                                                    <span class="thumb-small">
                                                        <img class="rounded-circle" src="assets/images/users/avatar-4.jpg" alt="">
                                                        <i class="away dot"></i>
                                                    </span>
                                                    <div class="inline">
                                                        <span class="name">Anjelina Doe</span>
                                                        <small class="text-muted">Screaming...</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="ml-3">
                                                    <span class="thumb-small">
                                                        <img class="rounded-circle" src="assets/images/users/avatar-5.jpg" alt="">
                                                        <i class="busy dot"></i>
                                                    </span>
                                                    <div class="inline">
                                                        <span class="name">Franklin Adam</span>
                                                        <small class="text-muted">Don't lose the hope</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="ml-3">
                                                    <span class="thumb-small">
                                                        <img class="rounded-circle" src="assets/images/users/avatar-6.jpg" alt="">
                                                         <i class="online dot"></i>
                                                    </span>
                                                    <div class="inline">
                                                        <span class="name">Jeff Crowford </span>
                                                        <small class="text-muted">Just flying</small>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane " id="activity">

                                <div class="aside-widget">
                                    <div class="side-title-alt">
                                        <h2>Recent Activity</h2>
                                    </div>
                                    <ul class="team-list chat-list-side info">
                                        <li>
                                            <span class="thumb-small">
                                                <i class="fa fa-pencil"></i>
                                            </span>
                                            <div class="inline">
                                                <span class="name">Mary Brown open a new company</span>
                                                <span class="time">just now</span>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="thumb-small">
                                                <i class="fa fa-user-plus"></i>
                                            </span>
                                            <div class="inline">
                                                <span class="name">Mary Brown send a new message </span>
                                                <span class="time">50 min ago</span>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="thumb-small">
                                                <i class="fa fa-wrench"></i>
                                            </span>
                                            <div class="inline">
                                                <span class="name">Holly Cobb Uploaded 6 new photos.</span>
                                                <span class="time">3 Week Ago</span>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="thumb-small">
                                                <i class="fa fa-users"></i>
                                            </span>
                                            <div class="inline">
                                                <span class="name">Mary Brown open a new company.</span>
                                                <span class="time">1 Month Ago</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="aside-widget">

                                    <div class="side-title-alt">
                                        <h2>Events</h2>
                                    </div>
                                    <ul class="team-list chat-list-side info statistics border-less-list">
                                        <li>
                                            <div class="inline">
                                                <p class="mb-1">Jamie Miller</p>
                                                <span class="name">Contrary to popular belief, Lorem Ipsum is not simply random text.</span>
                                                <span class="time text-muted">2 Week Ago</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="inline">
                                                <p class="mb-1">Robert Jones</p>
                                                <span class="name">Lorem Ipsum is simply dummy text of the printing and typesetting .</span>
                                                <span class="time text-muted">1 Month Ago</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane " id="settings">
                                <div class="side-title-alt">
                                    <h6 class="mb-0">Account Setting</h6>
                                </div>
                                <ul class="team-list chat-list-side info statistics border-less-list setting-list">
                                    <li>
                                        <div class="inline">
                                            <span class="name">Auto updates</span>
                                        </div>
                                        <span class="thumb-small">
                                            <input type="checkbox" checked data-plugin="switchery" data-color="#079c9e" data-size="small"/>
                                        </span>
                                    </li>
                                    <li>
                                        <div class="inline">
                                            <span class="name">Show offline Contacts</span>
                                        </div>
                                        <span class="thumb-small">
                                            <input type="checkbox" checked data-plugin="switchery" data-color="#079c9e" data-size="small"/>
                                        </span>
                                    </li>

                                    <li>
                                        <div class="inline">
                                            <span class="name">Location Permission</span>
                                        </div>
                                        <span class="thumb-small">
                                            <input type="checkbox" checked data-plugin="switchery" data-color="#079c9e" data-size="small"/>
                                        </span>
                                    </li>
                                </ul>

                                <div class="side-title-alt">
                                    <h6 class="mb-0">General Setting</h6>
                                </div>
                                <ul class="team-list chat-list-side info statistics border-less-list setting-list">
                                    <li>
                                        <div class="inline">
                                            <span class="name">Show me Online</span>
                                        </div>
                                        <span class="thumb-small">
                                            <input type="checkbox" checked data-plugin="switchery" data-color="#079c9e" data-size="small"/>
                                        </span>
                                    </li>
                                    <li>
                                        <div class="inline">
                                            <span class="name">Status visible to all</span>
                                        </div>
                                        <span class="thumb-small">
                                            <input type="checkbox" checked data-plugin="switchery" data-color="#079c9e" data-size="small"/>
                                        </span>
                                    </li>

                                    <li>
                                        <div class="inline">
                                            <span class="name">Notifications</span>
                                        </div>
                                        <span class="thumb-small">
                                            <input type="checkbox" checked data-plugin="switchery" data-color="#079c9e" data-size="small"/>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end Right Slidebar-->
            </div>
            <!--end body content-->
        </section>

        <!-- jQuery -->
        <script src="{{ asset('dashboard/js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{ asset('dashboard/plugin/sweetalert2/dist/sweetalert2.min.js')}}"></script>
        <script src="{{ asset('dashboard/js/popper.min.js')}}"></script>
        <script src="{{ asset('dashboard/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('dashboard/js/jquery-migrate.js')}}"></script>
        <script src="{{ asset('dashboard/js/modernizr.min.js')}}"></script>
        <script src="{{ asset('dashboard/js/jquery.slimscroll.min.js')}}"></script>
        <script src="{{ asset('dashboard/js/slidebars.min.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/counter/jquery.counterup.min.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/waypoints/jquery.waypoints.min.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/sparkline-chart/jquery.sparkline.min.js')}}"></script>
        <script src="{{ asset('dashboard/pages/jquery.sparkline.init.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/chart-js/Chart.bundle.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/morris-chart/raphael-min.js')}}"></script>
        <script src="{{ asset('dashboard/plugins/morris-chart/morris.js')}}"></script>
        <script src="{{ asset('dashboard/pages/dashboard-init.js')}}"></script>
        <script src="{{ asset('dashboard/js/jquery.countdown.min.js')}}"></script>
        @livewireScripts
        <script src="{{ asset('dashboard/js/jquery.app.js')}}"></script>
        <script>
            $(document).ready(function($) {
                $('[data-countdown]').each(function() {
                    var $this = $(this), finalDate = $(this).data('countdown');
                    $this.countdown(finalDate, function(event) {
                        $this.html(event.strftime('%D days %H:%M:%S'));
                    });
                });

                @if(Session::has('status'))
                    Swal.fire(
                        'Success!',
                        '{{Session::get('status')}}',
                        'success'
                    )
                @endif

                @if(Session::has('message'))
                    Swal.fire(
                        'Success!',
                        '{{Session::get('message')}}',
                        'success'
                    )
                @endif

                @if(Session::has('error'))
                    Swal.fire(
                        'Error!',
                        '{{Session::get('error')}}',
                        'warning'
                    )
                @endif


            });
        </script>
    </body>
</html>
