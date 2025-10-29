@extends('master')
@section('title', 'Tambah Absensi')
@section('content')
<div class="container" style="margin-top: 40px;">
    <h2>Tambah Absensi</h2>

    <form action="{{ route('attendances.store') }}" method="POST" style="margin-top: 20px;">
        @csrf

        <table cellpadding="8" cellspacing="0">
            <tr>
                <td><label for="employee_id">Karyawan</label></td>
                <td>
                    <select name="employee_id" id="employee_id" required style="width: 250px;">
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}">{{ $emp->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="tanggal">Tanggal</label></td>
                <td><input type="date" name="tanggal" id="tanggal" required></td>
            </tr>

            <tr>
                <td><label for="waktu_masuk">Waktu Masuk</label></td>
                <td><input type="time" name="waktu_masuk" id="waktu_masuk"></td>
            </tr>

            <tr>
                <td><label for="waktu_keluar">Waktu Keluar</label></td>
                <td><input type="time" name="waktu_keluar" id="waktu_keluar"></td>
            </tr>

            <tr>
                <td><label for="status_absensi">Status Absensi</label></td>
                <td>
                    <select name="status_absensi" id="status_absensi" required style="width: 250px;">
                        <option value="hadir">Hadir</option>
                        <option value="izin">Izin</option>
                        <option value="sakit">Sakit</option>
                        <option value="alpha">Alpha</option>
                    </select>
                </td>
            </tr>
        </table>

        <div style="margin-top: 20px;">
            <button type="submit" style="
                background-color: #4CAF50;
                color: white;
                padding: 8px 16px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            ">Simpan</button>

            <a href="{{ route('attendances.index') }}" style="
                background-color: gray;
                color: white;
                padding: 8px 16px;
                text-decoration: none;
                border-radius: 4px;
            ">Batal</a>
        </div>
    </form>
</div>
@endsection
