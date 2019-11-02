<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('head')
</head>
 
<body>
<!-- HEDER -->
@include('navigation')

<!-- MAIN CONTENT -->
  <div class="container-fluid main-content">
      @include('mainContent')
  </div>

<!-- FOOTER -->
@include('footer')

<!-- SCROLL TO TOP -->
@include('scrollToTop')
</body>
</html>