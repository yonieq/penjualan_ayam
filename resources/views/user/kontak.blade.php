@extends('user.app')
@section('content')

<div class="bg-light py-3">
    <div class="container">
    <div class="row">
        <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Contact</strong></div>
    </div>
    </div>
</div>  

<div class="site-section">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
        <h2 class="h3 mb-3 text-black">Kontak Info</h2>
        </div>
        {{-- <div class="col-md-7">

        <form action="#" method="post">
            
            <div class="p-3 p-lg-5 border">
            <div class="form-group row">
                <div class="col-md-6">
                <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_fname" name="c_fname">
                </div>
                <div class="col-md-6">
                <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="c_lname" name="c_lname">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="c_email" name="c_email" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                <label for="c_subject" class="text-black">Subject </label>
                <input type="text" class="form-control" id="c_subject" name="c_subject">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                <label for="c_message" class="text-black">Message </label>
                <textarea name="c_message" id="c_message" cols="30" rows="7" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-12">
                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Send Message">
                </div>
            </div>
            </div>
        </form>
        </div> --}}
        <div class="col-md-6 col-lg-6">
            <div class="block-5 mb-5">
              {{-- <h3 class="footer-heading mb-4">Contact Info</h3> --}}
              <ul class="list-unstyled">
                <li class="address">Jl. Gandaria No.4, Kraton, Kec. Tegal Barat, Kota Tegal</br> Jawa Tengah 52112, Jawa Tengah</li>
                <li class="phone"><a href="https://wa.me/6282243410900">+62 8224 3410 900</a></li>
                <li class="email">bintangrasacatering@gmail.com</li>
              </ul>
            </div>
          </div>
    </div>
    </div>
</div>
@endsection