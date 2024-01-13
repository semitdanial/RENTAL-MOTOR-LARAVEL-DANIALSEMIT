<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <title>KE-RENT | {{$title}}</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet" />
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
</head>

  <body>
    
    @include('dashboard.layouts.header')

    @include('dashboard.layouts.sidebar')
    
    <div class="container">
        <div class="row">
          @yield('container')
        </div>
      </div>

      <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
      <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
      <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
      <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
      <!-- Google Maps Plugin -->
      <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
      <!-- Chart JS -->
      <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
      <!-- Notifications Plugin -->
      <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
      <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
      <script src="{{ asset('assets/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script>
      <script src="{{ asset('assets/demo/demo.js') }}"></script>
      <script src="{{ asset('assets/js/now-ui-dashboard.js') }}"></script>
</body>

</html>