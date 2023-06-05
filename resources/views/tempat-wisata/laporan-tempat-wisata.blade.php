<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Tempat Wisata</title>
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
        <h5 class="mb-2">Laporan Data Tempat Wisata</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>no</th>
                <th>Nama Jenis Wisata</th>
                <th>Nama Tempat WIsata</th>
                <th>Alamat</th>
                <th>Deskripsi</th>
                <th>Jam Buka</th>
                <th>Jam Tutup</th>
                <th>Harga Tiket</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($tempatwisata as $dok)
                <?php $no++; ?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $dok->nama_jenis_wisata }}</td>
                    <td>{{ $dok->nama_tempat_wisata }}</td>
                    <td>{{ $dok->alamat }}</td>
                    <td>{{ $dok->deskripsi }}</td>
                    <td>{{ $dok->jam_buka }}</td>
                    <td>{{ $dok->jam_tutup }}</td>
                    <td>{{ $dok->harga_tiket }}</td>
                    <td>
            @endforeach
        </tbody>

    </table>

</body>

</html>
