<!DOCTYPE html>
<html>
<head>
    <title>Positions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Positions</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('positions.create') }}" class="btn btn-primary mb-3">Add Position</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Jabatan</th>
                    <th>Gaji Pokok</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($positions as $position)
                <tr>
                    <td>{{ $position->nama_jabatan }}</td>
                    <td>Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('positions.destroy', $position->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>