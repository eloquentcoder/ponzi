@extends('layouts.home')

@section('title', 'Terms And Conditions')

@section('content')

<div class="page-header" data-parallax="true" style="background: linear-gradient( rgba(16, 201, 10, 0.5), rgba(16, 201, 10, 0.5) ), url({{ asset('home/banner.jpg') }}); min-height: 400px;">
    <div class="filter"></div>
    <div class="container">
      <div class="motto text-center">
        <h1 style="font-weight: 800">Terms And Conditions</h1>
      </div>
    </div>
</div>

<div class="section landing-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="text-center">Keep in touch?</h2><br>
          @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  {{ session('message') }}
            </div>
        @endif
          <div class="row">
             <div class="col-md-6">
                <i class="fa fa-phone"></i><span class="text"> 08088441999</span><br>
                <i class="fa fa-phone"></i><span class="text"> 09022209254</span>
             </div>
             <div class="col-md-6">
                <i class="fa fa-envelope"></i><span class="text">support@greenrichwideinvestment.com</span><br>
                <i class="fa fa-envelope"></i><span class="text">greenrichwide@gmail.com</span>
            </div>
          </div>
          <form class="contact-form" action="{{ route('contact.post') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <label>Name</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="nc-icon nc-single-02"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="Name" name="full_name" required>
                </div>
              </div>
              <div class="col-md-6">
                <label>Email</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="nc-icon nc-email-85"></i>
                    </span>
                  </div>
                  <input type="email" class="form-control" placeholder="Email" name="email" required>
                </div>
              </div>
            </div>
            <label>Message</label>
            <textarea class="form-control" rows="4" placeholder="Tell us your thoughts and feelings..." name="body" required></textarea>
            <div class="row">
              <div class="col-md-4 ml-auto mr-auto">
                <button class="btn btn-success btn-lg btn-fill">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

@endsection
