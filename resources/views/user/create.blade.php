@extends('layout.app')

@section('content')
<br>
    <div class="container">
        <br>
        <div class="card">
            <div class="card-body">
                <center>
                    <h1>Tambah User</h1>
                </center>
                <form method="POST">
                    @csrf
                    <label for="">Nama</label>
                    <input name="nama" type="text" class="form-control" required>
                    <br>
                    <label for="">Email</label>
                    <input name="email" type="email" class="form-control" required>
                    <br>
                    <label for="">Telp</label>
                    <input name="telp" type="number" class="form-control" required>
                    <br>
                    <label for="">Password</label>
                    <input name="password" type="password" class="form-control" required>
                    <br>
                    <label for="">Role / Peran</label>
                    <select name="peran" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                    <br>
                    <div class="d-grid gap-2">
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
@endsection