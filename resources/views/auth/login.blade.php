<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PLN Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-4 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../../images/Logo_PLN.png" alt="logo">
              </div>
              
              @if (\Session::has('failedlogin'))
    <div class="alert alert-danger d-flex">
    <i class="ti-alert m-1"></i>
            <p>{!! \Session::get('failedlogin') !!}</p>
    </div>
@else
              <h6 class="font-weight-light">Sign in to continue.</h6>
              @endif  
              
              <form method="POST" action="/login" class="pt-3">
                @csrf
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-lg"  placeholder="Username" required>
                </div>
                <div class="form-group">
                  <input type="password" name="password" id="inputpassword" class="form-control form-control-lg" placeholder="Password" required>
                  <input type="checkbox"class="mx-2 my-3" onclick="myFunction()">Show Password
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
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
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->

  <script>
    function myFunction() {
      var x = document.getElementById("inputpassword");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
}
    </script>
</body>

</html>
