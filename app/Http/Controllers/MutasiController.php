<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Mutasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MutasiController extends Controller
{
    public function index()
    {
        $data = Mutasi::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.mutasi.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.mutasi.create');
    }
    public function store(Request $req)
    {

        $param = $req->all();
        $param['dari_ruangan_id'] = Inventaris::find($req->inventaris_id)->ruangan_id;
        $param['ke_ruangan_id'] = $req->ruangan_id;

        Mutasi::create($param);
        Inventaris::find($req->inventaris_id)->update([
            'ruangan_id' => $req->ruangan_id,
        ]);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/mutasi');
    }
    public function edit($id)
    {
        $data = Mutasi::find($id);
        return view('superadmin.mutasi.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        $param['dari_ruangan_id'] = Inventaris::find($req->inventaris_id)->ruangan_id;
        $param['ke_ruangan_id'] = $req->ruangan_id;

        Mutasi::find($id)->update($param);
        Inventaris::find($req->inventaris_id)->update([
            'ruangan_id' => $req->ruangan_id,
        ]);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/mutasi');
    }
    public function delete($id)
    {
        Mutasi::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/mutasi');
    }
}
