<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\DateFormatCreatedAttAndUpdatedAt;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataLogistik extends Model
{
    use HasFactory, DateFormatCreatedAttAndUpdatedAt;

    protected $table = 'data_logistik';

    protected $fillable = [
        'tanggal',
        'no_nota_retur_barang',
        'nama_toko',
        'total_harga',
        'jumlah_barang'
    ];

    protected function tanggalFormat(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->attributes['tanggal'])->format('d F Y')
        );
    }

    protected function totalHargaFormat(): Attribute
    {
        return Attribute::make(
            get: fn () => number_format($this->attributes['total_harga'], 0, ',', '.')
        );
    }

    protected function jumlahBarangFormat(): Attribute
    {
        return Attribute::make(
            get: fn () => number_format($this->attributes['jumlah_barang'], 0, ',', '.')
        );
    }

}
