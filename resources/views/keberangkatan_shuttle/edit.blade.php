@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="table-responsive">
            <div class="mt-7">
                @include('keberangkatan_shuttle.form', [
                    'id_keberangkatan' => $result->id_keberangkatan,
                    'id_travel_shuttle' => $result->id_travel_shuttle,
                    'waktu_berangkat' => $result->waktu_berangkat,
                    'perkiraan_tiba' => $result->perkiraan_tiba, 
                    'hari_berangkat' => $result->hari_berangkat, 
                    'status_berangkat' => $result->status_berangkat,
                    'route' => route('keberangkatan_shuttle.edit', ['id' => $result->id_keberangkatan])])
            </div>
            <div class="mt-3">
                @include('keberangkatan_shuttle.delete', ['id_keberangkatan' => $result->id_keberangkatan])
            </div>
        </div>
    </div>
@endsection 