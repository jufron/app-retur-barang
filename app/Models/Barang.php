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
                // Mengambil dan membersihkan nilai barcode dari atribut
                $barcode = trim($this->getAttribute('kode_barcode')); // Hapus spasi depan/belakang
                $barcode = preg_replace('/\D/', '', $barcode); // Hapus karakter non-digit

                // Pastikan barcode memiliki panjang yang valid
                $length = strlen($barcode);
                if (!in_array($length, [8, 12, 13])) {
                    return "<span class='text-danger'>Kode Barcode harus 8, 12, atau 13 digit</span>";
                }

                // Menentukan tipe barcode berdasarkan panjangnya
                $barcodeType = match ($length) {
                    8   => 'EAN8',
                    12  => 'UPCA',
                    13  => 'EAN13',
                    default => 'EAN13',
                };

                try {
                    $barcodeGenerator = new DNS1D();
                    return $barcodeGenerator->getBarcodeHTML($barcode, $barcodeType);
                } catch (\Exception $e) {
                    return "<span class='text-danger'>Gagal generate barcode: " . htmlspecialchars($e->getMessage()) . "</span>";
                }
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
