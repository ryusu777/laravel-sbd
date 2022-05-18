@extends('component.modal', [
    'modal_title' => 'Hapus order_shuttle', 
    'button_label' => 'Hapus', 
    'btn_danger' => true,
    'modal_id' => 'delete_order_shuttle_modal'
])
@section('modal.body')
    <form action="{{ route('kota.delete') }}" method="POST">
        <input type="hidden" name="id_order" value="{{ $id_order }}">
        <h2>Apakah anda ingin menghapus data ini?</h2>
        <button type="submit" class="btn btn-danger mt-5">Hapus</button>
    </form>
@overwrite