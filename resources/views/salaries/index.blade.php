@extends('master')
@section('title', 'Daftar Gaji')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Daftar Data Gaji</h2>

    {{-- Tombol Tambah --}}
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('salaries.create') }}" class="btn btn-success">
            + Tambah Data Gaji
        </a>
    </div>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabel data gaji --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Karyawan</th>
                    <th>Bulan</th>
                    <th>Gaji Pokok</th>
                    <th>Tunjangan</th>
                    <th>Potongan</th>
                    <th>Total Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($salaries as $salary)
                    <tr>
                        <td>{{ $salary->id }}</td>
                        <td>{{ $salary->employee->nama_lengkap ?? '-' }}</td>
                        <td>{{ $salary->bulan }}</td>
                        <td>Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                        <td><strong>Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</strong></td>
                        <td>
                            <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-warning btn-sm">
                                Edit
                            </a>
                            <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">Belum ada data gaji.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
