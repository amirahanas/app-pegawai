<!-- resources/views/attendances/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Attendance Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Attendance Details</h1>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $attendance->employee->nama_lengkap }}</h5>
                <p><strong>Tanggal:</strong> {{ $attendance->tanggal->format('d M Y') }}</p>
                <p><strong>Jam Masuk:</strong> {{ $attendance->jam_masuk ? $attendance->jam_masuk->format('H:i') : '-' }}</p>
                <p><strong>Jam Keluar:</strong> {{ $attendance->jam_keluar ? $attendance->jam_keluar->format('H:i') : '-' }}</p>
                <p><strong>Status:</strong> 
                    <span class="badge bg-{{ $attendance->status == 'hadir' ? 'success' : ($attendance->status == 'izin' ? 'warning' : 'danger') }}">
                        {{ ucfirst($attendance->status) }}
                    </span>
                </p>
                <p><strong>Keterangan:</strong> {{ $attendance->keterangan ?? '-' }}</p>
            </div>
        </div>

        <a href="{{ route('attendances.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
</body>
</html>