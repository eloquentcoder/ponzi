<div>
    <div class="row">
        <div class="col-lg-3 col-sm-6 bg-gradient">
            <div class="widget-box bg-grad-1 m-b-30" style="background: black;">
                <div class="row d-flex align-items-center">
                    <div class="col-4">
                        <div class=""><i class="fa fa-shopping-cart"></i></div>
                    </div>
                    <div class="col-4 align-items-center">
                        <p class="m-0 text-white text-center">Total Investment</p>
                    </div>
                    <div class="col-4 align-self-end">
                        <h2 class="m-0 text-right" style="color: white;">₦{{ $total_investment }}</h2>
                    </div>
                </div>
           </div>
        </div>
        <div class="col-lg-3 col-sm-6 bg-gradient">
           <div class="widget-box bg-grad-2 m-b-30" style="background: black;">
                <div class="row d-flex align-items-center">
                    <div class="col-4">
                        <div class=""><i class="fa fa-envelope"></i></div>
                    </div>
                    <div class="col-4 align-items-center">
                        <p class="m-0 text-white text-center">Total Cashout</p>
                    </div>
                    <div class="col-4 align-self-end">
                        <h2 class="m-0 text-right" style="color: white;">₦{{ $total_withdrawals }}</h2>
                    </div>
                </div>
           </div>
        </div>
        <div class="col-lg-3 col-sm-6 bg-gradient">
            <div class="widget-box bg-grad-3 m-b-30" style="background: black;">
                <div class="row d-flex align-items-center">
                    <div class="col-4">
                        <div class=""><i class="fa fa-line-chart"></i></div>
                    </div>
                    <div class="col-4 align-items-center">
                       <p class="m-0 text-white text-center">Total Investors</p>
                    </div>
                    <div class="col-4 align-self-end">
                        <h2 class="m-0 text-right" style="color: white;">{{ $total_investors }}</h2>
                    </div>
                </div>
           </div>
        </div>
        <div class="col-lg-3 col-sm-6 bg-gradient">
            <div class="widget-box bg-grad-4 m-b-30" style="background: black;">
                <div class="row d-flex align-items-center">
                    <div class="col-4">
                        <div><i class="fa fa-users"></i></div>
                    </div>
                    <div class="col-4 align-items-center">
                        <p class="m-0 text-white text-center">Total Brokers</p>
                    </div>
                    <div class="col-4 align-self-end">
                        <h2 class="m-0 text-right" style="color: white;">{{ $total_brokers }}</h2>
                    </div>
                </div>
           </div>
        </div>
    </div><!--end row-->

    <div class="row">
        <div class="col-lg-6 col-sm-6 bg-gradient">
            <div class="widget-box bg-grad-1 m-b-30" style="background: black;">
                <div class="row d-flex align-items-center">
                    <div class="col-4">
                        <div class=""><i class="fa fa-shopping-cart"></i></div>
                    </div>
                    <div class="col-4 align-items-center">
                        <p class="m-0 text-white text-center">Personal Investment</p>
                    </div>
                    <div class="col-4 align-self-end">
                        <h2 class="m-0 text-right" style="color: white;">₦{{ $personal_investment }}</h2>
                    </div>
                </div>
           </div>
        </div>
        <div class="col-lg-6 col-sm-6 bg-gradient">
           <div class="widget-box bg-grad-2 m-b-30" style="background: black;">
                <div class="row d-flex align-items-center">
                    <div class="col-4">
                        <div class=""><i class="fa fa-envelope"></i></div>
                    </div>
                    <div class="col-4 align-items-center">
                        <p class="m-0 text-white text-center">Personal Cashout</p>
                    </div>
                    <div class="col-4 align-self-end">
                        <h2 class="m-0 text-right" style="color: white;">₦{{ $personal_withdrawals }}</h2>
                    </div>
                </div>
           </div>
        </div>
    </div><!--end row-->
</div>
