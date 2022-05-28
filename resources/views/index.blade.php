@extends('layout.app')

@section('content')
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" id="barang-btn" href="#">Barang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="user-btn" href="#">User</a>
            </li>
        </ul>
        <div id="barang-tab">
            <br>
            <div class="d-grid gap-2">
                <a class="btn btn-success" href="{{ url('/barang/create') }}">Tambah Barang</a>
            </div>
            <br>
            <table class="table table-striped datatable">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barang as $b)
                    <tr>
                        <td>{{ $b->id }}</td>
                        <td><img src="{{ $b->gambar }}" alt="" width="150px"></td>
                        <td>{{ $b->nama }}</td>
                        <td>{{ $b->harga }}</td>
                        <td>{{ $b->jml_stok }}</td>
                        <td>
                            <a class="btn btn-primary margin-5" href="{{ url('/barang/edit/'.$b->id) }}">Edit</a>
                            <a href="{{ url('/barang/delete/'.$b->id) }}" class="btn btn-danger margin-5">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="user-tab">
            <br>
            <div class="d-grid gap-2">
                <a class="btn btn-success" href="{{ url('/user/create') }}">Tambah User</a>
            </div>
            <br>
            <table class="table table-striped datatable">
                <thead>
                    <tr>
                        <th>Kode User</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telp</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $u)
                        <tr>
                            <td>{{ $u->id }}</td>
                            <td>{{ $u->nama }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->telp }}</td>
                            <td>{{ $u->peran }}</td>
                            <td>
                                <a class="btn btn-primary margin-5" href="{{ url('/user/edit/'.$u->id) }}">Edit</a>
                                <a href="{{ url('/user/delete/'.$u->id) }}" class="btn btn-danger margin-5">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready( function () {

            $("#barang-tab").show();
            $("#user-tab").hide();

            $("#barang-btn").addClass("active");
            $("#user-btn").removeClass("active");


            $('.datatable').DataTable();

            $("#barang-btn").click(function(){
                $("#barang-tab").show();
                $("#user-tab").hide();

                $("#barang-btn").addClass("active");
                $("#user-btn").removeClass("active");
            });

            $("#user-btn").click(function(){
                $("#barang-tab").hide();
                $("#user-tab").show();

                $("#barang-btn").removeClass("active");
                $("#user-btn").addClass("active");
            });
        });
    </script>
    <style>
        .margin-5{
            margin: 5px !important
        }
    </style>
@endsection