@extends('master')

@section('title', 'Daftar Departemen')

@section('content')
<div class="container mt-5 mb-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Daftar Departemen</h3>
            <a href="{{ route('departments.create') }}" class="btn btn-light btn-sm">
                + Tambah Departemen
            </a>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                    <tr class="text-center">
                        <th width="10%">ID</th>
                        <th>Nama Departemen</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($departments as $dept)
                    <tr class="text-center">
                        <td>{{ $dept->id }}</td>
                        <td>{{ $dept->nama_departemen }}</td>
                        <td>
                            <a href="{{ route('departments.edit', $dept->id) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>
                            <form action="{{ route('departments.destroy', $dept->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus departemen ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
