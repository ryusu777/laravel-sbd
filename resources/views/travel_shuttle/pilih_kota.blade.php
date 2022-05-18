@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="table-responsive">
        <form action="{{ route('travel_shuttle.pilih.titik.form') }}" method="POST" class="mt-7">
            @isset($id_titik_shuttle_berangkat)
                <input type="text" name="id_titik_shuttle_berangkat" value="{{ $id_titik_shuttle_berangkat }}" hidden>
            @endisset
            @isset($id_titik_shuttle_tujuan)
                <input type="text" name="id_titik_shuttle_tujuan" value="{{ $id_titik_shuttle_tujuan }}" hidden>
            @endisset
            @isset($id_shuttle)
                <input type="text" name="id_shuttle" value="{{ $id_shuttle }}" hidden>
            @endisset
            @isset($harga_travel)
                <input type="text" name="harga_travel" value="{{ $harga_travel }}" hidden>
            @endisset
            @isset($route)
                <input type="text" name="route" value="{{ $route }}" hidden>
            @endisset
            @isset($id_travel_shuttle)
                <input type="text" name="id_travel_shuttle" value="{{ $id_travel_shuttle }}" hidden>
            @endisset
            <div class="form-group mb-5">
                <label for="id-titik-shuttle-berangkat">Pilih kota keberangkatan</label>
                <div class="input-group input-group-alternative">
                    <select name="id_kota_berangkat" class="form-control">
                        @for ($i = 0; $i < count($result_kota); $i++)
                            @isset($id_kota_berangkat)
                                @if($id_kota_berangkat == $result_kota[$i]->id_kota)
                                    <option value="{{ $result_kota[$i]->id_kota }}" selected>{{ $result_kota[$i]->nama_kota }}</option>
                                @else
                                    <option value="{{ $result_kota[$i]->id_kota }}">{{ $result_kota[$i]->nama_kota }}</option>
                                @endif
                            @else
                                <option value="{{ $result_kota[$i]->id_kota }}">{{ $result_kota[$i]->nama_kota }}</option>
                            @endisset
                        @endfor
                    </select>
                </div>
                <label for="id-titik-shuttle-berangkat">Pilih kota tujuan</label>
                <div class="input-group input-group-alternative">
                    <select name="id_kota_tujuan" class="form-control">
                        @for ($i = 0; $i < count($result_kota); $i++)
                            @isset($id_kota_tujuan)
                                @if($id_kota_tujuan == $result_kota[$i]->id_kota)
                                    <option value="{{ $result_kota[$i]->id_kota }}" selected>{{ $result_kota[$i]->nama_kota }}</option>
                                @else
                                    <option value="{{ $result_kota[$i]->id_kota }}">{{ $result_kota[$i]->nama_kota }}</option>
                                @endif
                            @else
                                <option value="{{ $result_kota[$i]->id_kota }}">{{ $result_kota[$i]->nama_kota }}</option>
                            @endisset
                        @endfor
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
</div>
@overwrite