@extends('master')
@section('title', 'Edit Data Gaji')
@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Edit Data Gaji</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Pilih Karyawan --}}
                <div class="mb-3">
                    <label for="employee_id" class="form-label">Karyawan</label>
                    <select name="employee_id" id="employee_id" class="form-select" required>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}" {{ $salary->employee_id == $emp->id ? 'selected' : '' }}>
                                {{ $emp->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Bulan --}}
                <div class="mb-3">
                    <label for="bulan" class="form-label">Bulan</label>
                    <input type="text" name="bulan" id="bulan" class="form-control" value="{{ $salary->bulan }}" required>
                </div>

                {{-- Gaji Pokok --}}
                <div class="mb-3">
                    <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" id="gaji_pokok" class="form-control" step="10000" value="{{ $salary->gaji_pokok }}" required>
                </div>

                {{-- Tunjangan --}}
                <div class="mb-3">
                    <label for="tunjangan" class="form-label">Tunjangan</label>
                    <input type="number" name="tunjangan" id="tunjangan" class="form-control" step="10000" value="{{ $salary->tunjangan }}">
                </div>

                {{-- Potongan --}}
                <div class="mb-3">
                    <label for="potongan" class="form-label">Potongan</label>
                    <input type="number" name="potongan" id="potongan" class="form-control" step="10000" value="{{ $salary->potongan }}">
                </div>

                {{-- Total Gaji --}}
                <div class="mb-3">
                    <label for="total_gaji" class="form-label">Total Gaji</label>
                    <input type="number" name="total_gaji" id="total_gaji" class="form-control" step="10000" value="{{ $salary->total_gaji }}" required>
                </div>

                {{-- Tombol --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
