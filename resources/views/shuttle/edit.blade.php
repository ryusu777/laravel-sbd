@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="table-responsive">
            <div class="mt-7">
                @include('shuttle.form', [
                    'id_shuttle' => $result->id_shuttle, 
                    'nama_shuttle' => $result->nama_shuttle, 
                    'route' => route('shuttle.edit', ['id' => $result->id_shuttle])])

            </div>
            <div class="mt-3">
                @include('shuttle.delete', ['id_shuttle' => $result->id_shuttle])
            </div>
        </div>
    </div>
@endsection