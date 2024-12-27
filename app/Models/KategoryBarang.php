<?php

namespace App\Models;

use Milon\Barcode\DNS1D;
use Illuminate\Database\Eloquent\Model;
use App\DateFormatCreatedAttAndUpdatedAt;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoryBarang extends Model
{
    use HasFactory, DateFormatCreatedAttAndUpdatedAt;

    protected $table = 'kategory_barang';

    protected $fillable = [
        'nama_barang', 'barcode_barang', 'kategory_barang'
    ];

    protected function barcodeBarangGenerate(): Attribute
    {
        return Attribute::make(
            get: function () {
                $barcode = new DNS1D();
                return $barcode->getBarcodeHTML($this->attributes['barcode_barang'], 'C128');
            }
        );
    }

}
