<div>
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card text-center bg-white m-b-30">
                <div class="card-header">
                    Active Investment
                </div>
                <div class="card-body">
                    <h5 class="card-title"><span style="font-weight: 900">Current Investment: </span>₦{{ ceil($gethelp->amount * 0.66666666) + ceil($gethelp->amount * 0.33333333333 * ($percent/100))  }}</h5>
                    <p class="card-text">
                        <div class="progress my-3" style="height: 14px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                role="progressbar"
                                aria-valuenow="{{ $percent }}"
                                aria-valuemin="0"
                                aria-valuemax="100"
                                style="width: {{ $percent }}%">
                            </div>
                        </div>
                        <div>
                            Number Of Days: {{ $diff + 1 }}
                        </div>
                    </p>
                </div>
                <div class="card-footer text-muted" style="text-align: center;">
                    @if ($percent == 100)
                        <button class="btn btn-yellow" wire:click="requestPayment">Request Withdrawal</button>
                    @endif
                    @if ($is_mature)
                        Request Confirmed. Awaiting  Confimation
                    @endif
            </div>
        </div>
    </div>
</div>
