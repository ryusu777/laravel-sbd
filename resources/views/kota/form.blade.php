<form action="{{ $route }}" method="POST">
    @isset($id_kota)
        <input type="hidden" name="id_kota" value="{{ $id_kota }}">
    @endisset
    <div class="form-group mb-5">
        <label for="nama-kota" class="">Nama Kota</label>
        <div class="input-group input-group-alternative">
            <input class="form-control" placeholder="Nama Kota..." type="text" name="nama_kota" value="{{ $nama_kota }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>