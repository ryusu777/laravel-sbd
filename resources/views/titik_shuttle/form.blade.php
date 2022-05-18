<form action="{{ $route }}" method="POST">
    @isset($id_titik_shuttle)
        <input type="hidden" name="id_titik_shuttle" value="{{ $id_titik_shuttle }}">
    @endisset
    <input type="hidden" name="id_kota" value="{{ $id_kota }}">
    <div class="form-group mb-5">
        <label for="nama-kota" class="">Nama Titik Shuttle</label>
        <div class="input-group input-group-alternative">
            <input class="form-control" placeholder="Nama Titik..." type="text" name="nama_titik_shuttle" value="{{ $nama_titik_shuttle }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>