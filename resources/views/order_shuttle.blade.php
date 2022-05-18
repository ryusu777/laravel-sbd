@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="table-responsive">
            <div class="mt-7">
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
                        <th scope="col">No Order</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 0; $i < count($resultSet); $i++)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $resultSet[$i]->id_order }}</td>
                            <td>
                                <a href="{{ route('order_shuttle.edit.form', ['id' => $resultSet[$i]->id_order]) }}">
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