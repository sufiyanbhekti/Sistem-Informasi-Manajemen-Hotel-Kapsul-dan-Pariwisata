<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Jenis Tempat Wisata</title>
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
        <h5 class="mb-2">Laporan Data Jenis Tempat Wisata</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th style="width: 10px">no</th>
                <th>Nama Jenis Wisata</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($jenistempatwisata as $p)
                <?php $no++; ?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $p->nama_jenis_wisata }}</td>
                    <td>{{ $p->deskripsi }}</td>
                    <td>
            @endforeach
        </tbody>

    </table>

</body>

</html>
