@extends('template_layout/template')
@section('title','Edit Produk')
@section('konten')

          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Produk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <Form method="POST" action="{{ url('/produk/'.$c_produk->id) }}">
              <div class="card-body">
                  <div class="form-group">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <label>Nama Produk</label>
                    <input type="text" class="form-control" name="nama_produk" value="{{$c_produk->nama_produk}}">
                  </div>
                  <div class="form-group">
                    <label>Tarif</label>
                    <input type="text" class="form-control" name="tarif_produk" maxlength="5" value="{{$c_produk->tarif_produk}}">
                    
                  </div>
                </div>
                <div class="card-footer">
                  <a href="{{url('/produk')}}" class="btn btn-danger">Batal</a>
                  <button type="submit" class="btn btn-primary">Simpan</button>

                </div>
              </Form>
            </div>
            <!-- /.card -->
           
@endsection