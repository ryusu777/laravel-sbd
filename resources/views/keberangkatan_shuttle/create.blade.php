@extends('component.modal', [
    'modal_title' => 'Tambah Keberangkatan Shuttle', 
    'button_label' => 'Tambah',
    'modal_id' => 'create_keberangkatan_shuttle_modal'])
@section('modal.body')
    @include('keberangkatan_shuttle.form', [
        'id_travel_shuttle' => '',
        'waktu_berangkat' => '',
        'perkiraan_tiba' => '', 
        'hari_berangkat' => '', 
        'status_berangkat' => '',
        'route' => route('keberangkatan_shuttle.insert')])
@endsection 