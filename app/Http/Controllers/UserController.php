<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Toastr;

class UserController extends Controller
{
    public function loginPage(Request $request){
        return view("auth.login");
    }

    public function loginAction(Request $request){
        $email = $request->email;
        $password = $request->password;

        $user = UserModel::where("email", $email)->where("password", $password)->first();

        if(!$user){
            Toastr::error('User tidak ditemukan', 'Error');
            return redirect("/login");
        }

        $request->session()->put("login", true);
        $request->session()->put("user", $user);

        return redirect("/dashboard");
    }

    public function logout(Request $request){
        $request->session()->flush();
        Toastr::success('Logout berhasil', 'Success');
        return redirect("/login");
    }

    public function createPage(Request $request){
        return view("user.create");
    }

    public function createAction(Request $request){
        $nama = $request->nama;
        $email = $request->email;
        $telp = $request->telp;
        $password = $request->password;
        $peran = $request->peran;

        $user = new UserModel;
        $user->nama = $nama;
        $user->email = $email;
        $user->telp = $telp;
        $user->password = $password;
        $user->peran = $peran;
        $user->save();

        Toastr::success('Tambah user sukses', 'Success');
        return redirect("/dashboard");
    }

    public function editPage(Request $request){
        $id = $request->id;

        $data['user'] = UserModel::findOrFail($id);
        return view("user.edit", $data);
    }

    public function editAction(Request $request){
        $nama = $request->nama;
        $email = $request->email;
        $telp = $request->telp;
        $password = $request->password;
        $peran = $request->peran;

        $user = UserModel::findOrFail($request->id);
        $user->nama = $nama;
        $user->email = $email;
        $user->telp = $telp;
        $user->password = $password;
        $user->peran = $peran;
        $user->save();

        Toastr::success('Edit user sukses', 'Success');
        return redirect()->back();
    }

    public function deleteAction(Request $request){
        $id = $request->id;

        $user = UserModel::findOrFail($id);
        $user->delete();

        Toastr::success('Hapus user sukses', 'Success');
        return redirect("/dashboard");
    }
}
