@extends('component.modal', [
    'modal_title' => 'Hapus titik shuttle', 
    'button_label' => 'Hapus', 
    'btn_danger' => true,
    'modal_id' => 'delete_titik_shuttle_modal'
])
@section('modal.body')
    <form action="{{ route('titik_shuttle.delete') }}" method="POST">
        <input type="hidden" name="id_kota" value="{{ $id_titik_shuttle }}">
        <h2>Apakah anda ingin menghapus data ini?</h2>
        <button type="submit" class="btn btn-danger mt-5">Hapus</button>
    </form>
@overwrite