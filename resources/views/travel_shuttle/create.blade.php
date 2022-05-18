@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="table-responsive">
        @isset($route)
        <form action="{{ $route }}" class="mt-7" method="POST">
        @else
        <form action="{{ route('travel_shuttle.insert') }}" class="mt-7" method="POST">
        @endisset
            @isset($id_travel_shuttle)
                <input type="text" name="id_travel_shuttle" value="{{ $id_travel_shuttle }}" hidden>
            @endisset
            <div class="form-group mb-5">
                <label for="id-titik-shuttle-berangkat">Pilih titik keberangkatan</label>
                <div class="input-group input-group-alternative">
                    <select name="id_titik_shuttle_berangkat" class="form-control">
                        @for ($i = 0; $i < count($result_berangkat); $i++)
                            @isset($id_titik_shuttle_berangkat)
                                @if($id_titik_shuttle_berangkat == $result_berangkat[$i]->id_titik_shuttle)
                                    <option value="{{ $result_berangkat[$i]->id_titik_shuttle }}" selected>{{ $result_berangkat[$i]->nama_titik_shuttle }}</option>
                                @else
                                    <option value="{{ $result_berangkat[$i]->id_titik_shuttle }}">{{ $result_berangkat[$i]->nama_titik_shuttle }}</option>
                                @endif
                            @else
                                <option value="{{ $result_berangkat[$i]->id_titik_shuttle }}">{{ $result_berangkat[$i]->nama_titik_shuttle }}</option>
                            @endisset
                        @endfor
                    </select>
                </div>
                <label for="id-titik-shuttle-berangkat">Pilih titik tujuan</label>
                <div class="input-group input-group-alternative">
                    <select name="id_titik_shuttle_tujuan" class="form-control">
                        @for ($i = 0; $i < count($result_tujuan); $i++)
                            @isset($id_titik_shuttle_tujuan)
                                @if($id_titik_shuttle_tujuan == $result_tujuan[$i]->id_titik_shuttle)
                                    <option value="{{ $result_tujuan[$i]->id_titik_shuttle }}" selected>{{ $result_tujuan[$i]->nama_titik_shuttle }}</option>
                                @else
                                    <option value="{{ $result_tujuan[$i]->id_titik_shuttle }}">{{ $result_tujuan[$i]->nama_titik_shuttle }}</option>
                                @endif
                            @else
                                <option value="{{ $result_tujuan[$i]->id_titik_shuttle }}">{{ $result_tujuan[$i]->nama_titik_shuttle }}</option>
                            @endisset
                        @endfor
                    </select>
                </div>
                <label for="id-titik-shuttle-berangkat">Pilih tipe shuttle</label>
                <div class="input-group input-group-alternative">
                    <select name="id_shuttle" class="form-control">
                        @for ($i = 0; $i < count($result_shuttle); $i++)
                            @isset($id_shuttle)
                                @if($id_shuttle == $result_shuttle[$i]->id_shuttle)
                                    <option value="{{ $result_shuttle[$i]->id_shuttle }}" selected>{{ $result_shuttle[$i]->nama_shuttle }}</option>
                                @else
                                    <option value="{{ $result_shuttle[$i]->id_shuttle }}">{{ $result_shuttle[$i]->nama_shuttle }}</option>
                                @endif
                            @else
                                <option value="{{ $result_shuttle[$i]->id_shuttle }}">{{ $result_shuttle[$i]->nama_shuttle }}</option>
                            @endisset
                        @endfor
                    </select>
                </div>
                <label for="id-titik-shuttle-berangkat">Harga travel</label>
                <div class="input-group input-group-alternative">
                    @isset($harga_travel)
                        <input type="number" class="form-control" name="harga_travel" value="{{ $harga_travel }}">
                    @else
                        <input type="number" class="form-control" name="harga_travel">
                    @endisset
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</div>
@overwrite