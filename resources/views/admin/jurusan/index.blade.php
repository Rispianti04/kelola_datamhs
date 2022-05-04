@extends('layouts.app')
@section('title','Pengelolaan Data Mahasiswa Asing')
@section('content_header')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<h1 class="m-0 text-dark text-center">Pengelolaan Data Jurusan</h1>
<section class="content-header">
    <div class="row">
        <div class="col-sm-6">
            <h1>Data Jurusan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Jurusan</li>
            </ol>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="card-title">Data Mahasiswa Asing</h3>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-right">
                                    <a href="{{ url('/jurusan/create') }}" class="btn btn-primary">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Jurusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jurusan as $siswa)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $siswa->nama_jurusan }}</td>
                                        <td>
                                            <a href="{{ url('/edit_mhs_asing/'.$siswa->id_jurusan) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ url('/delete_mhs_asing/'.$siswa->id_jurusan) }}" class="btn btn-danger">Hapus</a>
                                   </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Jurusan</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
</section>
@section('script')
@yield('DT')
@endsection
@stop
