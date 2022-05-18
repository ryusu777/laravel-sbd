@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="table-responsive">
            <div class="mt-7">
                @include('travel_shuttle.form', [
                    'id_titik_shuttle_berangkat' => $result->id_titik_shuttle_berangkat, 
                    'id_titik_shuttle_tujuan' => $result->id_titik_shuttle_tujuan,
                    'id_shuttle' => $result->id_shuttle,
                    'harga_travel' => $result->harga_travel,
                    'id_travel_shuttle' => $result->id_travel_shuttle,
                    'route' => route('travel_shuttle.edit', ['id' => $result->id_travel_shuttle])
                ])
            </div>
            <div class="mt-3">
                @include('travel_shuttle.delete', ['id_travel_shuttle' => $result->id_travel_shuttle])
            </div>
        </div>
    </div>
@endsection