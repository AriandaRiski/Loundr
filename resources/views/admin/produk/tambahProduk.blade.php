@extends('template_layout/template')
@section('title','tambah produk')
@section('konten')

          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Produk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <Form method="POST" action="{{url('/produk')}}">
              <div class="card-body">
                  <div class="form-group">
                    @csrf
                    <label>Nama Produk</label>
                    <input type="text" class="form-control" name="nama_produk" placeholder="Masukkan Nama Produk" required="required">
                  </div>
                  <div class="form-group">
                    <label>Tarif</label>
                    <input type="text" class="form-control" name="tarif_produk" id="tarif_produk" maxlength="5" placeholder="Masukkan Tarif Perkilo" required="required">
                  </div>
                </div>
                <div class="card-footer">
                  <a href="{{url('/produk')}}" class="btn btn-danger">Batal</a>
                  <button type="submit" class="btn btn-primary">Simpan</button>

                </div>
              </Form>
            </div>
            <!-- /.card -->

<script>
$(document).ready(function(){
			$('#tarif_produk').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
		});
</script>
@endsection