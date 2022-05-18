@extends('component.modal', [
    'modal_title' => 'Tambah kota', 
    'button_label' => 'Tambah',
    'modal_id' => 'create_kota_modal'
])
@section('modal.body')
    @include('kota.form', ['nama_kota' => '', 'route' => route('kota.insert')])
@overwrite