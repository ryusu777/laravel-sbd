@extends('component.modal', ['modal_title' => 'Hapus kota', 'button_label' => 'Hapus', 'btn_danger' => true])
@section('modal.body')
    <form action="{{ route('kota.delete') }}" method="POST">
        <input type="hidden" name="id_kota" value="{{ $id_kota }}">
        <h2>Apakah anda ingin menghapus data ini?</h2>
        <button type="submit" class="btn btn-danger mt-5">Hapus</button>
    </form>
@endsection