<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Pengguna</title>
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
        <h5 class="mb-2">Laporan Data Pengguna</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Hotel</th>
                <th>Nama Tempat Wisata</th>
                <th>Nilai</th>
                <th>Tanggapan</th>
                <th>Kategori</th>
                <th>Tanggal Penilaian</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($penilaian as $dok)
                <?php $no++; ?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $dok->nama_hotel}}</td>
                    <td>{{ $dok->nama_tempat_wisata }}</td>
                    <td>{{ $dok->nilai }}</td>
                    <td>{{ $dok->tanggapan }}</td>
                    <td>{{ $dok->kategori }}</td>
                    <td>{{ $dok->tgl_penilaian }}</td>
                    <td>
            @endforeach
        </tbody>

    </table>

</body>

</html>
