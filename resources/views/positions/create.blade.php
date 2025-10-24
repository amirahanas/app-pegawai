<!DOCTYPE html>
<html>
<head>
    <title>Add Position</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Add Position</h1>

        <form action="{{ route('positions.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" required>
            </div>

            <div class="mb-3">
                <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" min="0" step="0.01" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('positions.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>