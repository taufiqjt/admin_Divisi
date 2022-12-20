@extends('main')
@section('content')

<div class="row ">
  <section class="col-11 justify-content-center bg-transparent" >
    <div class="container p-4">
      <div class="row">
        <div class="col-lg-12">
          <div class="card mb-4">
            <div class="card-body text-center rounded bg-info">
              <img src="images/admin.png" alt="profile" class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{$name}}</h5>
            </div>
          </div>
        </div>
        @if (\Session::has('failededit'))
          <div class="col-6 alert alert-sm py-2 alert-danger d-flex ml-4">
          <div class="container d-flex mt-2">
            <i class="ti-alert m-1"></i>
            <p>{!! \Session::get('failededit') !!}</p>
          </div>
            </div>
        @elseif(\Session::has('successedit'))
        <div class="col-6 alert alert-sm py-2 alert-success d-flex ml-4">
        <div class="container d-flex mt-2">
            <i class="ti-check m-1"></i>
            <p>{!! \Session::get('successedit') !!}</p>
        </div>
        </div>
        @endif
        <div class="col-lg-12">
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Nama</p>
                </div>
                  <div class="col-sm-6">
                    <p class="text-muted mb-0">{{$name}}</p>
                  </div>
                  <div class="col-sm-3 d-flex flex-row-reverse">
                    <p class="mb-0 ">
                      <button class="btn btn-sm btn-primary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseEditName" aria-expanded="false" aria-controls="collapseExample">Edit Nama</button>
                    </p>
                  </div>
                </div>
                <div class="collapse" id="collapseEditName">
                  <div class="card card-body mt-3">
                    <form class="forms-sample" action="/profile/editnama" method="POST">
                      @csrf
                      <div class="form-group d-flex">
                        <input type="text" class="form-control col-7" name="name" id="editnama" placeholder="Masukkan Nama Baru">
                        <button type="submit" class="btn btn-sm  col-1 btn-inverse-primary mx-3 py-1">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Username</p>
                  </div>
                <div class="col-sm-6">
                  <p class="text-muted mb-0">{{$username}}</p>
                </div>
                <div class="col-sm-3 d-flex flex-row-reverse">
                  <p class="mb-0 ">
                    <button class="btn btn-sm btn-primary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseEditUserName" aria-expanded="false" aria-controls="collapseExample">Edit Username</button>
                  </p>
                </div>
              </div>
              <div class="collapse" id="collapseEditUserName">
                <div class="card card-body mt-3">
                  <form class="forms-sample" action="/profile/editusername" method="POST">
                    @csrf
                    <div class="form-group d-flex">
                      <input type="text" name="username" class="form-control col-7" id="editUsername" placeholder="Masukkan Username Baru">
                      <button type="submit" class="btn btn-sm  col-1 btn-inverse-primary mx-3 py-1">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Password</p>
                </div>
                  <div class="col-sm-6">
                    <p class="text-muted mb-0"></p>
                  </div>
                  <div class="col-sm-3 d-flex flex-row-reverse">
                    <p class="mb-0 ">
                      <button class="btn btn-sm btn-primary " type="button" data-bs-toggle="collapse" data-bs-target="#collapseEditPassword" aria-expanded="false" aria-controls="collapseExample">Edit Password</button>
                    </p>
                  </div>
                </div>
                <div class="collapse" id="collapseEditPassword">
                  <div class="card card-body mt-3">
                    <form class="forms-sample" action="/profile/editpassword" method="POST">
                      @csrf
                      <div class="form-group">
                        <label >Konfirmasi Password sebelumnya</label>
                        <div class="d-flex mb-3">
                          <input name="oldpassword" id="oldPassword" type="password" class="password form-control col-7" placeholder="Masukkan Password sebelumnya">
                          <i class="mdi mdi-eye p-2" style="cursor: pointer;" id="toggleOldPassword"></i>
                        </div>
                        <label >Password Baru</label>
                        <div class="d-flex mb-3">
                          <input name="newpassword" id="newPassword" type="password" class="form-control col-7" placeholder="Masukkan Password baru">
                          <i class="mdi mdi-eye p-2" style="cursor: pointer;" id="toggleNewPassword"></i>
                        </div>
                        <label >Konfirmasi Password Baru</label>
                        <div class="d-flex mb-3">
                          <input name="confirmnewpassword" id="confirmNewPassword" type="password" class="form-control col-7" placeholder="Konfirmasi Password baru">
                          <i class="mdi mdi-eye p-2" style="cursor: pointer;" id="toggleConfirmNewPassword"></i>
                        </div>
                        <button type="submit" class="btn col-3 btn-inverse-primary">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
                <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Jumlah Data</p>
                </div>
              <div class="col-sm-6">
                <p class="text-muted mb-0">{{$sumdata}} Data</p>
              </div>
              <div class="col-sm-3 d-flex flex-row-reverse">
                <p class="mb-0 ">
                <a class="text-white" href="/pelanggan">
                  <button type="button" class="btn btn-sm btn-primary text-center py-2">Lihat Data Pelanggan</button>
                </a>
                </p>
              </div>
            </div>  
          </div>
        </div>
      </div>
    </div>

</div>
</section>
</div>
@endsection()

@section('script')
<script>
        const toggleOldPassword = document.querySelector("#toggleOldPassword");
        const oldPassword = document.querySelector("#oldPassword");
        const toggleNewPassword = document.querySelector("#toggleNewPassword");
        const newPassword = document.querySelector("#newPassword");
        const toggleConfirmNewPassword = document.querySelector("#toggleConfirmNewPassword");
        const confirmNewPassword = document.querySelector("#confirmNewPassword");

        toggleOldPassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = oldPassword.getAttribute("type") === "password" ? "text" : "password";
            oldPassword.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("mdi-eye-off");
        });

        toggleNewPassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = newPassword.getAttribute("type") === "password" ? "text" : "password";
            newPassword.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("mdi-eye-off");
        });

        toggleConfirmNewPassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = confirmNewPassword.getAttribute("type") === "password" ? "text" : "password";
            confirmNewPassword.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("mdi-eye-off");
        });

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('submit', function (e) {
            e.preventDefault();
        });
    </script>
    @endsection()