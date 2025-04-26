<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
</head>

<body>

    <table width="100%">
        <tr>
            <td width="15%">

            </td>
            <td style="text-align: center;" width="60%">
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('logo/tw.png'))) }}"
                    width="70px"><br />
                <font size="24px"><b>SISTEM INFOMASI INVENTARISASI BARANG <br /> DI UPTD SMP NEGERI 3 PANYIPATAN
                    </b></font><br />
                JL Raya Batakan, Desa Kandangan Baru Kec. Panyipatan Desa Tanah Laut
            </td>
            <td width="15%">
            </td>
        </tr>
    </table>
    <hr>
    <h3 style="text-align: center">LAPORAN DATA MUTASI
    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nomor Mutasi</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jenis</th>
            <th>Satuan</th>
            <th>Dari Ruangan</th>
            <th>Ke Ruangan</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$item->tanggal}}</td>
            <td>{{$item->nomor}}</td>
            <td>{{$item->inventaris == null ? '': $item->inventaris->barang->kode}}</td>
            <td>{{$item->inventaris == null ? '': $item->inventaris->barang->nama}}</td>
            <td>{{$item->inventaris == null ? '': $item->inventaris->barang->jenis}}</td>
            <td>{{$item->inventaris == null ? '': $item->inventaris->barang->satuan}}</td>
            <td>{{$item->dari == null ? '': $item->dari->nama}}</td>
            <td>{{$item->ke == null ? '': $item->ke->nama}}</td>
        </tr>
        @endforeach
    </table>

    <table width="100%">
        <tr>
            <td width="60%"></td>
            <td></td>
            <td><br />Pelaihari, {{\Carbon\Carbon::now()->format('d M Y')}}<br />
                Kepala Sekolah<br /><br /><br /><br />

                <u>-</u><br />
                NIP.xxxxxxxxx
            </td>
        </tr>
    </table>
</body>

</html>