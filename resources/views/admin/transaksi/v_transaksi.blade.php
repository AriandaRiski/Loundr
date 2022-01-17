@extends('template_layout/template')
@section('konten')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
   <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->  
  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Transaksi</h3>
                <a  type="button" class="btn btn-success btn-lg float-right" href="{{url ('/transaksi/create')}}"> 
                <i class="fa fa-plus-circle"></i>
                 </a>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-responsive">
                  <thead>
				        <tr>
                   <th>NO</th>
                    <th>NAMA</th>
                    <!-- <th>NO. HP</th> -->
                    <th>TANGGAL TERIMA</th>
                    <th>TANGGAL SELESAI</th>
                    <th>BERAT</th>
                    <th>PRODUK</th>
                    <th>TOTAL HARGA</th>
                    <th>BAYAR</th>
                    <th>AKSI</th>
                    <th>STATUS</th>
		           </tr>
					      </thead>
						    <tbody>
                  <?php $no=1 ?>
                @foreach ($trans as $trans)
                      
                      <tr>
                        <td>{{$no++}}</td>
                        <td>{{$trans->nama}}</td>
                        <!-- <td>{{$trans->hp}}</td> -->
                        <td>{{$trans->tgl_pesan}}</td>
                        <td>{{$trans->tgl_ambil}}</td>
                        <td>{{$trans->berat}} Kg</td>
                        <td>{{$trans->nama_produk}}</td>
                        <td>Rp. {{$trans->total_harga}}</td>
                        <td>
                        <?php
                          if ($trans->bayar != 0){
                            echo "<button class='btn btn-danger btn-shadowed popover-hover btn-xs' data-container='body' data-toggle='tooltip' data-placement='left' data-content='Belum Lunas'><i class='icon-power-switch'></i>Rp.{$trans->bayar}</button>";
                            }else{
                              echo "<button class='btn btn-info btn-shadowed popover-hover btn-xs' data-container='body' data-toggle='tooltip' data-placement='left' data-content='Lunas'><i class='fa fa-check'></i>Lunas</button>";
                                  }
                      ?>
                        </td>
                        
                       <td> <div class="btn-group">
                            <a href="{{url('/transaksi/'.$trans->id.'/edit')}}" type="button" class="btn btn-warning" >
                              <i class="fas fa-pen"></i>
                            </a>
                            <form method="POST" action="{{ url('/transaksi/'.$trans->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-flat">
                              <i class="fas fa-trash"></i>
                            </button>
                            </form>
                          </div>
                          <a href="{{url('/transaksi/struk/'.$trans->id)}}" type="button" class="btn btn-primary btn-sm" target="_blank" >
                              CETAK STRUK
                            </a>
                        </td>
                        <td>   
                        @if ($trans->diambilORbelum ==0)
                      <a href="{{url('/transaksi/status/'.$trans->id)}}" class="btn btn-danger btn-sm">Belum Diambil</a>
                      @else
                      <a href="{{url('/transaksi/status/'.$trans->id)}}" class="btn btn-primary btn-sm">Sudah Diambil</a>
                      @endif  
                        
                      <!-- <label class="button {{ ($trans->diambilORbelum ==0) ? 'btn-danger' : 'btn-primary disabled' }}">
                         {{ ($trans->diambilORbelum ==0) ? 'Belum Diambil' : 'Sudah Diambil'}}
                        </label> -->
                      </td>
                      </tr>
                      @endforeach
                
                 </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    
    </div>
    
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('template')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('template')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('template')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('template')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('template')}}/dist/js/demo.js"></script>
<!-- Page specific script -->
<!-- Bootstrap Switch -->
<script src="{{asset('template')}}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

</body>
<script>
  $(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'A4'
            },
            {
              extend: 'excelHtml5',
            }
        ]
    } );
} );

    
</script>
</html>


@endsection