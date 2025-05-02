@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Data</h3>

            </div>
            <form method="POST" action="/superadmin/pemeliharaan/edit/{{$data->id}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal</label>
                        <input type="date" name="tanggal" value="{{$data->tanggal}}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nomor Mutasi</label>
                        <input type="text" name="nomor" class="form-control" value="{{$data->nomor}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Data Barang</label>
                        <select class="form-control" name="barang_id">
                            @foreach (barang() as $item)
                            <option value="{{$item->id}}" {{$data->barang_id == $item->id ?
                                'selected':''}}>{{$item->kode}} - {{$item->nama}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Pemeliharaan</label>
                        <input type="text" name="jenis" class="form-control" value="{{$data->jenis}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">kondisi</label>
                        <input type="text" name="kondisi" class="form-control" value="{{$data->kondisi}}" required>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/superadmin/pemeliharaan" class="btn btn-danger">Kembali</a>
                </div>
            </form>
            <!-- /.card-body -->
        </div>
    </div>
</div>

@endsection
@push('js')
<script>
    $(document).ready(function () {
    const triwulanOptions = {
    "1": ["1", "2"],
    "2": ["3", "4"]
    };

    const bulanOptions = {
    "1": ["Januari", "Februari", "Maret"],
    "2": ["April", "Mei", "Juni"],
    "3": ["Juli", "Agustus", "September"],
    "4": ["Oktober", "November", "Desember"]
    };

    $("#semester").change(function () {
    let semesterVal = $(this).val();
    $("#triwulan").html('<option value="">-triwulan-</option>');
    $("#bulan").html('<option value="">-bulan-</option>');

    if (semesterVal) {
    triwulanOptions[semesterVal].forEach(function (triwulan) {
    $("#triwulan").append('<option value="' + triwulan + '">' + triwulan + '</option>');
    });
    }
    });

    $("#triwulan").change(function () {
    let triwulanVal = $(this).val();
    $("#bulan").html('<option value="">-bulan-</option>');

    if (triwulanVal) {
    bulanOptions[triwulanVal].forEach(function (bulan) {
    $("#bulan").append('<option value="' + bulan + '">' + bulan + '</option>');
    });
    }
    });
    });
</script>
@endpush