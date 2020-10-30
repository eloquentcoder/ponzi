@extends('layouts.dashboard')

@section('title', 'Withdrawals')

@section('content')

    {{-- <livewire:stat-boxes /> --}}

    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3">Withdrawal Summary</h5>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Received From</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($withdrawals as $item)
                                        <tr>
                                            <td>{{ $item->amount }}</td>
                                            <td>{{ $item->received == 0 ? 'Processing' : 'Received' }}</td>
                                            <td>{{ $item->providehelp ? $item->providehelp->user->full_name : '' }}</td>
                                        </tr>
                                    @empty
                                        <div class="container">
                                            <p style="text-align: center">No Withdrawals Yet</p>
                                        </div>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
