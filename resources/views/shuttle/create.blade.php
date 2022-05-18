@extends('component.modal', ['modal_title' => 'Tambah Shuttle', 'button_label' => 'Tambah'])
@section('modal.body')
    @include('shuttle.form', ['nama_shuttle' => '', 'route' => route('shuttle.insert')])
@endsection