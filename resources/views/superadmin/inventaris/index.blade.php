@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data inventaris</h3>

                <div class="card-tools">
                    <a href="/superadmin/inventaris/add" class='btn btn-sm btn-info'>Tambah Data</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap table-sm table-bordered">
                    <thead class="bg-info">
                        <tr>
                            <th>No</th>
                            <th>Tgl Barang Masuk</th>
                            <th>No Inventaris</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Satuan Barang</th>
                            <th>Ruangan</th>
                            <th>Pegawai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr style="font-size:14px">
                            <td>{{$key + 1}}</td>
                            <td>{{\Carbon\Carbon::parse($item->tanggal_masuk)->format('d M Y')}}</td>
                            <td>{{$item->nomor}}</td>
                            <td>{{$item->barang == null ? '' : $item->barang->kode}}</td>
                            <td>{{$item->barang == null ? '' : $item->barang->nama}}</td>
                            <td>{{$item->barang == null ? '' : $item->barang->jenis}}</td>
                            <td>{{$item->barang == null ? '' : $item->barang->satuan}}</td>
                            <td>{{$item->ruangan == null ? '' : $item->ruangan->nama}}</td>
                            <td>{{$item->pegawai == null ? '' : $item->pegawai->nama}}</td>
                            <td class="text-right">

                                <a href="/superadmin/inventaris/edit/{{$item->id}}" class="btn btn-sm btn-success"><i
                                        class="fa fa-edit"></i></a>
                                <a href="/superadmin/inventaris/delete/{{$item->id}}" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin dihapus?');"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

@endsection