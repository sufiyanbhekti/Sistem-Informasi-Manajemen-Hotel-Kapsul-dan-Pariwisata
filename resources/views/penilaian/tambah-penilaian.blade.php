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
                            <form action="{{ route('penilaian.store') }}" method="post">
                                @csrf
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
                                        <label for="exampleInputPassword1">Nilai</label>
                                        <input type="text" name="nilai" class="form-control"
                                            id="exampleInputPassword1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tanggapan</label>
                                        <input type="text" name="tanggapan" class="form-control"
                                            id="exampleInputPassword1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Kategori</label>
                                        <input type="text" name="kategori" class="form-control"
                                            id="exampleInputPassword1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tanggal Penilaian</label>
                                        <input type="date" name="tgl_penilaian" class="form-control"
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
