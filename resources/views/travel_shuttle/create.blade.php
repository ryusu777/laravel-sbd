@extends('component.modal', [
    'modal_title' => 'Tambah Travel Shuttle', 
    'button_label' => 'Tambah',
    'modal_id' => 'create_travel_shuttle_modal'
])
@section('modal.body')
    @include('travel_shuttle.form', ['id_titik_shuttle_berangkat' => '', 'id_titik_shuttle_tujuan' => '',
    'id_shuttle' => '', 'harga_travel' => '', 'route' => route('travel_shuttle.insert')])
@overwrite