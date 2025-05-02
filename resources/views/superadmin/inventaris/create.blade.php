@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Data</h3>

            </div>
            <form method="POST" action="/superadmin/inventaris/add">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Masuk</label>
                        <input type="date" name="tanggal_masuk" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}"
                            class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor inventaris</label>
                        <input type="text" name="nomor" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kode Barang</label>
                        <select class="form-control" name="barang_id">

                            @foreach (barang() as $item)
                            <option value="{{$item->id}}">{{$item->kode}} - {{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ruangan</label>
                        <select class="form-control" name="ruangan_id">

                            @foreach (ruangan() as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Pegawai</label>
                        <select class="form-control" name="pegawai_id">

                            @foreach (pegawai() as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" required>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/superadmin/inventaris" class="btn btn-danger">Kembali</a>
                </div>
            </form>
            <!-- /.card-body -->
        </div>
    </div>
</div>

@endsection
@push('js')

@endpush