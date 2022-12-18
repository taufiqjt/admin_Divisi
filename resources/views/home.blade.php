@extends('main')
@section('content')
<div class="col-12 col-xl-8 mb-5">
      <h3 class="font-weight-bold">Selamat Datang {{$nama}}</h3>
      <h5 class="font-weight-normal mb-0">Kamu Mempunyai <span class="text-primary">3 Notifikasi!</span></h5>
</div>
<div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="../images/dashboard/people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div class="ml-2">
                        <h3 class="mb-0 font-weight-normal"><i class="{{$iconday}} mr-2"></i>{{$today}}</h3>
                        <h5 class="font-weight-normal text-right mt-2">{{$dayname}}</h5>
                      </div>
                      <!-- <div class="ml-2">
                        <h4 class="location font-weight-normal">Bangalore</h4>
                        <h6 class="font-weight-normal">India</h6>
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5 grid-margin transparent">
              
                <div class="col-md-9 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-3">Total Data</p>
                      <p class="fs-30 mb-4">{{$sumdata}} Data</p>
                      <a class="text-white" href="/pelanggan">
                              <button type="button" class="btn btn-sm text-primary btn btn-light ">Lihat Data Pelanggan</button>
                        </a>
                    </div>
                  </div>
                </div>
                <!-- <div class="col-md-10 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Today’s Bookings</p>
                      <p class="fs-30 mb-2">4006</p>
                      <p>10.00% (30 days)</p>
                    </div>
                  </div>
                </div> -->

</div>
</div>

@endsection()