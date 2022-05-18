@extends('component.modal', ['modal_title' => 'Hapus shuttle', 'button_label' => 'Hapus', 'btn_danger' => true])
@section('modal.body')
    <form action="{{ route('shuttle.delete') }}" method="POST">
        <input type="hidden" name="id_shuttle" value="{{ $id_shuttle }}">
        <h2>Apakah anda ingin menghapus data ini?</h2>
        <button type="submit" class="btn btn-danger mt-5">Hapus</button>
    </form>
@endsection