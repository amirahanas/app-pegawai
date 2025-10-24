<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .employee-table {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .table-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px 10px 0 0;
        }
        
        .table thead th {
            background-color: #f8f9fa;
            border-bottom: 2px solid #dee2e6;
            font-weight: 600;
            color: #495057;
            padding: 15px 12px;
        }
        
        .table tbody tr {
            transition: all 0.3s ease;
        }
        
        .table tbody tr:hover {
            background-color: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .table tbody td {
            padding: 15px 12px;
            vertical-align: middle;
            border-color: #e9ecef;
        }
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85em;
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
        
        .action-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        
        .btn-action {
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.85em;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        
        .btn-detail {
            background-color: #17a2b8;
            color: white;
        }
        
        .btn-edit {
            background-color: #ffc107;
            color: #212529;
        }
        
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        
        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .btn-add {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }
        
        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(102, 126, 234, 0.3);
            color: white;
        }
        
        .page-title {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 30px;
            position: relative;
        }
        
        .page-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 2px;
        }
        
        .table-responsive {
            border-radius: 10px;
        }
        
        .employee-count {
            background: #e3f2fd;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #2196f3;
        }
        
        @media (max-width: 768px) {
            .table-responsive {
                font-size: 0.9em;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn-action {
                text-align: center;
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    @extends('master')
    @section('title', 'Daftar Pegawai')
    @section('content')
        <div class="container mt-5">
            <!-- Header Section -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="page-title">Daftar Pegawai</h1>
                <a href="{{ route('employees.create') }}" class="btn-add">
                    <i class="fas fa-plus-circle"></i>
                    Tambah Pegawai Baru
                </a>
            </div>

            <!-- Employee Count -->
            <div class="employee-count">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="mb-0">
                            <i class="fas fa-users me-2"></i>
                            Total Pegawai: <strong>{{ $employees->count() }}</strong>
                        </h5>
                    </div>
                    <div class="col-md-6 text-md-end">
                        @php
                            $activeCount = $employees->where('status', 'aktif')->count();
                            $inactiveCount = $employees->where('status', 'nonaktif')->count();
                        @endphp
                        <small class="text-muted">
                            Aktif: <span class="text-success">{{ $activeCount }}</span> | 
                            Nonaktif: <span class="text-danger">{{ $inactiveCount }}</span>
                        </small>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="employee-table">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th><i class="fas fa-user me-2"></i>Nama Lengkap</th>
                                <th><i class="fas fa-envelope me-2"></i>Email</th>
                                <th><i class="fas fa-phone me-2"></i>Nomor Telepon</th>
                                <th><i class="fas fa-birthday-cake me-2"></i>Tanggal Lahir</th>
                                <th><i class="fas fa-map-marker-alt me-2"></i>Alamat</th>
                                <th><i class="fas fa-calendar-alt me-2"></i>Tanggal Masuk</th>
                                <th><i class="fas fa-circle me-2"></i>Status</th>
                                <th><i class="fas fa-cogs me-2"></i>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-placeholder bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                            {{ strtoupper(substr($employee->nama_lengkap, 0, 1)) }}
                                        </div>
                                        <strong>{{ $employee->nama_lengkap }}</strong>
                                    </div>
                                </td>
                                <td>{{ $employee->email }}</td>
                                <td>
                                    <a href="tel:{{ $employee->nomor_telepon }}" class="text-decoration-none">
                                        <i class="fas fa-phone me-1"></i>
                                        {{ $employee->nomor_telepon }}
                                    </a>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d M Y') }}</td>
                                <td>
                                    <span class="d-inline-block text-truncate" style="max-width: 150px;" title="{{ $employee->alamat }}">
                                        {{ $employee->alamat }}
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d M Y') }}</td>
                                <td>
                                    <span class="status-badge {{ $employee->status == 'aktif' ? 'status-aktif' : 'status-nonaktif' }}">
                                        <i class="fas fa-circle me-1" style="font-size: 6px;"></i>
                                        {{ ucfirst($employee->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('employees.show', $employee->id) }}" class="btn-action btn-detail">
                                            <i class="fas fa-eye me-1"></i>Detail
                                        </a>
                                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn-action btn-edit">
                                            <i class="fas fa-edit me-1"></i>Edit
                                        </a>
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-delete" onclick="return confirm('Yakin ingin menghapus data pegawai ini?')">
                                                <i class="fas fa-trash me-1"></i>Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Empty State -->
            @if($employees->count() == 0)
            <div class="text-center py-5">
                <div class="empty-state">
                    <i class="fas fa-users fa-4x text-muted mb-3"></i>
                    <h4 class="text-muted">Belum ada data pegawai</h4>
                    <p class="text-muted">Mulai dengan menambahkan pegawai pertama Anda</p>
                    <a href="{{ route('employees.create') }}" class="btn-add mt-3">
                        <i class="fas fa-plus-circle"></i>
                        Tambah Pegawai Pertama
                    </a>
                </div>
            </div>
            @endif

            <!-- Pagination -->
            @if($employees->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted">
                    Menampilkan {{ $employees->firstItem() }} - {{ $employees->lastItem() }} dari {{ $employees->total() }} pegawai
                </div>
                <nav>
                    {{ $employees->links() }}
                </nav>
            </div>
            @endif
        </div>

        <script>
            // Add smooth animations
            document.addEventListener('DOMContentLoaded', function() {
                // Add loading animation
                const rows = document.querySelectorAll('tbody tr');
                rows.forEach((row, index) => {
                    row.style.animationDelay = `${index * 0.1}s`;
                    row.classList.add('fade-in');
                });
            });

            // Add CSS for fade-in animation
            const style = document.createElement('style');
            style.textContent = `
                .fade-in {
                    animation: fadeIn 0.5s ease-in-out forwards;
                    opacity: 0;
                }
                
                @keyframes fadeIn {
                    from {
                        opacity: 0;
                        transform: translateY(20px);
                    }
                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }
            `;
            document.head.appendChild(style);
        </script>
    @endsection
</body>
</html>