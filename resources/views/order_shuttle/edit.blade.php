@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="table-responsive">
            <div class="mt-7">
                @include('order_shuttle.form', [
                    'id_order' => $result->id_order, 
                    'id_travel_shuttle' => $result->id_travel_shuttle,
                ])
            </div>
            <div class="mt-3">
                @include('order_shuttle.delete', ['id_order' => $result->id_order])
            </div>
        </div>
    </div>
@endsection