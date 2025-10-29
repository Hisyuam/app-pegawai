@extends('master')

@section('title', 'Tambah Jabatan')
@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Jabatan</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('positions.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                    <input type="text" id="nama_jabatan" name="nama_jabatan" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                    <input type="number" id="gaji_pokok" name="gaji_pokok" class="form-control" step="0.01" required>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('positions.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
