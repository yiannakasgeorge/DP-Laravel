<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@include('head')
</head>
 
<body>
@include('navigation')
@include('banner')
  <!-- MAIN CONTENT -->
<div class="container-fluid main-content">
    @include('mainContent')
    @include('footer')
</div>
    @yield('scrollToTop')
</body>
</html>