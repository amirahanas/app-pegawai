<!-- resources/views/salaries/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Salary Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Salary Details</h1>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $salary->employee->nama_lengkap }} - {{ $salary->bulan }}</h5>
                <p><strong>Gaji Pokok:</strong> Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</p>
                <p><strong>Tunjangan:</strong> Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</p>
                <p><strong>Potongan:</strong> Rp {{ number_format($salary->potongan, 0, ',', '.') }}</p>
                <p><strong>Total Gaji:</strong> Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</p>
            </div>
        </div>

        <a href="{{ route('salaries.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
</body>
</html>