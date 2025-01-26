<?php

namespace App\Models;

use Milon\Barcode\DNS1D;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\DateFormatCreatedAttAndUpdatedAt;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    /** @use HasFactory<\Database\Factories\BarangFactory> */
    use HasFactory, DateFormatCreatedAttAndUpdatedAt;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'barang';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'kode_barcode',
        'nama_barang',
        'kategory_id',
        'deskripsi_barang',
    ];

    /**
     * Get the barcode HTML representation.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function barcodeGenerate (): Attribute
    {
        return Attribute::make(
            get: function () {
                // Mengambil nilai barcode dari atribut
                $barcode = $this->getAttribute('kode_barcode');

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

    /**
     * Get the limited description of the product.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function deskripsiBarangLimit () : Attribute
    {
        return Attribute::make(
            get: fn () => Str::limit($this->attributes['deskripsi_barang'], 60)
        );
    }

    /**
     * Get all of the barangRusak for the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function barangRusak(): HasMany
    {
        return $this->hasMany(BarangRusak::class);
    }

    /**
     * Get the kategory that owns the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategory(): BelongsTo
    {
        return $this->belongsTo(Kategory::class);
    }

    /**
     * Get all of the barangSortir for the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function barangSortir(): HasMany
    {
        return $this->hasMany(BarangSortir::class);
    }
}
