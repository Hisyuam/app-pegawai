@extends('master')

@section('title', 'Daftar Jabatan')
@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Jabatan</h2>
        <a href="{{ route('positions.create') }}" class="btn btn-primary">
            + Tambah Jabatan
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Nama Jabatan</th>
                    <th>Gaji Pokok</th>
                    <th style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($positions as $pos)
                <tr>
                    <td class="text-center">{{ $pos->id }}</td>
                    <td>{{ $pos->nama_jabatan }}</td>
                    <td>Rp {{ number_format($pos->gaji_pokok, 0, ',', '.') }}</td>
                    <td class="text-center">
                        <a href="{{ route('positions.edit', $pos->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                        <form action="{{ route('positions.destroy', $pos->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Hapus data ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada data jabatan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
