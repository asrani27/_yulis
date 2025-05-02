@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data pegawai</h3>

                <div class="card-tools">
                    <a href="/superadmin/pegawai/add" class='btn btn-sm btn-info'>Tambah Data</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap table-sm table-bordered">
                    <thead class="bg-info">
                        <tr>
                            <th>No</th>
                            <th>NIP/NIK</th>
                            <th>Nama</th>
                            <th>Jkel</th>
                            <th>Tanggal Lahir</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr style="font-size:14px">
                            <td>{{$key + 1}}</td>
                            <td>{{$item->nip}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->jkel}}</td>
                            <td>{{\Carbon\Carbon::parse($item->tgl_lahir)->format('d M Y')}}</td>
                            <td>{{$item->jabatan}}</td>
                            <td class="text-right">

                                <a href="/superadmin/pegawai/edit/{{$item->id}}" class="btn btn-sm btn-success"><i
                                        class="fa fa-edit"></i></a>
                                <a href="/superadmin/pegawai/delete/{{$item->id}}" class="btn btn-sm btn-danger"
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