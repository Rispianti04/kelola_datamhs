@extends('adminlte::page')
@section('content')
<style>
.main-sidebar{
    background: #004584
}
.main-header{
    background: #004584
}
.main-sidebar .nav-item{
    background: #1C364E;
    margin-bottom: 2px;
}
li .main-sidebar .nav-item a .nav-link .active{
    background: #004584;
    margin-bottom: 2px;
}
.tambah{
    background: #0078E7;
    color: #ffffff;
}

.cetak{
    background: #000000;
    color: #ffffff;
}

.hapus{
    background: #E70E00;
}

.ubah{
    background: #E7D000;
}

</style>

<div class="container col-md-12 col-xs-12 col-sm-12 wrapper">
    @if(isset($tambah))
    <button class="btn tambah" data-toggle="modal" data-target="#Tambah">
        Tambah
    </button>
    <button class="btn cetak">
        Cetak Laporan
    </button>
    @endif
    <table class="table table-bordered datatable">
        @if ($forms!=null)
        @foreach ($forms as  $form )
        <th>{{$form}}</th>
        @endforeach
        @endif
    </table>
</div>

@endsection
@section('js')
<script>
    $(document).ready(function(){
        @yield('script')
    function tampilTabel(url,data){

    $(".datatable").DataTable({
    "ajax": url,
    "columns" : data
        })
    }

});
</script>

@endsection