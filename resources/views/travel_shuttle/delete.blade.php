@extends('component.modal', [
    'modal_title' => 'Hapus travel shuttle', 
    'button_label' => 'Hapus', 
    'btn_danger' => true,
    'modal_id' => 'delete_travel_shuttle_modal'
])
@section('modal.body')
    <form action="{{ route('travel_shuttle.delete') }}" method="POST">
        <input type="hidden" name="id_travel_shuttle" value="{{ $id_travel_shuttle }}">
        <h2>Apakah anda ingin menghapus data ini?</h2>
        <button type="submit" class="btn btn-danger mt-5">Hapus</button>
    </form>
@overwrite