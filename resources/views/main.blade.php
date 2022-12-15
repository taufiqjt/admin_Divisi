<!DOCTYPE html>
<html lang="en">

<head>
  @include('include.css')
</head>
<body>
  <div class="container-scroller">
    <!-- navbar -->
    @include('include.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      @include('include.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
        @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('include.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  @include('include.js')
  <!-- End custom js for this page-->
</body>

</html>

