@extends('component.modal', [
    'modal_title' => 'Hapus Keberangkatan Shuttle', 
    'button_label' => 'Hapus', 
    'btn_danger' => true,
    'modal_id' => 'delete_keberangkatan_shuttle_modal'])
@section('modal.body')
    <form action="{{ route('keberangkatan_shuttle.delete') }}" method="POST">
        <input type="hidden" name="id_keberangkatan" value="{{ $id_keberangkatan }}">
        <h2>Apakah anda ingin menghapus data ini?</h2>
        <button type="submit" class="btn btn-danger mt-5">Hapus</button>
    </form>
@endsection