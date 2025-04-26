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
    <h3 style="text-align: center">LAPORAN DATA BARANG
    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jenis</th>
            <th>Satuan</th>
            <th>Fungsi</th>
            <th>Keterangan</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach ($data as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{$item->kode}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->jenis}}</td>
            <td>{{$item->satuan}}</td>
            <td>{{$item->fungsi}}</td>
            <td>{{$item->keterangan}}</td>
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