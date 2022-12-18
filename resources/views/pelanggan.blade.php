@extends('main')
@section('content')
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="row">
      <div class="col-12 col-xl-8 mb-2 mb-xl-0">
        <h3 class="font-weight-bold">Data Pelanggan</h3>
        <h5 class="font-weight-normal mb-0">Admin : <span class="text-primary">{{$nama}}</span></h5>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 mb-3">
    <form action="/pelanggan/search" method="GET" class="col-10 d-flex">
      <input type="text" name="idpel" class="form-control rounded" placeholder="Cari bedasarkan id Pelanggan" />
      <button type="submit" class="input-group-text bg-primary border-4 rounded">
        <i class="ti-search text-white"></i>
      </button>
    </form>
  </div>
<div class="col-lg-10 grid-margin stretch-card">
  <div class="card" style="width: 60em">
    <div class="card-body">                
      <div class="my-2 mx-3">
      <a class="text-white" data-toggle="modal" title="Insert Data" data-target="#insertdata">
        <button type="button" class="btn btn-outline-primary btn-icon-text" style="height: 3.2em;">
          <i class="ti-upload"></i>Insert</button>
        </a>
        <div class="modal fade" id="insertdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="background:rgba(0, 0, 0, 0.47);" aria-hidden="false" data-backdrop="false">
              <div class="modal-dialog modal-dialog"  role="document" >
                <div class="modal-content text-left p-2" style="width: 100%;">
                  <div class="modal-header bg-primary text-white">
                    <h4 class="modal-title" id="exampleModalLongTitle">Tambah Data Pelanggan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span class="text-white" aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form class="forms-sample" action="/pelanggan/insertpelanggan" method="POST">
                    @csrf
                  <div class="modal-body text-start">
                    <div class="form-group">
                      <label for="IdPelanggan">ID Pelanggan</label>
                      <input type="number" name="idpelanggan" class="form-control"  min="0" id="InputIdPelanggan" placeholder="Masukkan 12 angka ID Pelanggan ..." minlength="12" maxlength="12"required>
                    </div>
                    <div class="form-group">
                      <label for="InputNama">Nama</label>
                      <input type="text" name="nama" class="form-control" id="InputNama" placeholder="Masukkan Nama Pelanggan ..." required>
                    </div>
                    <div class="form-group">
                      <label for="InputAlamat">Alamat</label>
                      <input type="text" name="alamat" class="form-control" id="InputAlamat" placeholder="Masukkan Alamat Pelanggan ..." required>
                    </div>
                    <div class="form-group">
                      <label for="SelectTarif">Tarif</label>
                        <select class="form-control" id="SelectTarif" name="tarif" required >
                          <option class="text-secondary" value="" disabled selected>Pilih Tarif ...</option>
                          <option value="B3">B3</option>
                          <option value="L">L</option>
                          <option value="LB3">LB3</option>
                          <option value="LP2">LP2</option>
                          <option value="LS3K">LS3K</option>
                          <option value="P2">P2</option>
                          <option value="P3">P3</option>
                          <option value="S3">S3</option>
                          <option value="R3">R3</option>
                          <option value="S3K">S3K</option>
                          <option value="T">T</option>
                        </select>
                      </div>
                      <div class="form-group">
                      <label for="IdDaya">Daya</label>
                      <input type="number" name="daya" class="form-control"  min="0" id="InputDaya" placeholder="Masukkan jumlah angka daya ..." required>
                    </div>
                    <div class="form-group">
                      <label for="InputGardu">Gardu</label>
                      <input type="text" name="gardu" class="form-control" id="InputGardu" placeholder="Masukkan Nama Gardu ..." required>
                    </div>    
                  </div>
                  <div class="modal-footer">
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light" data-dismiss="modal">Cancel</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
        <button type="button" class="btn btn-outline-success" style="height: 3.2em;">
          <i class="ti-file"></i>Upload
        </button>
      </div>
      <p class="mt-4 text-secondary ml-2">*Klik nama pelanggan untuk melihat detail atau edit data pelanggan</p>
    <div class="table table-responsive">
      <table class="table table-striped my-2">
        <thead>
          <tr>
            <th>ID Pelanggan</th>
            <th>Nama</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $dt)
          <tr>
            <td style="width: 20%;">{{$dt->id_pelanggan}}</td>
            <td style="width: 70%;">
              <a class="text-dark" style="cursor: pointer;" data-toggle="modal" title="Show Detail" data-target="#showdetail{{$dt->id}}">
              {{$dt->nama}}
              </a>
              <div class="modal fade" id="showdetail{{$dt->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="background:rgba(0, 0, 0, 0.47);" aria-hidden="false" data-backdrop="false">
              <div class="modal-dialog modal-dialog"  role="document">
                <div class="modal-content text-left" style="width: 100%;">
                <div class="modal-header bg-light">
                  <div class="row">
                <div class="col-md-12 d-flex">
                    <h3 class="modal-title" id="exampleModalLongTitle">{{$dt->nama}}</h3>
                    <code class="pt-3 fs-3 text-primary">({{$dt->id_pelanggan}})</code>
                </div>
                <div class="col-md-12 mt-2">
                  <i class="text-secondary"><b>Latest update:</b><small> {{$dt->updated_at}}</small></i>
                </div>
