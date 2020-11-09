<div>
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card text-center bg-white m-b-30">
                <div class="card-header">
                    User Activation
                </div>
                <div class="card-body">
                    <h5 class="card-title" style="color: darkgreen;">IMPORTANT NOTICE!
                        In our earnest attempt to prevent spammers from gaining access to this system, you're mandated to purchase a dashboard-accessing  token worth #1,000. We've seen from the past that dubious people easily get into the system to pollute it. This, we hope to protect you from being merged with such people.
                        Thank you.</h5>
                    {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                    @if (!$merged)
                        <a href="#" wire:click="showDetails" class="btn btn-success btn-lg">Continue</a>
                    @endif
                    @if ($merged && !$provide_help)
                        You will be merged shortly. Check back in a couple of minutes
                    @else

                    @endif
                    <div wire:loading>
                        <div class="progress my-3" style="height: 14px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="81" aria-valuemin="0" aria-valuemax="100" style="width: 81%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($merged && $provide_help)
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
                                <td>₦1000.00</td>
                                </tr>
                                <tr>
                                    <th scope="row">Investor Name</th>
                                    <td>{{ $user->full_name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row"> Phone Number</th>
                                    <td>{{ $user->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Account Number</th>
                                    <td>{{ $user->account_details }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Bank Name</th>
                                    <td>{{ $user->bank_name }}</td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-muted" style="text-align: center;">
                    <span style="font-weight: 800">Time Expires At: <div style="color: red" data-countdown="{{ $provide_help->expiration_date ?? \Carbon\Carbon::now()->addDays(1) }}"></div></span>
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
                                    <button class="btn btn-success" wire:click="fileUpload()" type="button">Upload</button>
                                </span>
                            </div>
                            <div class="input-group mt-2">
                                <input type="text" class="form-control" placeholder="Enter Receipt Number" wire:model="receipt_no">
                                <span class="input-group-append">
                                    <button class="btn btn-success" wire:click="receiptUpload" type="button">Save</button>
                                </span>
                            </div>
                        </div>
                        @if ($provide_help)
                            @if ($provide_help->proof_of_payment)
                                    <img src="{{ asset('storage/photos/' . $provide_help->proof_of_payment) }}" style="margin: 20px; width: 25pc;">
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
