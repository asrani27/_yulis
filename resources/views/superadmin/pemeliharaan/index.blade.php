@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data pemeliharaan</h3>

                <div class="card-tools">
                    <a href="/superadmin/pemeliharaan/add" class='btn btn-sm btn-info'>Tambah Data</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap table-sm table-bordered">
                    <thead class="bg-info">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nomor</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Satuan Barang</th>
                            <th>Jenis Pemeliharaan</th>
                            <th>Kondisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr style="font-size:14px">
                            <td>{{$key + 1}}</td>
                            <td>{{\Carbon\Carbon::parse($item->tanggal)->format('d M Y')}}</td>
                            <td>{{$item->nomor}}</td>
                            <td>{{$item->barang == null ? '' : $item->barang->kode}}</td>
                            <td>{{$item->barang == null ? '' : $item->barang->nama}}</td>
                            <td>{{$item->barang == null ? '' : $item->barang->satuan}}</td>
                            <td>{{$item->barang == null ? '' : $item->barang->jenis}}</td>
                            <td>{{$item->jenis}}</td>
                            <td>{{$item->kondisi}}</td>
                            <td class="text-right">

                                <a href="/superadmin/pemeliharaan/edit/{{$item->id}}" class="btn btn-sm btn-success"><i
                                        class="fa fa-edit"></i></a>
                                <a href="/superadmin/pemeliharaan/delete/{{$item->id}}" class="btn btn-sm btn-danger"
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