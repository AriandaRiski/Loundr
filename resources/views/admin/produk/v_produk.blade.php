@extends('template_layout.template')
@section('konten')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Produk</h3>
                <div class="float-right">

                <!-- Button trigger modal -->
      <!-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#staticBackdrop">
        <i class="fa fa-plus-circle"></i>
      </button> -->

      <a href="{{url('/produk/create')}}" type="button" class="btn btn-success btn-lg">
  <i class="fa fa-plus-circle"></i>
      </a>

      

<!-- Modal -->
<!-- <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="staticBackdropLabel">Tambah Produk</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{url('/produk/create')}}">
                <div class="card-body">
                  <div class="form-group">
          @csrf
                    <label>Nama Produk</label>
                    <input type="text" class="form-control" name="nama_produk" placeholder="Masukkan Nama Produk">
                  </div>
                  <div class="form-group">
                    <label>Tarif</label>
                    <input type="text" class="form-control" name="tarif_produk" maxlength="5" placeholder="Masukkan Tarif Perkilo">
                    
                  </div>
                </div>
          </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div> -->
</div>
</div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                 </tr>
                 
                  </thead>
                  <tbody>
                  <?php $no=1; ?>
                  @foreach ($produk as $pro)
                      
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$pro->nama_produk}}</td>
                    <td>Rp. {{$pro->tarif_produk}}/Kg </td>
                   <td> <div class="btn-group">
                        <a href="{{url('/produk/'.$pro->id.'/edit')}}" type="button" class="btn btn-warning" >
                          <i class="fas fa-pen"></i>
                        </a>
                        <form method="POST" action="{{ url('/produk/'.$pro->id) }}">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-flat">
                          <i class="fas fa-trash"></i>
                        </button>
                        </form>
                      </div>
                    </td>
                    
                  </tr>
                  @endforeach
                </tbody>
                </table>
              </div>           
  </div>
@endsection

