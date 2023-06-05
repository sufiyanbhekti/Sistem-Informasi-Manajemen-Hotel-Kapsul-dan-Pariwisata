@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah pemesanan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <!-- form start -->
                            <form action="{{ route('pemesan.update',$pemesan->id_pemesan) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Hotel</label>
                                        <select class="form-control" name="id_hotel" id="id_hotel" required>
                                            @foreach ($hotel as $k)
                                                <option value="{{ $k->id_hotel }}">
                                                    {{ $k->nama_hotel }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Kamar</label>
                                        <select class="form-control" name="id_kamar" id="id_kamar" required>
                                            @foreach ($kamar as $k)
                                                <option value="{{ $k->id_kamar }}">
                                                    {{ $k->jenis_kamar }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Tempat Wisata</label>
                                        <select class="form-control" name="id_tempat_wisata" id="id_tempat_wisata" required>
                                            @foreach ($tempatwisata as $k)
                                                <option value="{{ $k->id_tempat_wisata }}">
                                                    {{ $k->nama_tempat_wisata }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Objek Atraksi</label>
                                        <select class="form-control" name="id_objek_atraksi" id="id_objek_atraksi" required>
                                            @foreach ($objekatraksi as $k)
                                                <option value="{{ $k->id_objek_atraksi }}">
                                                    {{ $k->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Pengguna</label>
                                        <select class="form-control" name="id_pengguna" id="id_pengguna" required>
                                            @foreach ($pengguna as $k)
                                                <option value="{{ $k->id_pengguna }}">
                                                    {{ $k->nama_pengguna }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" value="{{$pemesan->alamat}}"
                                            id="exampleInputPassword1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">No Telp</label>
                                        <input type="text" name="no_telp" class="form-control" value="{{$pemesan->no_telp}}"
                                            id="exampleInputPassword1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Total Harga</label>
                                        <input type="text" name="total_harga" class="form-control" value="{{$pemesan->total_harga}}"
                                            id="exampleInputPassword1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Metode Pembayaran</label>
                                        <input type="text" name="metode_pembayaran" class="form-control" value="{{$pemesan->metode_pembayaran}}"
                                            id="exampleInputPassword1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tanggal Pesan</label>
                                        <input type="date" name="tgl_pesan" class="form-control" value="{{$pemesan->tgl_pesan}}"
                                            id="exampleInputPassword1" placeholder="">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
