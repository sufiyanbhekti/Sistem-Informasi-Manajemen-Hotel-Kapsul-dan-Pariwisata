@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Kamar</h1>
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
                            <form action="{{ route('pengguna.update',$pengguna->id_pengguna) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Pengguna</label>
                                        <input type="text" name="nama_pengguna" class="form-control" value="{{$pengguna->nama_pengguna}}"
                                        id="exampleInputEmail1"
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Username</label>
                                        <input type="username" name="username" class="form-control" value="{{$pengguna->username}}"
                                            id="exampleInputPassword1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="password" class="form-control" value="{{$pengguna->password}}"
                                            id="exampleInputPassword1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Jabatan</label>
                                        <input type="text" name="jabatan" class="form-control" value="{{$pengguna->jabatan}}"
                                            id="exampleInputPassword1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">No Telp</label>
                                        <input type="text" name="no_telp" class="form-control" value="{{$pengguna->no_telp}}"
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
