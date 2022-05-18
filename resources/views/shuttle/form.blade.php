<form action="{{ $route }}" method="POST">
    @isset($id_shuttle)
        <input type="hidden" name="id_shuttle" value="{{ $id_shuttle }}">
    @endisset
    <div class="form-group mb-5">
        <label for="nama-shuttle" class="">Nama Shuttle</label>
        <div class="input-group input-group-alternative">
            <input class="form-control" placeholder="Nama Shuttle..." type="text" name="nama_shuttle" value="{{ $nama_shuttle }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>