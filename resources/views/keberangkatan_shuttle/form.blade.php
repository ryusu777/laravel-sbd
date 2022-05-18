<form action="{{ $route }}" method="POST">
    @isset($id_keberangkatan)
        <input type="hidden" name="id_keberangkatan" value="{{ $id_keberangkatan }}">
    @endisset
    <div class="form-group mb-5">
        <label for="id-travel-shuttle" class="">Id Travel Shuttle</label>
        <div class="input-group input-group-alternative">
            <input class="form-control" placeholder="Id Travel Shuttle..." type="number" name="id_travel_shuttle" value="{{ $id_travel_shuttle }}">
        </div>
        <label for="waktu-berangkat" class="">Waktu Berangkat</label>
        <div class="input-group input-group-alternative">
            <input class="form-control" type="time" name="waktu_berangkat" value="{{ $waktu_berangkat }}">
        </div>
        <label for="perkiraan-tiba" class="">Perkiraan Tiba</label>
        <div class="input-group input-group-alternative">
            <input class="form-control" type="time" name="perkiraan_tiba" value="{{ $perkiraan_tiba }}">
        </div>
        <label for="hari-berangkat" class="">Hari Berangkat</label>
        <div class="input-group input-group-alternative">
            <input class="form-control" type="date" name="hari_berangkat" value="{{ $hari_berangkat }}">
        </div>
        <label for="status-berangkat" class="">Status Berangkat</label>
        <div class="input-group input-group-alternative">
            <input class="form-control" placeholder="Status Berangkat..." type="number" name="status_berangkat" value="{{ $status_berangkat }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>