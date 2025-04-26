<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = Pegawai::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.pegawai.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.pegawai.create');
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Pegawai::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/pegawai');
    }
    public function edit($id)
    {
        $data = Pegawai::find($id);
        return view('superadmin.pegawai.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Pegawai::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/pegawai');
    }
    public function delete($id)
    {
        Pegawai::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/pegawai');
    }
}
