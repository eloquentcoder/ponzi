<div>
    @if ($single_invest->received == 0)
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="card bg-white m-b-30">
                    <h4 class="card-header">Details</h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                            <tbody>
                                <tr>
                                    <th scope="row">Amount</th>
                                <td>{{ $single_invest->amount }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Investor Name</th>
                                    <td>{{ $single_invest->user->full_name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row"> Phone Number</th>
                                    <td>{{ $single_invest->user->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Account Number</th>
                                    <td>{{ $single_invest->user->account_details }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Bank Name</th>
                                    <td>{{ $single_invest->user->bank_name }}</td>
                                </tr>
                            </tbody>
                            </table>
                            <tfoot>
                                <p style="color: red">
                                    NOTE: Make Payment Only To The Accounts Details Displayed On Your Dashboard.

                                    Do not Disclose Your Secret Key Or Login Details To Anybody.

                                    Green Rich will Never Ask For Your Secret Key Or Login Details.
                                </p><br>
                            </tfoot>
                        </div>
                    </div>
                    <div class="card-footer text-muted" style="text-align: center;">
                    <span style="font-weight: 800">Time Expires At: <div style="color: red;" data-countdown="{{ $provider->expiration_date ?? \Carbon\Carbon::now()->addDays(1) }}"></div></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="card text-center bg-white m-b-30">
                    <div class="card-header">
                        Proof Of Payment
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Upload Proof Of Payment</h5>
                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success!</strong> {{ session('message') }}
                            </div>
                        @endif
                        <div class="col-md-12">
                            <div class="input-group mt-2">
                                <input type="file" class="form-control" wire:model="file_upload">
                                <span class="input-group-append">
                                    <button class="btn btn-success" wire:click="fileUpload" type="button">Upload</button>
                                </span>
                            </div>
                            <div class="input-group mt-2">
                                <input type="text" class="form-control" placeholder="Enter Receipt Number" wire:model="receipt_no">
                                <span class="input-group-append">
                                    <button class="btn btn-success" wire:click="receiptUpload" type="button">Save</button>
                                </span>
                            </div>
                        </div>
                        @if ($provider)
                            @if ($provider->proof_of_payment)
                                    <img src="{{ asset('storage/photos/' . $provider->proof_of_payment) }}" style="margin: 20px; width: 25pc;">
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
