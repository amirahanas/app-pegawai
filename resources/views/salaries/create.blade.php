<!DOCTYPE html>
<html>
<head>
    <title>Add Salary Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Add Salary Record</h1>

        <form action="{{ route('salaries.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="karyawan_id" class="form-label">Employee</label>
                <select class="form-control" id="karyawan_id" name="karyawan_id" required>
                    <option value="">Pilih Employee</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->nama_lengkap }} - {{ $employee->position->nama_jabatan ?? '-' }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="bulan" class="form-label">Bulan</label>
                <input type="month" class="form-control" id="bulan" name="bulan" required>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                        <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" min="0" step="0.01" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="tunjangan" class="form-label">Tunjangan</label>
                        <input type="number" class="form-control" id="tunjangan" name="tunjangan" min="0" step="0.01" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="potongan" class="form-label">Potongan</label>
                        <input type="number" class="form-control" id="potongan" name="potongan" min="0" step="0.01" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="alert alert-info">
                    <strong>Total Gaji akan dihitung otomatis:</strong><br>
                    <span id="totalPreview">Gaji Pokok + Tunjangan - Potongan</span>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script>
        // Auto calculate total gaji preview
        function calculateTotal() {
            const gajiPokok = parseFloat(document.getElementById('gaji_pokok').value) || 0;
            const tunjangan = parseFloat(document.getElementById('tunjangan').value) || 0;
            const potongan = parseFloat(document.getElementById('potongan').value) || 0;
            const total = gajiPokok + tunjangan - potongan;
            
            document.getElementById('totalPreview').textContent = 
                `Rp ${total.toLocaleString('id-ID')}`;
        }

        document.getElementById('gaji_pokok').addEventListener('input', calculateTotal);
        document.getElementById('tunjangan').addEventListener('input', calculateTotal);
        document.getElementById('potongan').addEventListener('input', calculateTotal);
    </script>
</body>
</html>