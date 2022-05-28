@foreach($mahasiswa as $mhs)
<div class="modal fade" id="delete{{$mhs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Are you sure want to delete this data?? <strong class="" id="delete-nama"></strong>?
            <form method="post" action="{{ url('Mahasiswa/delete', $mhs->id) }}" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
        </div>
        <div class="modal-footer">
            <input type="hidden" name="id" id="delete-id" value="" />
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
</div>
@endforeach