<!DOCTYPE html>
<html lang="en">

<head>
  @include('include.css')
</head>
<body>
  <div class="container-scroller">
    @include('include.navbar')
    <div class="container-fluid page-body-wrapper">
      @include('include.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
        @yield('content')
        </div>
        @include('include.footer')
      </div>
    </div>
  </div>
  @yield('script')
  @include('include.js')
</body>

</html>

