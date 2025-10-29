@extends('master')

@section('title', 'Edit Departemen')

@section('content')
<div class="container mt-5 mb-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Edit Departemen</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('departments.update', $department->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_departemen" class="form-label">Nama Departemen</label>
                    <input 
                        type="text" 
                        id="nama_departemen" 
                        name="nama_departemen" 
                        value="{{ old('nama_departemen', $department->nama_departemen) }}" 
                        class="form-control" 
                        placeholder="Masukkan nama departemen" 
                        required>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('departments.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
