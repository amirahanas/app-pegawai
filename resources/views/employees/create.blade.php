<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Form Pegawai</h1>
        
        <!-- DEBUG: Tampilkan data departments -->
        @if(!isset($departments) || $departments->count() == 0)
            <div class="alert alert-danger">
                <strong>Error:</strong> Data departments tidak ditemukan! 
                <a href="{{ route('departments.create') }}" class="btn btn-sm btn-warning">Buat Department Dulu</a>
            </div>
        @endif

        <form action="{{ route('employees.store') }}" method="POST">
            @csrf 
            <table class="table table-bordered">
                <tr>
                    <td width="30%"><label for="nama_lengkap">Nama Lengkap:</label></td>
                    <td><input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" id="email" name="email" class="form-control" required></td>
                </tr>
                <tr>
                    <td><label for="nomor_telepon">Nomor Telepon:</label></td>
                    <td><input type="text" id="nomor_telepon" name="nomor_telepon" class="form-control" required></td>
                </tr>
                <tr>
                    <td><label for="tanggal_lahir">Tanggal Lahir:</label></td>
                    <td><input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required></td>
                </tr>
                <tr>
                    <td><label for="alamat">Alamat:</label></td>
                    <td><textarea id="alamat" name="alamat" class="form-control" required></textarea></td>
                </tr>
                <tr>
                    <td><label for="tanggal_masuk">Tanggal Masuk:</label></td>
                    <td><input type="date" id="tanggal_masuk" name="tanggal_masuk" class="form-control" required></td>
                </tr>
                <tr>
                    <td><label for="status">Status:</label></td>
                    <td>
                        <select id="status" name="status" class="form-control" required>
                            <option value="aktif">Aktif</option>
                            <option value="non-aktif">Nonaktif</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="department_id">Departemen:</label></td>
                    <td>
                        <select id="department_id" name="department_id" class="form-control" required>
                            <option value="">Pilih Departemen</option>
                            @foreach($departments as $dept)
                                <!-- PERBAIKAN: ganti $dept->name menjadi $dept->nama_departemen -->
                                <option value="{{ $dept->id }}">{{ $dept->nama_departemen }}</option>
                            @endforeach
                        </select>
                        
                        <!-- Info debug -->
                        @if($departments->count() > 0)
                            <small class="text-muted">Terdapat {{ $departments->count() }} departemen</small>
                        @else
                            <small class="text-danger">Tidak ada data departemen!</small>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td><label for="jabatan_id">Jabatan:</label></td>
                    <td>
                        <select id="jabatan_id" name="jabatan_id" class="form-control" required>
                            <option value="">Pilih Jabatan</option>
                            @foreach($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->nama_jabatan }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:right;">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>