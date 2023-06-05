<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Pemesan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5 class="mb-2">Laporan Data Pemesan</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Hotel</th>
                <th>Jenis Kamar</th>
                <th>Nama Tempat wisata</th>
                <th>Nama Objek Atraksi</th>
                <th>Nama Pengguna</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Total Harga</th>
                <th>Metode Pembayaran</th>
                <th>Tanggal Pesan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($pemesan as $dok)
                <?php $no++; ?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $dok->nama_hotel }}</td>
                    <td>{{ $dok->jenis_kamar }}</td>
                    <td>{{ $dok->nama_tempat_wisata }}</td>
                    <td>{{ $dok->nama }}</td>
                    <td>{{ $dok->nama_pengguna }}</td>
                    <td>{{ $dok->alamat }}</td>
                    <td>{{ $dok->no_telp }}</td>
                    <td>{{ $dok->total_harga }}</td>
                    <td>{{ $dok->metode_pembayaran }}</td>
                    <td>{{ $dok->tgl_pesan }}</td>
                    <td>
            @endforeach
        </tbody>

    </table>

</body>

</html>
