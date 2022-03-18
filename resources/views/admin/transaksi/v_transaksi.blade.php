@extends('template_layout/template')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
@section('title','Transaksi')
@section('konten')
<div class="container">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Daftar Transaksi</h2>
                        <a  type="button" class="btn btn-success btn-lg float-right" href="{{url ('/transaksi/create')}}"> 
                <i class="bx bx-plus-medical nav_icon"></i>
                 </a>
                    </div>
                    <div class="panel-body">
        <form class="form-horizontal" action="{{url('/transaksi/cari')}}" method="get"  align="right">
            <input type="text" name="cari" value="{{ old('cari') }}">
            <input type="submit" value="CARI">
            </form>
            <br>
                <table id="example1" class="table table-hover table-responsive-sm">
                <thead>
				        <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>TANGGAL SELESAI</th>
                    <th>BERAT</th>
                    <th>BAYAR</th>
                    <th>AKSI</th>
                    <th>STATUS</th>
		          </tr>
					      </thead>
						    <tbody>
                  <?php $no=1 ?>
                @foreach ($transs as $trans)
                      @if ($trans->user_id == Auth::user()->id)
                      <tr>
                        <td>{{$no++}}</td>
                        <td>{{$trans->nama}}</td>
                        <td>{{$trans->tgl_ambil}}</td>
                        <td>{{$trans->berat}} Kg</td>
                        <td>
                        <?php
                          $number = $trans->bayar;
                          $format_indonesia = number_format ($number, 0, ',', '.');
                          if ($trans->bayar != 0){
                            echo "<button class='btn btn-danger btn-shadowed popover-hover btn-xs' data-container='body' data-toggle='tooltip' data-placement='left' data-content='Belum Lunas'><i class='icon-power-switch'></i>Rp.{$format_indonesia}</button>";
                            }else{
                              echo "<button class='btn btn-info btn-shadowed popover-hover btn-xs' data-container='body' data-toggle='tooltip' data-placement='left' data-content='Lunas'><i class='fa fa-check'></i>Lunas</button>";
                            }
                      ?>
                        </td>
                        
                      <td> <div class="btn-group">

                      <div class="col-lg-6 mb-1">
              <div class="btn-group" role="group" aria-label="Basic example">
              <a href="{{url('/transaksi/'.$trans->id.'/edit')}}" type="button" class="btn btn-outline-warning" >
              <i class="bx bxs-edit nav_icon"></i>
              </a>
                <button disabled>
                <form method="POST" action="{{ url('/transaksi/'.$trans->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-outline-danger">
                              <i class="bx bxs-trash nav_icon"></i>
                            </button>
                            </form>    
              </button>
              @if ($trans->diambilORbelum ==0)
                <a href="{{url('/transaksi/struk/'.$trans->id)}}" type="button" class="btn btn-outline-primary btn-sm" target="_blank" >
                  <i class="bx bxs-printer nav_icon"></i>
                </a>
              @else
              <button class="btn btn-outline-primary btn-sm" target="_blank" disabled >
                <i class="bx bxs-printer nav_icon"></i>
              </button>
              @endif
                            
              </div>
              
            </div>
                        </td>
                        <td>   
                        @if ($trans->diambilORbelum ==0)
                      <a href="{{url('/transaksi/status/'.$trans->id)}}" class="btn btn-danger btn-sm">Belum Diambil</a>
                      @else
                      <a href="{{url('/transaksi/status/'.$trans->id)}}" class="btn btn-primary btn-sm">Sudah Diambil</a>
                      @endif  
                      </td>
                      </tr>
                      @endif
                      @endforeach
                
                 </tfoot>
                </table>
            jumlah data : {{ $transs->total() }}<br>
            <center>{{$transs->render()}}</center>
    </div>
    </div>
    </div>
</div>
</div>
@endsection