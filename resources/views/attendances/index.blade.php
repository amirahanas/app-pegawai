<!DOCTYPE html>
<html>
<head>
    <title>Attendances</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Attendance Records</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('attendances.create') }}" class="btn btn-primary mb-3">Add Attendance Record</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Employee</th>
                    <th>Tanggal</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
           <tbody>
    @foreach($attendances as $attendance)
    <tr>
        <td>{{ $attendance->employee->nama_lengkap }}</td>
        <td>{{ $attendance->tanggal->format('d M Y') }}</td>
        <td>{{ $attendance->jam_masuk ? $attendance->jam_masuk->format('H:i') : '-' }}</td>
        <td>{{ $attendance->jam_keluar ? $attendance->jam_keluar->format('H:i') : '-' }}</td>
        <td>
            @php
                $statusColors = [
                    'hadir' => 'success',
                    'izin' => 'warning', 
                    'sakit' => 'info',
                    'cuti' => 'primary',
                    'alpha' => 'danger'
                ];
            @endphp
            <span class="badge bg-{{ $statusColors[$attendance->status] ?? 'secondary' }}">
                {{ ucfirst($attendance->status) }}
            </span>
        </td>
        <td>
            <a href="{{ route('attendances.show', $attendance->id) }}" class="btn btn-info btn-sm">View</a>
            <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
        </table>

        {{ $attendances->links() }}
    </div>
</body>
</html>