@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="table-responsive">
            <div class="mt-7">
                @include('titik_shuttle.form', [
                    'id_titik_shuttle' => $result->id_titik_shuttle, 
                    'nama_titik_shuttle' => $result->nama_titik_shuttle, 
                    'id_kota' => $result->id_kota,
                    'route' => route('titik_shuttle.edit', ['id' => $result->id_titik_shuttle])
                ])
            </div>
            <div class="mt-3">
                @include('titik_shuttle.delete', ['id_titik_shuttle' => $result->id_titik_shuttle])
            </div>
        </div>
    </div>
@endsection