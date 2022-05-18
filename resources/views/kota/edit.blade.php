@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="table-responsive">
            <div class="mt-7">
                @include('kota.form', [
                    'id_kota' => $result->id_kota, 
                    'nama_kota' => $result->nama_kota, 
                    'route' => route('kota.edit', ['id' => $result->id_kota])
                ])
            </div>
            <div class="mt-3">
                @include('kota.delete', ['id_kota' => $result->id_kota])
            </div>
        </div>
        @include('titik_shuttle', ['resultSet' => $result_titik_shuttle, 'id_kota' => $result->id_kota])
    </div>
@endsection