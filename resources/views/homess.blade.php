@extends('main')
@section('content')
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome {{$name}}</h3>
                  
                </div>
              </div>
            </div>
          </div>
          <div class="row">
                
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Data Pelanggan</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID Pelanggan</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>No telp</th>
                          <th>Daya</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $dt)
                        <tr>
                          <td>{{$dt->id_pelanggan}}</td>
                          <td>{{$dt->nama_pelanggan}}</td>
                          <td>{{$dt->alamat_pelanggan}}</td>
                          <td>{{$dt->no_telp}}</td>
                          <td>{{$dt->daya}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->

@endsection()