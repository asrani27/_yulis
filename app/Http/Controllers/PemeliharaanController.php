<?php

namespace App\Http\Controllers;

use App\Models\Pemeliharaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PemeliharaanController extends Controller
{
    public function index()
    {
        $data = Pemeliharaan::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.pemeliharaan.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.pemeliharaan.create');
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Pemeliharaan::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/pemeliharaan');
    }
    public function edit($id)
    {
        $data = Pemeliharaan::find($id);
        return view('superadmin.pemeliharaan.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Pemeliharaan::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/pemeliharaan');
    }
    public function delete($id)
    {
        Pemeliharaan::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/pemeliharaan');
    }
}
