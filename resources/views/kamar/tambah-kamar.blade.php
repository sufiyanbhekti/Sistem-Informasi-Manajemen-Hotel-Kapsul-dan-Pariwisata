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
                            <form action="{{ route('kamar.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama hotel</label>
                                        <select class="form-control" name="id_hotel" id="id_dokter" required>
                                            @foreach ($hotel as $d)
                                                <option value="{{ $d->id_hotel }}">
                                                    {{ $d->nama_hotel }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama fasilitas</label>
                                        <select class="form-control" name="id_fasilitas" id="id_kamar" required>
                                            @foreach ($fasilitas as $k)
                                                <option value="{{ $k->id_fasilitas }}">
                                                    {{ $k->nama_fasilitas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Jenis Kamar</label>
                                        <input type="text" name="jenis_kamar" class="form-control"
                                            id="exampleInputPassword1" placeholder="Enter Nama Pasien">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Status Kamar</label>
                                        <input type="text" name="status_kamar" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter Alamat">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Harga Kamar</label>
                                        <input type="text" name="harga_kamar" class="form-control" id="exampleInputEmail1">
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
