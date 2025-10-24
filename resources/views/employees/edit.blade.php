<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .edit-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 20px;
        }
        
        .page-title {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 15px;
        }
        
        .page-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
        }
        
        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }
        
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .form-section {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            border-left: 4px solid #667eea;
        }
        
        .form-section-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(102, 126, 234, 0.4);
            color: white;
        }
        
        .btn-cancel {
            background: #6c757d;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin-right: 10px;
        }
        
        .btn-cancel:hover {
            background: #5a6268;
            color: white;
            transform: translateY(-2px);
        }
        
        .avatar-preview {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            font-weight: bold;
            margin: 0 auto 20px;
        }
        
        .status-badge {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: 500;
        }
        
        .status-aktif {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-nonaktif {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .form-actions {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-top: 30px;
        }
        
        @media (max-width: 768px) {
            .edit-container {
                padding: 20px;
                margin: 10px;
            }
            
            .btn-submit, .btn-cancel {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    @extends('master')
    @section('title', 'Edit Data Pegawai')
    @section('content')
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="edit-container">
                        <h1 class="page-title">
                            <i class="fas fa-user-edit me-2"></i>
                            Edit Data Pegawai
                        </h1>

                        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Avatar Preview -->
                            <div class="text-center mb-4">
                                <div class="avatar-preview">
                                    {{ strtoupper(substr($employee->nama_lengkap, 0, 1)) }}
                                </div>
                                <h5 class="text-muted">{{ $employee->nama_lengkap }}</h5>
                                <span class="status-badge {{ $employee->status == 'aktif' ? 'status-aktif' : 'status-nonaktif' }}">
                                    <i class="fas fa-circle me-1" style="font-size: 6px;"></i>
                                    {{ ucfirst($employee->status) }}
                                </span>
                            </div>

                            <!-- Personal Information Section -->
                            <div class="form-section">
                                <h5 class="form-section-title">
                                    <i class="fas fa-user-circle"></i>
                                    Informasi Pribadi
                                </h5>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nama_lengkap" class="form-label">Nama Lengkap *</label>
                                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" 
                                               value="{{ old('nama_lengkap', $employee->nama_lengkap) }}" required>
                                        @error('nama_lengkap')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email *</label>
                                        <input type="email" class="form-control" id="email" name="email" 
                                               value="{{ old('email', $employee->email) }}" required>
                                        @error('email')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nomor_telepon" class="form-label">Nomor Telepon *</label>
                                        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" 
                                               value="{{ old('nomor_telepon', $employee->nomor_telepon) }}" required>
                                        @error('nomor_telepon')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir *</label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" 
                                               value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}" required>
                                        @error('tanggal_lahir')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat Lengkap *</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $employee->alamat) }}</textarea>
                                    @error('alamat')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Employment Information Section -->
                            <div class="form-section">
                                <h5 class="form-section-title">
                                    <i class="fas fa-briefcase"></i>
                                    Informasi Kepegawaian
                                </h5>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="tanggal_masuk" class="form-label">Tanggal Masuk *</label>
                                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" 
                                               value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}" required>
                                        @error('tanggal_masuk')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="jabatan_id" class="form-label">Jabatan *</label>
                                        <select class="form-control" id="jabatan_id" name="jabatan_id" required>
                                            <option value="">Pilih Jabatan</option>
                                            @foreach($positions as $position)
                                                <option value="{{ $position->id }}" 
                                                    {{ old('jabatan_id', $employee->jabatan_id) == $position->id ? 'selected' : '' }}>
                                                    {{ $position->nama_jabatan }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('jabatan_id')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status Kepegawaian *</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="nonaktif" {{ old('status', $employee->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                    </select>
                                    @error('status')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="form-actions">
                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-cancel">
                                    <i class="fas fa-arrow-left me-2"></i>Kembali
                                </a>
                                <button type="submit" class="btn btn-submit">
                                    <i class="fas fa-save me-2"></i>Update Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Real-time avatar update
            document.getElementById('nama_lengkap').addEventListener('input', function() {
                const initial = this.value ? this.value.charAt(0).toUpperCase() : '?';
                document.querySelector('.avatar-preview').textContent = initial;
            });
        </script>
    @endsection
</body>
</html>