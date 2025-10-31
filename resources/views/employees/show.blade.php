<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .profile-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 20px;
        }
        
        .profile-header {
            text-align: center;
            padding-bottom: 30px;
            border-bottom: 2px solid #f8f9fa;
            margin-bottom: 30px;
        }
        
        .avatar-large {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            font-weight: bold;
            margin: 0 auto 20px;
        }
        
        .employee-name {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .employee-position {
            color: #6c757d;
            font-size: 1.2rem;
            margin-bottom: 15px;
        }
        
        .status-badge {
            padding: 8px 20px;
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
        
        .info-section {
            margin-bottom: 30px;
        }
        
        .section-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f8f9fa;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
        
        .info-item:hover {
            background-color: #f8f9fa;
        }
        
        .info-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e3f2fd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2196f3;
            margin-right: 15px;
            flex-shrink: 0;
        }
        
        .info-content {
            flex: 1;
        }
        
        .info-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 5px;
        }
        
        .info-value {
            color: #6c757d;
        }
        
        .action-buttons {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
            margin-top: 30px;
        }
        
        .btn-edit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-right: 10px;
        }
        
        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(102, 126, 234, 0.4);
            color: white;
        }
        
        .btn-back {
            background: #6c757d;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-back:hover {
            background: #5a6268;
            color: white;
            transform: translateY(-2px);
        }
        
        @media (max-width: 768px) {
            .profile-container {
                padding: 20px;
                margin: 10px;
            }
            
            .avatar-large {
                width: 100px;
                height: 100px;
                font-size: 2.5rem;
            }
            
            .btn-edit, .btn-back {
                width: 100%;
                margin-bottom: 10px;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    @extends('master')
    @section('title', 'Detail Pegawai')
    @section('content')
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="profile-container">
                        <!-- Profile Header -->
                        <div class="profile-header">
                            <div class="avatar-large">
                                {{ strtoupper(substr($employee->nama_lengkap, 0, 1)) }}
                            </div>
                            <h1 class="employee-name">{{ $employee->nama_lengkap }}</h1>
                            <div class="employee-position">
                                @if($employee->position)
                                    {{ $employee->position->nama_jabatan }}
                                @else
                                    <span class="text-muted">Belum ada jabatan</span>
                                @endif
                            </div>
                            <span class="status-badge {{ $employee->status == 'aktif' ? 'status-aktif' : 'status-nonaktif' }}">
                                <i class="fas fa-circle me-1" style="font-size: 6px;"></i>
                                {{ ucfirst($employee->status) }}
                            </span>
                        </div>

                        <!-- Personal Information -->
                        <div class="info-section">
                            <h4 class="section-title">
                                <i class="fas fa-user-circle"></i>
                                Informasi Pribadi
                            </h4>
                            
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="info-content">
                                    <div class="info-label">Email</div>
                                    <div class="info-value">{{ $employee->email }}</div>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="info-content">
                                    <div class="info-label">Nomor Telepon</div>
                                    <div class="info-value">
                                        <a href="tel:{{ $employee->nomor_telepon }}" class="text-decoration-none">
                                            {{ $employee->nomor_telepon }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-birthday-cake"></i>
                                </div>
                                <div class="info-content">
                                    <div class="info-label">Tanggal Lahir</div>
                                    <div class="info-value">
                                        {{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d F Y') }}
                                        ({{ \Carbon\Carbon::parse($employee->tanggal_lahir)->age }} tahun)
                                    </div>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="info-content">
                                    <div class="info-label">Alamat</div>
                                    <div class="info-value">{{ $employee->alamat }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Employment Information -->
                        <div class="info-section">
                            <h4 class="section-title">
                                <i class="fas fa-briefcase"></i>
                                Informasi Kepegawaian
                            </h4>
                            
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div class="info-content">
                                    <div class="info-label">Tanggal Masuk</div>
                                    <div class="info-value">
                                        {{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d F Y') }}
                                        ({{ \Carbon\Carbon::parse($employee->tanggal_masuk)->diffForHumans() }})
                                    </div>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-user-tag"></i>
                                </div>
                                <div class="info-content">
                                    <div class="info-label">Jabatan</div>
                                    <div class="info-value">
                                        @if($employee->position)
                                            {{ $employee->position->nama_jabatan }}
                                        @else
                                            <span class="text-muted">Belum ditentukan</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="info-content">
                                    <div class="info-label">Masa Kerja</div>
                                    <div class="info-value">
                                        {{ \Carbon\Carbon::parse($employee->tanggal_masuk)->diffInYears(now()) }} tahun
                                        {{ \Carbon\Carbon::parse($employee->tanggal_masuk)->diffInMonths(now()) % 12 }} bulan
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="action-buttons">
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-edit">
                                <i class="fas fa-edit me-2"></i>Edit Data
                            </a>
                            <a href="{{ route('employees.index') }}" class="btn btn-back">
                                <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>
</html>