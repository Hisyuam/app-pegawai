@extends('master')
@section('title', 'Edit Absensi')
@section('content')
<div class="container" style="margin-top: 40px;">
    <h2>Edit Absensi</h2>

    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST" style="margin-top: 20px;">
        @csrf
        @method('PUT')

        <table cellpadding="8" cellspacing="0">
            <tr>
                <td><label for="employee_id">Karyawan</label></td>
                <td>
                    <select name="employee_id" id="employee_id" required style="width: 250px;">
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}" {{ $emp->id == $attendance->employee_id ? 'selected' : '' }}>
                                {{ $emp->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="tanggal">Tanggal</label></td>
                <td><input type="date" name="tanggal" id="tanggal" value="{{ $attendance->tanggal }}" required></td>
            </tr>

            <tr>
                <td><label for="waktu_masuk">Waktu Masuk</label></td>
                <td><input type="time" name="waktu_masuk" id="waktu_masuk" value="{{ $attendance->waktu_masuk }}"></td>
            </tr>

            <tr>
                <td><label for="waktu_keluar">Waktu Keluar</label></td>
                <td><input type="time" name="waktu_keluar" id="waktu_keluar" value="{{ $attendance->waktu_keluar }}"></td>
            </tr>

            <tr>
                <td><label for="status_absensi">Status Absensi</label></td>
                <td>
                    <select name="status_absensi" id="status_absensi" required style="width: 250px;">
                        @foreach(['hadir','izin','sakit','alpha'] as $status)
                            <option value="{{ $status }}" {{ $attendance->status_absensi == $status ? 'selected' : '' }}>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
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
            ">Update</button>

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
