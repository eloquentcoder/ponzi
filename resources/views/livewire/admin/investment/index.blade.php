<div>
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3">Referrals Summary</h5>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th>user With ID</th>
                                            <th>Amount</th>
                                            <th>Merge Status</th>
                                            <th>Confirmation Status</th>
                                            <th>Recipient</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($investments as $item)
                                        <tr>
                                            <td>{{ $item->user->full_name }}</td>
                                            <td>{{ $item->amount }}</td>
                                            <td>{{ $item->merge_status == 0 ? 'Not Merged' : 'Merged' }}</td>
                                            <td>{{ $item->confirmed == 0 ? 'Not Confirmed' : 'Confirmed' }}</td>
                                            <td>{{ $item->gethelp ? $item->gethelp->user->full_name : '' }}</td>
                                        </tr>
                                    @empty
                                        <div class="container">
                                            <p style="text-align: center">No Investments Yet</p>
                                        </div>
                                    @endforelse
                                    </tbody>
                                    {{ $investments->links() }}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
