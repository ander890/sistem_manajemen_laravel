@extends('layout.app')

@section('content')
<br>
    <div class="container">
        <br>
        <div class="card">
            <div class="card-body">
                <center>
                    <h1>Edit Barang</h1>
                </center>
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="">Nama Barang</label>
                    <input name="nama" type="text" class="form-control" value="{{ $barang->nama }}" required>
                    <br>
                    <label for="">Gambar Barang</label>
                    <br>
                    <img src="{{ $barang->gambar }}" width="150px">
                    <br>
                    <br>
                    <input name="gambar" type="file" class="form-control">
                    <br>
                    <label for="">Harga Barang</label>
                    <input name="harga" type="number" class="form-control" value="{{ $barang->harga }}" required>
                    <br>
                    <label for="">Stok Barang</label>
                    <input name="jml_stok" type="number" class="form-control"  value="{{ $barang->jml_stok }}" required>
                    <br>
                    <div class="d-grid gap-2">
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
@endsection