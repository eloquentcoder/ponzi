@extends('layouts.home')

@section('title', 'Contact Us')

@section('content')

<div class="page-header" data-parallax="true" style="background: linear-gradient( rgba(16, 201, 10, 0.5), rgba(16, 201, 10, 0.5) ), url({{ asset('home/banner.jpg') }}); min-height: 400px;">
    <div class="filter"></div>
    <div class="container">
      <div class="motto text-center">
        <h1 style="font-weight: 800">Contact Us</h1>
      </div>
    </div>
</div>

<div class="section landing-section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="text-center">Keep in touch?</h2><br>
          <div class="row">
             <div class="col-md-6">
                <i class="fa fa-phone"></i><span class="text"> 0808-844-1999</span><br>
                <i class="fa fa-phone"></i><span class="text"> 0808-844-1999</span>
             </div>
             <div class="col-md-6">
                <i class="fa fa-envelope"></i><span class="text">support@Green Rich Wideinvestment.com</span><br>
            </div>
          </div>
          <form class="contact-form">
            <div class="row">
              <div class="col-md-6">
                <label>Name</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="nc-icon nc-single-02"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="Name">
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
                  <input type="text" class="form-control" placeholder="Email">
                </div>
              </div>
            </div>
            <label>Message</label>
            <textarea class="form-control" rows="4" placeholder="Tell us your thoughts and feelings..."></textarea>
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


