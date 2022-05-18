@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table align-items-center mt-7">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Bidang</th>
                        <th scope="col">Jumlah Pegawai</th>
                        <th scope="col">Gol Satu</th>
                        <th scope="col">Gol Dua</th>
                        <th scope="col">Gol Tiga</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 0; $i < count($resultSet); $i++)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $resultSet[$i]->NamaBidang }}</td>
                            <td>{{ $resultSet[$i]->JumlahPegawai }}</td>
                            <td>{{ $resultSet[$i]->Gol1 }}</td>
                            <td>{{ $resultSet[$i]->Gol2 }}</td>
                            <td>{{ $resultSet[$i]->Gol3 }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
@endsection