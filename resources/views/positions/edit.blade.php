@extends('master')

@section('title', 'Edit Jabatan')
@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Edit Jabatan</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('positions.update', $position->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                    <input type="text" id="nama_jabatan" name="nama_jabatan" 
                        value="{{ old('nama_jabatan', $position->nama_jabatan) }}" 
                        class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                    <input type="number" id="gaji_pokok" name="gaji_pokok" 
                        step="0.01" 
                        value="{{ old('gaji_pokok', $position->gaji_pokok) }}" 
                        class="form-control" required>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('positions.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-warning text-white">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
