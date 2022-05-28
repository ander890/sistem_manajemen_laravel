<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\BarangModel;
use Toastr;

class BarangController extends Controller
{
    public function index(Request $request){
        $data['barang'] = BarangModel::get();
        $data['user'] = UserModel::get();

        return view("index", $data);
    }

    public function createPage(Request $request){
        return view("barang.create");
    }

    public function createAction(Request $request){
        $nama = $request->nama;
        $harga = $request->harga;
        $jml_stok = $request->jml_stok;

        $gambar = $request->file("gambar");
        $gambar->move("upload", $gambar->getClientOriginalName());

        $barang = new BarangModel;
        $barang->nama = $nama;
        $barang->harga = $harga;
        $barang->gambar = url('upload/'.$gambar->getClientOriginalName());
        $barang->jml_stok = $jml_stok;
        $barang->save();

        Toastr::success('Tambah barang sukses', 'Success');
        return redirect("/dashboard");
    }

    public function editPage(Request $request){
        $id = $request->id;

        $data['barang'] = BarangModel::findOrFail($id);
        return view("barang.edit", $data);
    }

    public function editAction(Request $request){
        $nama = $request->nama;
        $harga = $request->harga;
        $jml_stok = $request->jml_stok;

        $gambar = $request->file("gambar");

        $barang = BarangModel::findOrFail($request->id);
        $barang->nama = $nama;
        $barang->harga = $harga;
        if($gambar){
            $gambar->move("upload", $gambar->getClientOriginalName());
            $barang->gambar = url('upload/'.$gambar->getClientOriginalName());
        }
        $barang->jml_stok = $jml_stok;
        $barang->save();

        Toastr::success('Edit barang sukses', 'Success');
        return redirect()->back();
    }

    public function deleteAction(Request $request){
        $id = $request->id;

        $barang = BarangModel::findOrFail($id);
        $barang->delete();

        Toastr::success('Hapus barang sukses', 'Success');
        return redirect("/dashboard");
    }
}
