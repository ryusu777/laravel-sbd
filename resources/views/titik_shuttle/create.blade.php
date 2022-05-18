@extends('component.modal', [
    'modal_title' => 'Tambah titik shuttle', 
    'button_label' => 'Tambah',
    'modal_id' => 'create_titik_shuttle_modal'
])
@section('modal.body')
    @include('titik_shuttle.form', [
        'nama_titik_shuttle' => '', 
        'id_kota' => $id_kota,
        'route' => route('titik_shuttle.insert')
    ])
@overwrite