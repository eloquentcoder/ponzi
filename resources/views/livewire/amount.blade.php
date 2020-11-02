<div>
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card text-center bg-white m-b-30">
                <div class="card-header">
                    Active Investment
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <span style="font-weight: 900">Current Investment: </span>₦{{ round($gethelp->amount * 0.66666666, (-2)) + round($gethelp->amount * 0.33333333333 * ($percent/100), (-2))  }}</h5>
                        {{-- <span style="font-weight: 900">Current Investment: </span>₦{{ ceil($gethelp->amount * 0.66666666) }}</h5> --}}
                    <p class="card-text">
                        <div class="progress my-3" style="height: 14px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                role="progressbar"
                                aria-valuenow="{{ $percent }}"
                                aria-valuemin="0"
                                aria-valuemax="100"
                                style="width: {{ $percent }}%">
                            </div>
                        </div>
                        <div>
                            Number Of Days: {{ $diff  }}
                        </div>
                    </p>
                </div>
                <div class="card-footer text-muted" style="text-align: center;">
                    @if ($percent == 100 && $awaiting == 0)
                        <button class="btn btn-yellow" wire:click="requestPayment">Request Withdrawal</button>
                    @endif
                    @if ($awaiting == 1)
                        Request Confirmed. Awaiting  Confimation
                    @endif
            </div>
        </div>
    </div>
</div>
