@extends('template_layout.template')
@section('title','Data User')
@section('konten')
<div>
    <table class="table table-hover table-responsive" id="dataTables-example">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach ($data as $pro)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$pro->name}}</td>
                <td>{{$pro->email}}</td>

                @if($pro->level == '0')
                <td>Super Admin</td>
                @elseif($pro->level == '1')
                <td>User</td>
                @endif
                <td>
                    <a href="{{route('data_user.edit',$pro->id)}}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{route('data_user.destroy',$pro->id)}}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                    <a href="{{route('data_user.show',$pro->id)}}" class="btn btn-info btn-sm">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
