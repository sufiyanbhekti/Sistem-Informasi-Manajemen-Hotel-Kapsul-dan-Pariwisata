@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Hotel</h1>
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
                            <form action="{{ route('hotel.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jenis Hotel</label>
                                        <select class="form-control" name="id_jenis_hotel" id="id_jenis_hotel" required>
                                            @foreach ($jenishotel as $hot)
                                                <option value="{{ $hot->id_jenis_hotel }}">
                                                    {{ $hot->nama_jenis_hotel }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Hotel</label>
                                        <input type="text" name="nama_hotel" class="form-control"
                                            id="exampleInputEmail1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Alamat</label>
                                        <input type="text" name="alamat" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter Alamat">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Deskripsi</label>
                                        <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Gambar Hotel</label>
                                        <input type="text" name="gambar_hotel" class="form-control"
                                            id="exampleInputEmail1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Check In</label>
                                        <input type="text" name="check_in" class="form-control" id="exampleInputEmail1"
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Check Out</label>
                                        <input type="text" name="check_out" class="form-control"
                                            id="exampleInputEmail1" placeholder="">
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
