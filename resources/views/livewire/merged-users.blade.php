<div>
    @if ($gethelpers->count() > 0)
        <div class="row">
            <div class="col-md-12">
                <h5 class="header-title pb-3">Merged Investors</h5>
            </div>
        </div>
        <div class="row">
            @foreach ($gethelpers as $helper)
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
                                        <th scope="row"> Phone Number</th>
                                        <td>{{ $helper->user->phone_number }}</td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-muted" style="text-align: center;">
                           <a href="{{ route('invest.single', $helper->id) }}" class="btn" style="background: yellow; color: black; font-weight: 900;">View Payment</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if ($gethelpers->count() == 0 && $provider)
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="card text-center bg-white m-b-30">
                <div class="card-header">
                    Notice
                </div>
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: 800; color: green;">SORRY, THERE IS NO AVAILABLE PARTICIPANT TO RECEIVE FUND AT THE MOMENT.
                        YOU WILL BE MERGED TO PAY OUT SOON.</h5>
                    {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                </div>
            </div>
        </div>
    </div>
    @endif

</div>


