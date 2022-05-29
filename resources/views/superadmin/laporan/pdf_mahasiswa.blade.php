@extends('layouts.app')
@section('title', 'Pengelolaan Data Mahasiswa Asing')
@section('content_header')
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<h1 class="m-0 text-dark text-center">Data Mahasiswa Asing</h1>
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
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>NPM</th>
                                        <th>PROGRAM STUDI</th>
                                        <th>TAHUN MASUK</th>
                                        <th>KELAS</th>
                                        <th>JENIS KELAMIN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mahasiswa as $mhs)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $mhs->name_mhs }}</td>
                                        <td>{{ $mhs->npm_mhs }}</td>
                                        <td>{{ $mhs->jurusan->nama_jurusan }}</td>
                                        <td>{{ $mhs->penilaian->tahun_akademik}}</td>
                                        <td>{{ $mhs->kelas }}</td>
                                        <td>{{ $mhs->jenis_kelamin }}</td>
                                    </tr>
                                    @endforeach

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
    {{-- @include('superadmin.laporan.dropdown') --}}
    {{-- @include('superadmin.mhsasing.create')
             @include('superadmin.mhsasing.edit')
             @include('superadmin.mhsasing.delete')
             @include('superadmin.mhsasing.details') --}}
    </div>




</section>
@section('script')



@endsection


@stop
