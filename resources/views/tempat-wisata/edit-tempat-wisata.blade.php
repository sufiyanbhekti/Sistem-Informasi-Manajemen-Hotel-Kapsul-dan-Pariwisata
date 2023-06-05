@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Kamar</h1>
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
                            <form action="{{ route('tempat-wisata.update',$tempat_wisata->id_tempat_wisata) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Jenis Tempat Wisata</label>
                                        <select class="form-control" name="id_jenis_tempat_wisata" id="id_jenis_tempat_wisata" required>
                                            @foreach ($jenistempatwisata as $k)
                                                <option value="{{ $k->id_jenis_tempat_wisata }}">
                                                    {{ $k->nama_jenis_wisata }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Wisata</label>
                                        <input type="text" name="nama_tempat_wisata" class="form-control" value="{{$tempat_wisata->nama_tempat_wisata}}"
                                            id="exampleInputPassword1" placeholder="Enter Nama ">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" value="{{$tempat_wisata->alamat}}"
                                            id="exampleInputPassword1" placeholder="Enter Nama ">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Deskripsi</label>
                                        <input type="text" name="deskripsi" class="form-control" value="{{$tempat_wisata->deskripsi}}"
                                            id="exampleInputPassword1" placeholder="Enter Nama ">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Jam Buka</label>
                                        <input type="text" name="jam_buka" class="form-control" value="{{$tempat_wisata->jam_buka}}"
                                            id="exampleInputPassword1" placeholder="Enter Nama ">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Jam Tutup</label>
                                        <input type="text" name="jam_tutup" class="form-control" value="{{$tempat_wisata->jam_tutup}}"
                                            id="exampleInputPassword1" placeholder="Enter Nama ">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Harga Tiket</label>
                                        <input type="text" name="harga_tiket" class="form-control" value="{{$tempat_wisata->harga_tiket}}"
                                            id="exampleInputPassword1" placeholder="Enter Nama ">
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
