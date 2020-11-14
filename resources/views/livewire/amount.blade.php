<div>
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card text-center bg-white m-b-30">
                <div class="card-header">
                {{ $gethelp->is_bonus_withdrawal == 1 ? 'Referral Bonus' : 'Active Investment' }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <span style="font-weight: 900"> {{ $gethelp->is_bonus_withdrawal == 1 ? 'Current Withdrawal' : 'Current Investment' }}: </span>₦{{ round($gethelp->amount * 0.66666666, (-2)) + round($gethelp->amount  * 0.66666666 *  $amount_percent, (-2))  }}</h5>
                        @if ($gethelp->is_bonus_withdrawal == 0)
                            <span style="display: flex; font-weight: 800"> ₦{{ ceil($gethelp->amount * 0.66666666) }}</span></h5>
                        @endif
                    <p class="card-text">
                        @if ($gethelp->is_bonus_withdrawal == 0)
                            <div class="progress my-3" style="height: 14px">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                    role="progressbar"
                                    aria-valuenow="{{ $amount_percent * 2 * 100 }}"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                    style="width: {{ $amount_percent * 2 * 100 }}%">
                                </div>
                            </div>
                            <span style="display: flex; justify-content: flex-end; font-weight:800"> ₦{{ ceil($gethelp->amount) }}</span>
                            <div>
                                <span style="font-weight: 800"><div style="color: red" data-wth-countdown="{{ $date }}"></div></span>
                            </div>
                        @endif
                    </p>
                </div>
                <div class="card-footer text-muted" style="text-align: center;">
                    @if ($percent == 100 && $awaiting == 0)
                        <button class="btn btn-success" wire:click="requestPayment">Request Withdrawal</button>
                    @endif
                    @if ($awaiting == 1)
                    <span style="color: blue; font-weight:800">Withdrawal has been created successfully. You'll be merged to receive payment soon.</span>
                    @endif
            </div>
        </div>
    </div>
    <div style="height: 40px"></div>
</div>
