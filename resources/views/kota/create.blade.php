@extends('component.modal', ['modal_title' => 'Tambah kota', 'button_label' => 'Tambah'])
@section('modal.body')
    @include('kota.form', ['nama_kota' => '', 'route' => route('kota.insert')])
@endsection