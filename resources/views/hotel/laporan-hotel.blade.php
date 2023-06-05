<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Hotel</title>
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
        <h5 class="mb-2">Laporan Data Hotel</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>no</th>
                <th>Jenis Hotel</th>
                <th>Nama Hotel</th>
                <th>Alamat</th>
                <th>Deskripsi</th>
                <th>Gambar Hotel</th>
                <th>Check In</th>
                <th>Check Out</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($hotel as $hot)
                <?php $no++; ?>
                <tr>
                    <td>{{ $no}}</td>
                    <td>{{ $hot->nama_jenis_hotel }}</td>
                    <td>{{ $hot->nama_hotel }}</td>
                    <td>{{ $hot->alamat }}</td>
                    <td>{{ $hot->deskripsi }}</td>
                    <td>{{ $hot->gambar_hotel }}</td>
                    <td>{{ $hot->check_in }}</td>
                    <td>{{ $hot->check_out }}</td>
                    <td>
            @endforeach
        </tbody>

    </table>

</body>

</html>
