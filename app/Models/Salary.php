<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
        'karyawan_id',
        'bulan',
        'gaji_pokok',
        'tunjangan',
        'potongan',
        'total_gaji',
    ];

    protected $casts = [
        'gaji_pokok' => 'decimal:2',
        'tunjangan' => 'decimal:2',
        'potongan' => 'decimal:2',
        'total_gaji' => 'decimal:2',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'karyawan_id');
    }
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Hitung total_gaji sebelum menyimpan
            $model->total_gaji = $model->gaji_pokok + $model->tunjangan - $model->potongan;
        });

        static::updating(function ($model) {
            // Hitung total_gaji sebelum memperbarui
            $model->total_gaji = $model->gaji_pokok + $model->tunjangan - $model->potongan;
        });
    }
}   