<?php

namespace App\Models;

use Milon\Barcode\DNS1D;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\DateFormatCreatedAttAndUpdatedAt;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarangRusak extends Model
{
    use HasFactory, DateFormatCreatedAttAndUpdatedAt;

    protected $table = 'barang_rusak';

    protected $fillable = [
        'nama_barang',
        'barcode',
        'nomor_nota_retur_barang',
        'quantity_pcs',
        'quantity_carton',
        'tanggal_expired',
        'tanggal_retur',
        'reasson_retur_id',
        'user_id'
    ];

    protected function quantityPcsFormat () : Attribute
    {
        return Attribute::make(
            get: fn () => number_format($this->attributes['quantity_pcs'], 0, ',', '.')
        );
    }

    protected function quantityCartonFormat () : Attribute
    {
        return Attribute::make(
            get: fn () => number_format($this->attributes['quantity_carton'], 0, ',', '.')
        );
    }

    protected function tanggalExpiredFormat () : Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->attributes['tanggal_expired'])->format('d F Y')
        );
    }

    protected function tanggalReturFormat () : Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->attributes['tanggal_retur'])->format('d F Y')
        );
    }

    protected function barcodeGenerate (): Attribute
    {
        return Attribute::make(
            get: function () { 
                // Mengambil nilai barcode dari atribut
                $barcode = $this->getAttribute('barcode');
                
                 // Menghitung panjang barcode
                $length = strlen($barcode);
                    
                // Menentukan tipe barcode berdasarkan panjang
                $barcodeType = 'EAN13';
    
                if ($length == 13 && preg_match('/^\d+$/', $barcode)) {
                    $barcodeType = 'EAN13';
                } elseif ($length == 8 && preg_match('/^\d+$/', $barcode)) {
                    $barcodeType = 'EAN8';
                } elseif ($length == 12 && preg_match('/^\d+$/', $barcode)) {
                    $barcodeType = 'UPCA';
                } elseif ($length > 13 && preg_match('/^[a-zA-Z0-9]+$/', $barcode)) {
                    $barcodeType = 'C128';
                }
    
                $barcodeGenerator = new DNS1D();
                return $barcodeGenerator->getBarcodeHTML($barcode, $barcodeType);
            }
        );
    }

    public function reassonRetur () : BelongsTo
    {
        return $this->belongsTo(ReassonRetur::class);
    }

    public function user () : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
