@foreach($mahasiswa as $mhs)
<div class="modal fade" id="delete{{$mhs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('Admin/delete', ['id'=> $mhs->id])}}" method="post">
            @csrf
          {{method_field('DELETE')}}
          <p>Apakah anda yakin ingin menghapus Mahasiswa dengan nama {{ $mhs->name_mhs }}?</p>

        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
    </div>
  </div>
</div>
@endforeach