<!DOCTYPE html>
<html>
<head>
    <title>Salaries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Salary Records</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('salaries.create') }}" class="btn btn-primary mb-3">Add Salary Record</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Employee</th>
                    <th>Bulan</th>
                    <th>Gaji Pokok</th>
                    <th>Tunjangan</th>
                    <th>Potongan</th>
                    <th>Total Gaji</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salaries as $salary)
                <tr>
                    <td>{{ $salary->employee->nama_lengkap }}</td>
                    <td>{{ \Carbon\Carbon::parse($salary->bulan)->format('F Y') }}</td>
                    <td>Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                    <td class="fw-bold">Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('salaries.show', $salary->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $salaries->links() }}
    </div>
</body>
</html>