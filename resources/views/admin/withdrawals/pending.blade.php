@extends('layouts.admin-dashboard')

@section('title', 'Admin Pending List')

@section('content')


<div class="row">
    <div class="col-lg-12 col-sm-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h5 class="header-title pb-3">
                    Withdrawals Summary
                    {{-- <div style="float: right">
                        <a class="btn btn-success btn-sm" style="color: white;" href="{{ route('admin.remerge') }}">Merge</a>
                    </div> --}}
                </h5>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-hover m-b-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Maturity Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($withdrawals as $item)
                                    <tr>
                                        <td>{{ $item->user->full_name }}</td>
                                        <td>{{ $item->amount }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->maturity_period)->toFormattedDateString() }}</td>
                                        <td>
                                            <a class="btn btn-success btn-sm" href="{{ route('admin.remerge', $item->id) }}">Merge User</a>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="container">
                                        <p style="text-align: center">No User Yet</p>
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
@endsection
