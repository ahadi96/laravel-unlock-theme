@extends('master')

@section('title','Contact us Page')

@section('content')
<section class="probootstrap-cover">
      <div class="container">
        <div class="row probootstrap-vh-75 align-items-center text-left">
          <div class="col-sm">
            <div class="probootstrap-text pt-5">
              <h1 class="probootstrap-heading text-white mb-4">Contact</h1>
              <div class="probootstrap-subheading mb-5">
                <p class="h4 font-weight-normal">Free Bootstrap 4 Under Creative Common License by <u>uicookies.com</u></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="probootstrap-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
          
          <form action="{{ url('contact-us') }}" method="post" class="probootstrap-form mb-5">
            @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control" id="fname" name="first_name" required value="{{ old('first_name') }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="lname">Last Name</label>
                  <input type="text" class="form-control" id="lname" name="last_name" value="{{ old('last_name') }}">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea cols="30" rows="10" class="form-control" id="message" name="message">{{ old('message') }}</textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Send Message">
              </div>
            </form>
          </div>
          <div class="col-md-6 pl-md-5 pl-3">
            <h4 class="mb-5">Contact Details</h4>
            <div class="media mb-5">
              <div class="probootstrap-icon"><span class="icon-location display-4"></span></div>
              <div class="media-body">
                <h5 class="mt-0">198 West 21th Street, Suite 721 New York NY 10016</h5>
              </div>
            </div>

            <div class="media mb-5">
              <div class="probootstrap-icon"><span class="icon-mail display-4"></span></div>
              <div class="media-body">
                <h5 class="mt-0">info@domain.com</h5>
              </div>
            </div>

            <div class="media mb-5">
              <div class="probootstrap-icon"><span class="icon-phone display-4"></span></div>
              <div class="media-body">
                <h5 class="mt-0">123 456 7890</h5>
              </div>
            </div>
           
          </div>
        </div>

      </div>
    </section>

    
@endsection