<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BarangController extends Controller
{
    public function index()
    {
        $data = Barang::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.barang.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.barang.create');
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Barang::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/barang');
    }
    public function edit($id)
    {
        $data = Barang::find($id);
        return view('superadmin.barang.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Barang::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/barang');
    }
    public function delete($id)
    {
        Barang::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/barang');
    }
}
