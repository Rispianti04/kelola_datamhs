@foreach($mahasiswa as $mhs)
<div class="modal fade" id="Edit{{$mhs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('Admin/update', ['id'=> $mhs->id])}}" method="post">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="form-group">
                        <label for="">Nama Mahasiswa</label>
                        <input type="text" class="form-control" id="" name="name_mhs"
                            value="{{$mhs->name_mhs}}">
                    </div>
                    <div class="form-group">
                        <label for="">NPM</label>
                        <input type="text" class="form-control" id="" name="npm_mhs"
                            value="{{$mhs->npm_mhs}}">
                    </div>
                    <div class="form-group">
                        <label for="">Jurusan</label>
                        <select class="form-control" name="id_jurusan">
                            @foreach($jurusan as $jur)
                            <option value="{{$jur->id_jurusan}}" {{$mhs->id_jurusan == $jur->id_jurusan ? 'selected' : ''}}>
                                {{$jur->nama_jurusan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tahun Masuk</label>
                        <input type="text" class="form-control" id="" name="tahun_masuk"
                            value="{{$mhs->tahun_masuk}}">
                    </div>
                


                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach
