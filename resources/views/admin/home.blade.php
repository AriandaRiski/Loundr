@extends('template_layout.template')
@section('konten')
<!-- Info boxes -->
        <div class="row">
<div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fab fa-product-hunt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Produk</span>
                <span class="info-box-number">
                  {{$total_produk}}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-chart-line"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Transaksi</span>
                <span class="info-box-number">{{$total_transaksi}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          
          <!-- /.col -->
          </div>
@endsection