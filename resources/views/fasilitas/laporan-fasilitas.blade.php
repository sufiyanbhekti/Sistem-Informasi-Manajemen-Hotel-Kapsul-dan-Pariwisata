<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Fasilitas</title>
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
        <h5 class="mb-2">Laporan Data Fasilitas</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>no</th>
                <th>Nama Fasilitas</th>
                <th>Jenis Fasilitas</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($fasilitas as $fas)
                <?php $no++; ?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $fas->nama_fasilitas }}</td>
                    <td>{{ $fas->jenis_fasilitas}}</td>
                    <td>{{ $fas->deskripsi }}</td>
                    <td>
            @endforeach
        </tbody>

    </table>

</body>

</html>
