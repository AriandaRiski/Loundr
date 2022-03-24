@extends('template_layout.template')
@section('title','Detail User')
@section('konten')
<div>
    <table class="table table-hover table-responsive" id="dataTables-example">
        <thead>
            <tr>
                <th>No</th>
                <th>Jumlah Produk</th>
                <th>Jumlah Transaksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>

            <tr>
                <td>{{$no++}}</td>
                <td>{{$show_produk}}</td>
                <td>{{$show_trans}}</td>


            </tr>

        </tbody>
    </table>

</div>
@endsection
