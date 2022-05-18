@extends('component.modal', ['modal_title' => 'Tambah Shuttle', 'button_label' => 'Tambah', 'modal_id' => 'create_shuttle_modal'])
@section('modal.body')
    @include('shuttle.form', ['nama_shuttle' => '', 'route' => route('shuttle.insert')])
@endsection