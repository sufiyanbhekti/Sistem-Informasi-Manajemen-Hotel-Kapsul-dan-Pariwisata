<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Objek Atraksi</title>
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
        <h5 class="mb-2">Laporan Data Objek Atraksi</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Tempat wisata</th>
                <th>Nama Objek Atraksi</th>
                <th>Tipe Atraksi</th>
                <th>Kapasitas Atraksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($objekatraksi as $dok)
                <?php $no++; ?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $dok->nama_tempat_wisata }}</td>
                    <td>{{ $dok->nama }}</td>
                    <td>{{ $dok->tipe_atraksi }}</td>
                    <td>{{ $dok->kapasitas_atraksi }}</td>
                    <td>
            @endforeach
        </tbody>

    </table>

</body>

</html>
