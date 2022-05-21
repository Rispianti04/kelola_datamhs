@extends('layouts.app')
@section('title','Pengelolaan Data Mahasiswa Asing')
@section('content_header')
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<h1 class="m-0 text-dark text-center">Pengelolaan Data Mahasiswa Asing</h1>
<section class="content-header">
    <div class="row">
        {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
        </div> --}}
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
                                    <a href="#" data-toggle="modal" data-target="#Create" class="btn btn-primary">Tambah
                                        Data</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Tahuan Akademik</th>
                                        <th class="text-center">Daya Tampung</th>
                                        <th colspan="2" class="text-center">Jumlah <br>Calon Mahasiswa</th>
                                        <th colspan="2" class="text-center">Jumlah <br>Mahasiswa baru</th>
                                        <th colspan="2" class="text-center">Jumlah <br>Mahasisa Aktif</th>
                                        <th>AKSI</th>
                                    </tr>
                                    <tr>
                                        <td>&NonBreakingSpace;</td>
                                        <td></td>
                                        <th class="text-center">Pendaftar</th>
                                        <th class="text-center">Lulus Seleksi</th>
                                        <th class="text-center">Reguler</th>
                                        <th class="text-center">Transfer</th>
                                        <th class="text-center">Reguler</th>
                                        <th class="text-center">Transfer</th>
                                      </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2019/2020</td>
                                        <td>100</td>
                                        <td>100</td>
                                        <td>100</td>
                                        <td>100</td>
                                        <td>100</td>
                                        <td>100</td>
                                        <td>100</td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#Edit" class="btn btn-primary">Edit</a>
                                            <a href="#" data-toggle="modal" data-target="#Delete" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                   
                                </tbody>

                            </table>
                        </div>

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
    @include('superadmin.penilaian.create')
        {{-- @include('superadmin.penilaian.edit')
        @include('superadmin.penilaian.delete')
        @include('superadmin.penilaian.details') --}}
    </div>




</section>
@section('script')



@endsection


@stop
