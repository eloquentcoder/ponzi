@extends('layouts.dashboard')

@section('title', 'Investments')

@section('content')

    {{-- <livewire:stat-boxes /> --}}

    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3">Investment Summary</h5>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @forelse ($investments as $item)
                                        <tr style="color: green">
                                            <td>{{ $item->amount }}</td>
                                            <td>{{ $item->confirmed == 0 ? 'Processing' : 'Confirmed' }}</td>
                                        </tr>
                                    @empty
                                        <div class="container">
                                            <p style="text-align: center">No Investments Yet</p>
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
