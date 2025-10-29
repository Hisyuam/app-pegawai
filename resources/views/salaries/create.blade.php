@extends('master')
@section('title', 'Tambah Data Gaji')
@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Tambah Data Gaji</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('salaries.store') }}" method="POST">
                @csrf

                {{-- Pilih Karyawan --}}
                <div class="mb-3">
                    <label for="employee_id" class="form-label">Karyawan</label>
                    <select name="employee_id" id="employee_id" class="form-select" required>
                        <option value="" disabled selected>Pilih Karyawan</option>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}">{{ $emp->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Bulan --}}
                <div class="mb-3">
                    <label for="bulan" class="form-label">Bulan</label>
                    <input type="text" name="bulan" id="bulan" class="form-control" placeholder="Contoh: Oktober" required>
                </div>

                {{-- Gaji Pokok --}}
                <div class="mb-3">
                    <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" id="gaji_pokok" class="form-control" step="10000" required>
                </div>

                {{-- Tunjangan --}}
                <div class="mb-3">
                    <label for="tunjangan" class="form-label">Tunjangan</label>
                    <input type="number" name="tunjangan" id="tunjangan" class="form-control" step="10000">
                </div>

                {{-- Potongan --}}
                <div class="mb-3">
                    <label for="potongan" class="form-label">Potongan</label>
                    <input type="number" name="potongan" id="potongan" class="form-control" step="10000">
                </div>

                {{-- Total Gaji --}}
                <div class="mb-3">
                    <label for="total_gaji" class="form-label">Total Gaji</label>
                    <input type="number" name="total_gaji" id="total_gaji" class="form-control" step="10000" required>
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('salaries.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-success">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
