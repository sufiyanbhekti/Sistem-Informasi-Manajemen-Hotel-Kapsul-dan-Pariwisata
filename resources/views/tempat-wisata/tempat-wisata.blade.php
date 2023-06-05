@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List Kamar</h1>
                    </div><!-- /.col -->

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <a href="{{ route('tempat-wisata.create') }}">
                    <button class="btn btn-primary">Tambah Data</button>
                </a>
                <a href="{{ url('print-tempat-wisata') }}">
                    <button class="btn btn-primary" style="color:black">Cetak Data</button>
                </a>
            </div><!-- /.container-fluid -->
        </div>

        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">no</th>
                                    <th>Nama Jenis Wisata</th>
                                    <th>Nama Tempat WIsata</th>
                                    <th>Alamat</th>
                                    <th>Deskripsi</th>
                                    <th>Jam Buka</th>
                                    <th>Jam Tutup</th>
                                    <th>Harga Tiket</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($tempatwisata as $dok)
                                    <?php $no++; ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $dok->nama_jenis_wisata }}</td>
                                        <td>{{ $dok->nama_tempat_wisata }}</td>
                                        <td>{{ $dok->alamat }}</td>
                                        <td>{{ $dok->deskripsi }}</td>
                                        <td>{{ $dok->jam_buka }}</td>
                                        <td>{{ $dok->jam_tutup }}</td>
                                        <td>{{ $dok->harga_tiket }}</td>
                                        <td>
                                            <form action="{{ route('tempat-wisata.destroy', $dok->id_tempat_wisata) }}"
                                                method="POST">
                                                <a href="{{ route('tempat-wisata.edit', $dok->id_tempat_wisata) }}"
                                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    <button class="btn btn-info" type="button">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $tempatwisata->links('vendor.pagination.bootstrap-4') !!}
                        {{-- <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul> --}}

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
