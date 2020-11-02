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
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Merge Status</th>
                                            <th>Received Status</th>
                                            <th>Merged User</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($withdrawals as $item)
                                        <tr>
                                            <td>{{ $item->user->full_name }}</td>
                                            <td>{{ $item->amount }}</td>
                                            <td>{{ $item->merge_status == 0 ? 'Not Merged' : 'Merged' }}</td>
                                            <td>{{ $item->received == 0 ? 'Not Confirmed' : 'Confirmed' }}</td>
                                            <td>
                                                @forelse ($item->providehelp as $item_help)
                                                <li>{{ $item_help->user->full_name}}</li>
                                            @empty
                                                No Merged Users
                                            @endforelse</td>
                                        </tr>
                                    @empty
                                        <div class="container">
                                            <p style="text-align: center">No withdrawals Yet</p>
                                        </div>
                                    @endforelse
                                    </tbody>
                                    {{ $withdrawals->links() }}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
