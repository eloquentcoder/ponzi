<div>
    @if ($providehelpers->count() > 0)
        <div class="row">
            <div class="col-md-12">
                <h5 class="header-title pb-3">Withdrawal Merged List</h5>
            </div>
        </div>
        @foreach ($providehelpers as $helper)
            <div class="row">
                @if (session()->has('message'))
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Success!</strong> {{ session('message') }}
                                </div>
                @endif
                    <div class="col-lg-6 col-sm-6">
                        <div class="card bg-white m-b-30">
                            <h4 class="card-header">Merged User Name</h4>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Amount</th>
                                            <td>₦{{ $helper->amount }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Name</th>
                                            <td>{{ $helper->providehelp->user->full_name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row"> Phone Number</th>
                                            <td>{{ $helper->providehelp->user->phone_number }}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <p style="color: red">
                                          NOTE: Please only click on the <b>'Approve Payment'</b> button when payment has been received in your bank account. Approval of payment that is not received by you is at your own risk!
                                        </p><br>
                                    </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-muted" style="text-align: center;">
                                <span style="font-weight: 800">Time Expires At: <div style="color: red" data-countdown="{{ $helper->providehelp->expiration_date ?? \Carbon\Carbon::now()->addDays(1) }}"></div></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="card text-center bg-white m-b-30">
                            <div class="card-header">
                                Proof Of Payment
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Proof Of Payment</h5>
                                @if (session()->has('message'))
                                    <div class="alert alert-success alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Success!</strong> {{ session('message') }}
                                    </div>
                                @endif
                                @if ($helper)
                                <span style="font-weight: 900">{{ $helper->receipt_no }}</span>
                                    @if ($helper->proof_of_payment)
                                            <img src="{{ asset('storage/photos/' . $helper->proof_of_payment) }}" style="margin: 20px; width: 25pc;">
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
            </div>


            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="card bg-white m-b-30">
                        <div class="card-footer text-muted" style="text-align: center;">
                        <a class="btn" wire:click="confirmPay({{$helper}})" style="background: yellow; color: red; font-weight: 900;">Approve Payment!</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
@endif
</div>
