<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404</title>
</head>
@extends('user.app')
@section('content')

{{-- <div class="bg-light py-3">
    <div class="container">
    <div class="row">
        <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Contact</strong></div>
    </div>
    </div>
</div>   --}}

<div class="site-section">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
        <h1 class="h3 mb-3 text-black">Oooops!</h1>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="block-5 mb-5">
              {{-- <h3 class="footer-heading mb-4">Contact Info</h3> --}}
              <ul class="list-unstyled">
                <h3>Halaman tidak ditemukan</h3>
                <h4><a href="/">Silahkan ke beranda</a></h4>
                {{-- <li class="email">bintangrasacatering@gmail.com</li> --}}
              </ul>
            </div>
          </div>
    </div>
    </div>
</div>
@endsection
</html>