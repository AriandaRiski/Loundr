@extends('template_layout.template')
@section('konten')


  <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Produk</h3>
                <div class="card-tools">
                <a href="{{url('/produk/create')}}" type="button" class="btn btn-success btn-lg">
                    <i class="fa fa-plus-circle"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Produk</th>
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
                    <td>
                   {{number_format($pro->tarif_produk)}}
                    </td>
                    <td>
                    <div class="btn-group">
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
            <!-- /.card -->
          </div>
@endsection

