@extends('template_layout.template')
@section('title', 'Produk')
@section('konten')


  <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Produk</h3>
                <div class="card-tools">
                  @if (Session::has('success'))
                <div class="alert alert-success">
                  <strong>{{session()->get('success')}}</strong>
                </div>
                @endif
                <a href="{{url('/produk/create')}}" type="button" class="btn btn-success btn-lg">
                    <i class="bx bx-plus-medical nav_icon"></i>
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
                    @if ($pro->user_id_produk == Auth::user()->id)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$pro->nama_produk}}</td>
                    <td>
                   {{number_format($pro->tarif_produk)}}
                    </td>
                    <td>
                    <div class="btn-group">
                        <a href="{{url('/produk/'.$pro->id.'/edit')}}" type="button" class="btn btn-warning" >
                          <i class="bx bxs-edit nav_icon"></i>
                        </a>
                        <form method="POST" action="{{ url('/produk/'.$pro->id) }}" onsubmit="return confirm('Hapus data?')">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-flat">
                          <i class="bx bxs-trash nav_icon"></i>
                        </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  @endif
                 @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
@endsection

