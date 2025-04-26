<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InventarisController extends Controller
{
    public function index()
    {
        $data = Inventaris::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.inventaris.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.inventaris.create');
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Inventaris::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/inventaris');
    }
    public function edit($id)
    {
        $data = Inventaris::find($id);
        return view('superadmin.inventaris.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Inventaris::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/inventaris');
    }
    public function delete($id)
    {
        Inventaris::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/inventaris');
    }
}
