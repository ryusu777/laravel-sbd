<form action="{{ $route }}" method="POST">
    @isset($id_travel_shuttle)
        <input type="hidden" name="id_travel_shuttle" value="{{ $id_travel_shuttle }}">
    @endisset
    <div class="form-group mb-5">
        <label for="id-titik-shuttle-berangkat" class="">Id titik shuttle berangkat</label>
        <div class="input-group input-group-alternative">
            <input class="form-control" placeholder="Id titik shuttle berangkat..." type="text" name="id_titik_shuttle_berangkat" value="{{ $id_titik_shuttle_berangkat }}">
        </div>
        <label for="id-titik-shuttle-tujuan" class="">Id titik shuttle tujuan</label>
        <div class="input-group input-group-alternative">
            <input class="form-control" placeholder="Id titik shuttle tujuan..." type="text" name="id_titik_shuttle_tujuan" value="{{ $id_titik_shuttle_tujuan }}">
        </div>
        <label for="id-shuttle" class="">Id shuttle</label>
        <div class="input-group input-group-alternative">
            <input class="form-control" placeholder="Id shuttle..." type="text" name="id_shuttle" value="{{ $id_shuttle }}">
        </div>
        <label for="harga-travel" class="">Harga Travel</label>
        <div class="input-group input-group-alternative">
            <input class="form-control" placeholder="Harga travel..." type="text" name="harga_travel" value="{{ $harga_travel }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>