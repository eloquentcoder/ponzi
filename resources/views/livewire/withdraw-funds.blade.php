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
                                <strong>Success!</strong> {{ session('message') }}
                            </div>
                        @endif
                        @if (session()->has('error'))
                        <div class="alert alert-info alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Note!</strong> {{ session('error') }}
                        </div>
                    @endif
                        <form role="form" wire:submit.prevent="withrawBonus">
                            <div class="form-group">
                                <label>Amount</label>
                                <select class="form-control" wire:model="amount" required>
                                    <option value="">-- Select Amount --</option>
                                    <option value="5000">₦5,000</option>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
