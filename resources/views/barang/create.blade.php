@extends('layout.app')

@section('content')
<br>
    <div class="container">
        <br>
        <div class="card">
            <div class="card-body">
                <center>
                    <h1>Tambah Barang</h1>
                </center>
                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="">Nama Barang</label>
                    <input name="nama" type="text" class="form-control" required>
                    <br>
                    <label for="">Gambar Barang</label>
                    <input name="gambar" type="file" class="form-control" required>
                    <br>
                    <label for="">Harga Barang</label>
                    <input name="harga" type="number" class="form-control" required>
                    <br>
                    <label for="">Stok Barang</label>
                    <input name="jml_stok" type="number" class="form-control" required>
                    <br>
                    <div class="d-grid gap-2">
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
@endsection