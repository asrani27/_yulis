@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data ruangan</h3>

                <div class="card-tools">
                    <a href="/superadmin/ruangan/add" class='btn btn-sm btn-info'>Tambah Data</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <table class="table table-hover text-nowrap table-sm table-bordered">
                    <thead class="bg-info">
                        <tr>
                            <th>No</th>
                            <th>Nama Ruangan</th>
                            <th>Luas Ruangan</th>
                            <th>Daftar Barang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr style="font-size:14px">
                            <td>{{$key + 1}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->luas}}</td>
                            <td>
                                @if ($item->inventaris == null)
                                -
                                @else
                                <ul>
                                    @foreach ($item->inventaris as $item2)
                                    <li>{{$item2->barang->kode}} - {{$item2->barang->nama}}</li>
                                    @endforeach
                                </ul>
                                @endif
                            </td>
                            <td class="text-right">

                                <a href="/superadmin/ruangan/edit/{{$item->id}}" class="btn btn-sm btn-success"><i
                                        class="fa fa-edit"></i></a>
                                <a href="/superadmin/ruangan/delete/{{$item->id}}" class="btn btn-sm btn-danger"
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