<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Home</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CPoppins:400%7CTeko:300,400">
    <link rel="stylesheet" href="{{ asset('assets/asset2/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/asset2/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/asset2/css/style.css') }}">

    {{-- boxicons --}}
    <link rel="stylesheet" href="{{ asset('/assets/vendor/fonts/boxicons.css') }}" />

    {{-- Data Table CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
        <p>Loading...</p>
      </div>
    </div>
    <div class="page">
      <!-- Page Header-->
      {{-- <a class="banner banner-top" href="https://www.templatemonster.com/intense-multipurpose-html-template.html" target="_blank"><img src="{{ asset('assets/asset2/images/intense_02.jpg') }}" alt=""/></a> --}}
      @include('layouts.main.header')

      @yield('content')
     
      @include('layouts.main.footer')
    </div>

    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>


    <!-- Javascript-->
    <script src="{{ asset('assets/asset2/js/core.min.js') }}"></script>
    <script src="{{ asset('assets/asset2/js/script.js') }}"></script>

    {{-- DataTables JS --}}
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script>
        $('#dataTable').DataTable();
    </script>

  {{-- menghilangkan notification otomatis --}}
    <script>
      window.setTimeout(function() {
          $('.alert').fadeTo(1000, 0).slideUp(1000, function () {
              $(this).remove();
          })
      }, 2000);
    </script>

    @yield('scripts')

  </body>
</html>