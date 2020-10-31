@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

    <livewire:stat-boxes />
    <livewire:merged-users />
    <livewire:provide-users />
    @if ($gethelp)
    <livewire:amount />
    @endif
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3">Transaction Summary</h5>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th>Amount</th>
                                            <th>Transaction Type</th>
                                            <th>Status</th>
                                            <th>Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($transactions as $item)
                                            <tr>
                                                <td>{{ $item->amount }}</td>
                                                <td>{{ $item->type }}</td>
                                                <td>{{ 'Completed' }}</td>
                                                <td>{{ $item->created_at }}</td>
                                            </tr>
                                        @empty
                                            <div class="container">
                                                <p style="text-align: center">No Transactions created Yet</p>
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
