@extends('template_layout.template')
@section('title', 'Home')
@section('konten')
          <div class="content-body"><!-- Widgets Statistics start -->
<section id="widgets-Statistics">
  <div class="row">
    <div class="col-12 mt-1 mb-2">
      
    </div>
  </div>
  <div class="row">
 
 
   
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto my-1">
            <i class="bx bx-purchase-tag font-medium-5"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">TRANSAKSI</p>
          <h2 class="mb-0">{{$transaksi_user}}</h2>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto my-1">
            <i class="bx bx-shopping-bag font-medium-5"></i>
          </div>
          <p class="text-muted mb-0 line-ellipsis">PRODUK</p>
          <h2 class="mb-0">{{$produk_user}}</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Widgets Statistics End -->
@endsection