<div>
    @if ($provide->count() > 0)
        <div class="row">
            <div class="col-md-12">
                <h5 class="header-title pb-3">Withdrawal Merged List</h5>
            </div>
        </div>
        @foreach ($provide as $helper)
        <div class="col-lg-6 col-sm-12">
            <div class="card bg-white m-b-30">
                <div class="card-body" style="background: black; color: white; co">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                        <tbody>
                            <tr>
                                <th scope="row">Amount</th>
                                <td>₦{{ $helper->amount }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Expiring Date</th>
                                <td>
                                    {{ $helper->expiration_date }}
                                </td>
                            </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-muted" style="text-align: center;">
                    @if (auth()->user()->role == 'user')
                        <a href="{{ route('withdraw.single', $helper->id) }}" class="btn btn-success" style="font-weight: 900;">View Payment Details</a>
                    @else
                        <a href="{{ route('admin.withdraw.single', $helper->id) }}" class="btn btn-success" style="font-weight: 900;">View Payment Details</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
@endif
</div>
