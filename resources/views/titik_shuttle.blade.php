<div class="table-responsive">
    <div class="mt-7">
        <h1>Daftar titik shuttle</h1>
        @include('titik_shuttle.create', ['id_kota' => $id_kota])
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
                <th scope="col">Nama Titik Shuttle</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @for($i = 0; $i < count($resultSet); $i++)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $resultSet[$i]->nama_titik_shuttle }}</td>
                    <td>
                        <a href="{{ route('titik_shuttle.edit.form', ['id' => $resultSet[$i]->id_titik_shuttle]) }}">
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