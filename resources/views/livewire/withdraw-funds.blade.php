<div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3">Withdraw Bonus</h5>
                    <div class="general-label">
                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                  {{ session('message') }}
                            </div>
                        @endif
                        @if (session()->has('error'))
                        <div class="alert alert-info alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Note!</strong> {{ session('error') }}
                        </div>
                    @endif
                    @if ($hasbrokers < 15 || $referral_bonus < 5000)
                        <span>
                            <p style="font-weight: 900; text-align: center;">You need to have a mininum of ₦5,000 and at least 15 referrals to withdraw any funds</p>
                        </span>
                    @else
                        <form role="form" wire:submit.prevent="withrawBonus">
                            <div class="form-group">
                                <label>Amount</label>
                                <select class="form-control" wire:model="amount" required>
                                    <option value="">-- Select Amount --</option>
                                    @if ($referral_bonus >= 5000)
                                        <option value="5000">₦5,000</option>
                                    @endif
                                    @if ($referral_bonus >= 10000)
                                        <option value="10000">₦10,000</option>
                                    @endif
                                    @if ($referral_bonus >= 20000)
                                        <option value="20000">₦20,000</option>
                                    @endif
                                    @if ($referral_bonus >= 30000)
                                        <option value="10000">₦30,000</option>
                                    @endif

                                    @if ($referral_bonus >= 50000)
                                        <option value="50000">₦50,000</option>
                                    @endif

                                    @if ($referral_bonus >= 100000)
                                        <option value="100000">₦100,000</option>
                                    @endif

                                    @if ($referral_bonus >= 150000)
                                        <option value="150000">₦150,000</option>
                                    @endif

                                     @if ($referral_bonus >= 200000)
                                        <option value="150000">₦200,000</option>
                                    @endif

                                    @if ($referral_bonus >= 250000)
                                        <option value="250000">₦250,000</option>
                                    @endif

                                    @if ($referral_bonus >= 300000)
                                        <option value="300000">₦300,000</option>
                                    @endif

                                    @if ($referral_bonus >= 400000)
                                        <option value="400000">₦400,000</option>
                                    @endif

                                    @if ($referral_bonus >= 500000)
                                        <option value="500000">₦500,000</option>
                                    @endif

                                </select>
                            </div>
                            @if ($amount)
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Enter Password To Confirm</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" wire:model="password" placeholder="Enter Your Password" required>
                                    @error('password') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            @endif
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
