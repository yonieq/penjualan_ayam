<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Penjualan &mdash; Ayam </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('adminassets') }}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('adminassets') }}/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('adminassets') }}/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('shopper') }}/images/catering.svg" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <center><img src="{{ asset('shopper') }}/images/ayam.png"></center>
                </div>
                <h4>Halo! Selamat Datang</h4>
                {{-- <h6 class="font-weight-light">Silahkan Login Untuk Melanjutkan.</h6> --}}
                <small>email : admin@admin.com</small></br>
                <small>password : admin12345</small>
                <form class="pt-3" method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="form-group">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukan Email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukan Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit">MASUK</button>
                  </div>
                  <div class="mt-3"> </br>
                    {{-- <button class="btn btn-light btn-block"> --}}
                    {{-- <div className="google-btn">
                      <div className="google-icon-wrapper">
                        <a href="login/google">
                          <center><img className="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" alt="google button" />&nbsp;<b>&nbsp;&nbsp;MASUK DENGAN GOOGLE</b></center>
                        </a>
                      </div> --}}
                      {{-- <p className="btn-text">
                          <b>Sign in with google</b>
                      </p> --}}
                    </div>
                    {{-- </button> --}}
                  </div>
                  {{-- <a href="{{ url('/login/google') }}" class="btn btn-primary">
                    Login with Google
                  </a> --}}
                  {{-- <div class="text-left mt-4 font-weight-light">Lupa Password? <a href="/reset" class="text-primary">Disini</a>
                  <div class="text-center mt-4 font-weight-light"> Belum Punya Akun? <a href="/register" class="text-primary">Buat</a> --}}
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('adminassets') }}/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('adminassets') }}/assets/js/off-canvas.js"></script>
    <script src="{{ asset('adminassets') }}/assets/js/hoverable-collapse.js"></script>
    <script src="{{ asset('adminassets') }}/assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>