@extends('adminlte::page')
@section('content')
@yield('data')
@if(isset($tambah))
<button type="button" class="btn btn-primary tambah">
  Tambah
</button>
@endif
@if(isset($print))
<a class=""><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">
  print
</button>
</a>
@endif
<table id="table" class="table">
    @foreach($headers as $header )
    <th>{{$header}}</th>
    @endforeach
</table>
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
      <form class="isi" method="post">
        
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')

    <script>
    
        $(document).ready(function(){
          
            $('.tambah').click(function(){
             $('#tambah').modal('show');
            });
            function show_table($table) {
                
            }
        });
    </script>
    @yield('js1')
@endsection