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
                            <form action="{{ route('objek-atraksi.update',$objek_atraksi->id_objek_atraksi) }}" method="post">
                                @csrf
                                @method('put')
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
                                        <label for="exampleInputPassword1">Nama Atraksi</label>
                                        <input type="text" name="nama" class="form-control" value="{{$objek_atraksi->nama}}"
                                            id="exampleInputPassword1" placeholder="Enter Nama ">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tipe Atraksi</label>
                                        <input type="text" name="tipe_atraksi" class="form-control" value="{{$objek_atraksi->tipe_atraksi}}"
                                            id="exampleInputPassword1" placeholder="Enter">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Kapasitas Atraksi</label>
                                        <input type="text" name="kapasitas_atraksi" class="form-control" value="{{$objek_atraksi->kapasitas_atraksi}}"
                                            id="exampleInputPassword1" placeholder="Enter">
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
