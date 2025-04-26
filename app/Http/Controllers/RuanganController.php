<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RuanganController extends Controller
{
    public function index()
    {
        $data = Ruangan::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.ruangan.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.ruangan.create');
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Ruangan::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/ruangan');
    }
    public function edit($id)
    {
        $data = Ruangan::find($id);
        return view('superadmin.ruangan.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Ruangan::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/ruangan');
    }
    public function delete($id)
    {
        Ruangan::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/ruangan');
    }
}
