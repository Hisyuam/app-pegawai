@extends('master')

@section('title', 'Daftar Absensi')
@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Absensi Karyawan</h2>
        <a href="{{ route('attendances.create') }}" class="btn btn-primary">
            + Tambah Absensi
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
                    <th>Nama Karyawan</th>
                    <th>Tanggal</th>
                    <th>Masuk</th>
                    <th>Keluar</th>
                    <th>Status</th>
                    <th style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($attendances as $a)
                <tr>
                    <td class="text-center">{{ $a->id }}</td>
                    <td>{{ $a->employee->nama_lengkap ?? '-' }}</td>
                    <td>{{ $a->tanggal }}</td>
                    <td>{{ $a->waktu_masuk ?? '-' }}</td>
                    <td>{{ $a->waktu_keluar ?? '-' }}</td>
                    <td class="text-capitalize text-center">
                        <span class="badge 
                            @if($a->status_absensi == 'hadir') bg-success
                            @elseif($a->status_absensi == 'izin') bg-warning text-dark
                            @elseif($a->status_absensi == 'sakit') bg-info text-dark
                            @else bg-danger
                            @endif">
                            {{ $a->status_absensi }}
                        </span>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('attendances.edit', $a->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                        <form action="{{ route('attendances.destroy', $a->id) }}" method="POST" style="display:inline;">
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
                    <td colspan="7" class="text-center text-muted">Belum ada data absensi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
