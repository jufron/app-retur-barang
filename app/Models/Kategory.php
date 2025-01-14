<?php

namespace App\Models;

use Milon\Barcode\DNS1D;
use Illuminate\Database\Eloquent\Model;
use App\DateFormatCreatedAttAndUpdatedAt;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategory extends Model
{
    use HasFactory, DateFormatCreatedAttAndUpdatedAt;

    protected $table = 'kategory';

    protected $fillable = [
        'name'
    ];

    // protected function barcodeBarangGenerate(): Attribute
    // {
    //     return Attribute::make(
    //         get: function () {
    //             $barcode = new DNS1D();
    //             return $barcode->getBarcodeHTML($this->attributes['barcode_barang'], 'C128');
    //         }
    //     );
    // }

    /**
     * Get all of the barang for the Kategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function barang(): HasMany
    {
        return $this->hasMany(Barang::class);
    }
}
