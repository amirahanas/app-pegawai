<!DOCTYPE html>
<html>
<head>
    <title>Add Department</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Add Department</h1>

        <form action="{{ route('departments.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_departemen" class="form-label">Nama Departemen</label>
                <input type="text" class="form-control" id="nama_departemen" name="nama_departemen" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>