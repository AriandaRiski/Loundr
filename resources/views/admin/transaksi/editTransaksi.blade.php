@extends('template_layout/template')

@section('konten')


  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{asset('template/')}}/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template/')}}/dist/css/adminlte.min.css">

  <script>
function startCalc(){
interval = setInterval("calc()",1);}
function calc(){

c = document.addTrans.bayar.value;
d = document.addTrans.sisa.value;
document.addTrans.sisa2.value = d - c; }
function stopCalc(){
clearInterval(interval);}
</script>

  <div class="col-md-6">
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Transaksi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <Form method="POST" action="{{url('/transaksi/'.$c_trans->id)}}" name="addTrans">
              <div class="card-body">
                  <div class="form-group">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <label>Nama Pelanggan</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required="required" value="{{$c_trans->nama}}">
                  </div>
                  <div class="form-group">
                    <label>No.hp</label>
                    <input type="text" class="form-control" name="hp" maxlength="13" placeholder="Masukkan Nomor Hp ( OPSIONAL)" value="{{$c_trans->hp}}">
                  </div>
                  <div class="form-group">
                  <label>Tanggal Pemesanan</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text"  name="tgl_pesan" id="date" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{$c_trans->tgl_pesan}}"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <label>Tanggal Pengambilan</label>
                    <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                        <input type="text"  name="tgl_ambil" id="date" class="form-control datetimepicker-input" data-target="#reservationdate1" value="{{$c_trans->tgl_ambil}}"/>
                        <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
            <label for="price">Produk</label>
                              <select class="form-control" name="package" id="package">
                                @foreach ($pro as $data)
                      <option data-price="{{$data->tarif_produk}}" data-id_produk="{{$data->id}}" value="{{$c_trans->nama_produk}}">{{$data->nama_produk}}</option>
                    @endforeach          
                    </select>
                    </div>

    <div class="form-group">
        <label for="price">Tarif</label>
        <input type="text" name="price" value="{{$c_trans->tarif_produk}}" onFocus="startCalc();" onBlur="stopCalc();" readonly/>
        <label for="price">ID</label>
        <input type="text" name="id_produk" value="{{$c_trans->id_produk}}" readonly/>
    </div>


                  <div class="form-group">
                  <label>Berat</label>
                    <input type="number" step="any" class="form-control" name="berat" placeholder="Masukkan Berat dalam Kg" required onFocus="startCalc();" onBlur="stopCalc();" value="{{$c_trans->berat}}" />
                    </div>
                
                <div class="form-group">
                  <label>Keterangan</label>
                   <input type="text" class="form-control" name="keterangan" value="{{$c_trans->keterangan}}">
                    </div>
                  </div>
                </div>

                
                <div class="form-group">
                  <label>Sisa Bayar</label>
    <input readonly type=text value="{{$c_trans->bayar}}" name="sisa" class="form-control" readonly>
                    </div>
                    
                    <div class="form-group">
                  <label>Bayar</label>
                    <input type="text"  class="form-control" name="bayar" placeholder="Bayar" required onFocus="startCalc();" onBlur="stopCalc();" />
                    </div>

                    <div class="form-group">
                  <label>Sisa</label>
    <input readonly type=text value='0' name="sisa2" onchange='tryNumberFormat(this.form.thirdBox);' class="form-control" readonly>
                    </div>

                <div class="card-footer">
                  <a href="{{url('/transaksi')}}" class="btn btn-danger">Batal</a>
                  <button type="submit" class="btn btn-primary">Simpan</button>

                </div>
              </Form>
            </div>
            

<script src="{{asset('template/')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template/')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="{{asset('template/')}}/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('template/')}}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="{{asset('template/')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('template/')}}/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="{{asset('template/')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="{{asset('template/')}}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('template/')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('template/')}}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="{{asset('template/')}}/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="{{asset('template/')}}/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template/')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('template/')}}/dist/js/demo.js"></script>

<script>
            //Date picker1
    $('#reservationdate1').datetimepicker({
        format: 'L',
        autoclose: true,
    });
          //Date picker
          $('#reservationdate').datetimepicker({
        format: 'L',
        autoclose: true,
    });

    $('#package').on('change', function(){
  let price = $('#package option:selected').data('price');
  let id_produk = $('#package option:selected').data('id_produk');
  
  $('[name=price]').val(price);
  $('[name=id_produk]').val(id_produk);
  
});
    </script>
            
@endsection