</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body text-start">
                  <div class="row">
                    <div class="col-md-6">
                    <h5 class="font-weight-bold">Nama Gardu</h5>
                      <p>{{$dt->gardu}}</p>
                      <br>
                      <h5 class="font-weight-bold">Alamat</h5>
                      <p>{{$dt->alamat}}</p>
                    </div>
                    <div class="col-md-6">
                      <h5 class="font-weight-bold">Tarif/Daya</h5>
                      <p>{{$dt->tarif}} / {{$dt->daya}}</p>
                    </div>
                  </div>
                  </div>
                  <div class="modal-footer bg-light d-flex justify-content-between">
                  <a class="text-white" data-toggle="modal" title="Edit Data" data-target="#editdata{{$dt->id}}">
                <button type="button" class="btn text-dark btn btn-outline-warning ">Edit</button>
              </a>
                    <button class="btn btn-outline-primary" data-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>
            </td>
            <td style="width: 10%;">
              
              <div class="modal fade" id="editdata{{$dt->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="background:rgba(0, 0, 0, 0.47);" aria-hidden="false" data-backdrop="false">
              <div class="modal-dialog modal-dialog"  role="document">
                <div class="modal-content text-left" style="width: 100%;">
                <div class="modal-header bg-warning text-white">
                    <h4 class="modal-title" id="exampleModalLongTitle">Edit Data Pelanggan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form class="forms-sample" action="/pelanggan/editpelanggan" method="POST">
                    @csrf
                    <input type="hidden" name="id" class="form-control" id="Idpel" value="{{$dt->id}}" required>
                  <div class="modal-body text-start">
                    <div class="form-group">
                      <label for="IdPelanggan">ID Pelanggan</label>
                      <input type="number" name="idpelanggan" class="form-control"  min="0" id="InputIdPelanggan" value="{{$dt->id_pelanggan}}" minlength="12" maxlength="12"required>
                    </div>
                    <div class="form-group">
                      <label for="InputNama">Nama</label>
                      <input type="text" name="nama" class="form-control" id="InputNama" value="{{$dt->nama}}" required>
                    </div>
                    <div class="form-group">
                      <label for="InputAlamat">Alamat</label>
                      <input type="text" name="alamat" class="form-control" id="InputAlamat" value="{{$dt->alamat}}" required>
                    </div>
                    <div class="form-group">
                      <label for="SelectTarif">Tarif</label>
                        <select class="form-control" id="SelectTarif" name="tarif" required >
                          <option class="text-secondary" value="{{$dt->tarif}}" selected>{{$dt->tarif}}</option>
                          <option value="B3">B3</option>
                          <option value="L">L</option>
                          <option value="LB3">LB3</option>
                          <option value="LP2">LP2</option>
                          <option value="LS3K">LS3K</option>
                          <option value="P2">P2</option>
                          <option value="P3">P3</option>
                          <option value="S3">S3</option>
                          <option value="R3">R3</option>
                          <option value="S3K">S3K</option>
                          <option value="T">T</option>
                        </select>
                      </div>
                      <div class="form-group">
                      <label for="IdDaya">Daya</label>
                      <input type="number" name="daya" class="form-control"  min="0" id="InputDaya" value="{{$dt->daya}}" required>
                    </div>
                    <div class="form-group">
                      <label for="InputGardu">Gardu</label>
                      <input type="text" name="gardu" class="form-control" id="InputGardu" value="{{$dt->gardu}}" required>
                    </div>    
                  </div>
                  <div class="modal-footer">
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light" data-dismiss="modal">Cancel</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

              <a class="text-white" data-toggle="modal" title="Delete Data" data-target="#deletedata{{$dt->id}}">
                <button type="button" class="btn btn-danger text-center py-2">Delete</button>
              </a>
            </td>
            <div class="modal fade" id="deletedata{{$dt->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="background:rgba(0, 0, 0, 0.47);" aria-hidden="false" data-backdrop="false">
              <div class="modal-dialog modal-dialog"  role="document">
                <div class="modal-content text-left" style="width: 100%;">
                  <div class="modal-header ">
                    <h5 class="modal-title bg" id="exampleModalLongTitle"><i class="ti-alert m-1"></i>ATTENTION!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body text-start">
                    <h5 class="m-0">Apakah anda yakin ingin menghapus data ini??</h5>
                  </div>
                  <div class="modal-footer">
                    <a class="text-white">
                      <button type="button" class="btn btn-outline-primary text-center py-2" data-dismiss="modal" aria-label="Close">Batalkan</button>
                    </a>
                    <a class="text-white" onclick="myFunction()" href="/pelanggan/delete/{{$dt->id}}">
                      <button type="button" class="btn btn-outline-danger text-center py-2">Hapus</button>
                    </a>

                  </div>
                </div>
              </div>
            </div>    
          </tr>
        @endforeach
      </tbody>
    </table>
<div class="mt-4 d-flex justify-content-center">
@if($search == false)
{!! $data->links() !!}
@else
<a type="button" href="/pelanggan" class="btn btn-outline-dark btn-fw ml-3 mt-2">Semua Data</a>
@endif
</div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
function myFunction() {
  alert("Data Berhasil Dihapus");
}
</script>
@endsection()