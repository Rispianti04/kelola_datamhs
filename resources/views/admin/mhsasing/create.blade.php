<form action="{{ url('store') }}" method="POST">
    @csrf
    <div class="modal" tabindex="-1" role="dialog" id="Create">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name_mhs">Nama Mahasiswa</label>
                        <input id="name_mhs" name="name_mhs" type="text"
                            class="@error('name_mhs') is-invalid @enderror form-control" placeholder="Nama Mahasiswa"
                            value="{{ old('name_mhs') }}">
                        @error('name_mhs')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="npm_mhs">NPM Mahasiwa</label>
                        <input id="npm_mhs" name="npm_mhs" type="text"
                            class="@error('npm_mhs') is-invalid @enderror form-control" placeholder="NPM Mahasiswa"
                            value="{{ old('npm_mhs') }}">
                        @error('npm_mhs')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_jurusan">Jurusan</label>
                        <select name="id_jurusan" id="id_jurusan"
                            class="@error('id_jurusan') is-invalid @enderror form-control">
                            <option value="">Pilih Jurusan</option>
                            @foreach ($jurusan as $jurusan)
                            <option value="{{ $jurusan->id_jurusan }}">{{ $jurusan->nama_jurusan }}</option>
                            @endforeach
                        </select>
                        @error('id_jurusan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label>Jurusan</label>
                        <select name="id_jurusan"  class="form-control select2" style="width: 100%;" >
                            <option selected="selected">Pilih Jurusan</option>
                            @foreach ($jurusan ?? '' as $j)
                            <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                    @endforeach
                    </select>

                </div> --}}
                <div class="form-group">
                    <label for="tahun_masuk">Tahun Masuk</label>
                    <input id="tahun_masuk" name="tahun_masuk" type="number"
                        class="@error('tahun_masuk') is-invalid @enderror form-control" placeholder="Tahun Masuk"
                        value="{{ old('tahun_masuk') }}">
                    @error('tahun_masuk')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_mhs">Password</label>
                    <input id="password_mhs" name="password_mhs" type="password"
                        class="@error('password_mhs') is-invalid @enderror form-control" placeholder="Password"
                        value="{{ old('password_mhs') }}">
                    @error('password_mhs')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="Submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>
    
</form>

