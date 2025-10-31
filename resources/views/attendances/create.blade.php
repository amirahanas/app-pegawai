<!DOCTYPE html>
<html>
<head>
    <title>Add Attendance Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Add Attendance Record</h1>

        <form action="{{ route('attendances.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="employee_id" class="form-label">Employee</label>
                <select class="form-control" id="employee_id" name="employee_id" required>
                    <option value="">Pilih Employee</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->nama_lengkap }} - {{ $employee->department->nama_departemen ?? '-' }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jam_masuk" class="form-label">Jam Masuk</label>
                        <input type="time" class="form-control" id="jam_masuk" name="jam_masuk">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jam_keluar" class="form-label">Jam Keluar</label>
                        <input type="time" class="form-control" id="jam_keluar" name="jam_keluar">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="hadir">Hadir</option>
                    <option value="izin">Izin</option>
                    <option value="sakit">Sakit</option>
                    <option value="cuti">Cuti</option>
                    <option value="alpha">Alpha</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Optional keterangan..."></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script>
        // Auto set tanggal to today
        document.getElementById('tanggal').valueAsDate = new Date();
        
        // Auto set jam masuk to current time
        const now = new Date();
        const timeString = now.toTimeString().slice(0,5);
        document.getElementById('jam_masuk').value = timeString;
    </script>
</body>
</html>