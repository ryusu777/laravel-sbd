@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="table-responsive">
            <div class="mt-7">
                @include('shuttle.create')
            </div>
            @if (session('status'))
                <div class="alert alert-{{ session('status') }} mt-2">
                    {{ session('message') }}
                </div>
            @endif
            <table class="table align-items-center mt-4">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Shuttle</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 0; $i < count($resultSet); $i++)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $resultSet[$i]->nama_shuttle }}</td>
                            <td>
                                <a href="{{ route('shuttle.edit.form', ['id' => $resultSet[$i]->id_shuttle]) }}">
                                    <button type="button" class="btn btn-primary">
                                        Edit
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection