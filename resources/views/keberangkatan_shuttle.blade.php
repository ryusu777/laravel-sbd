@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="table-responsive">
            <div class="mt-7">
                @include('keberangkatan_shuttle.create')
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
                        <th scope="col">Travel Shuttle</th>
                        <th scope="col">Waktu Berangkat</th>
                        <th scope="col">Perkiraan Tiba</th>
                        <th scope="col">Hari Berangkat</th>
                        <th scope="col">Status Berangka</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 0; $i < count($resultSet); $i++)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $resultSet[$i]->id_travel_shuttle }}</td>
                            <td>{{ $resultSet[$i]->waktu_berangkat }}</td>
                            <td>{{ $resultSet[$i]->perkiraan_tiba }}</td>
                            <td>{{ $resultSet[$i]->hari_berangkat }}</td>
                            <td>{{ $resultSet[$i]->status_berangkat }}</td>
                            <td>
                                <a href="{{ route('keberangkatan_shuttle.edit.form', ['id' => $resultSet[$i]->id_keberangkatan]) }}">
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