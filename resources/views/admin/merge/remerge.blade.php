@extends('layouts.admin-dashboard')

@section('title', 'Admin Remerge')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h5 class="header-title pb-3">{{ $gher->user->full_name }} - {{ $gher->amount }} Merge</h5>
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
                    <form role="form" method="POST" action="{{ route('admin.remerge.post', $gher->id) }}">
                        @csrf
                            <div class="form-group">
                                <label for="exampleInputPassword1">Select PHer</label>
                                <select class="form-control" name="pher[]" multiple required>
                                @foreach ($phers as $item)
                                    <option value="{{ $item->id }}">{{ $item->user->full_name }} - {{ $item->amount }}</option>
                                @endforeach
                                </select>
                            </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
