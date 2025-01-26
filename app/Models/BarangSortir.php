<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\DateFormatCreatedAttAndUpdatedAt;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BarangSortir extends Model
{
    use HasFactory, DateFormatCreatedAttAndUpdatedAt;

    protected $table = 'barang_sortir';

    protected $fillable = [
        'nomor_nota_retur_barang',
        'barang_id',
        'quantity_pcs',
        'quantity_carton',
        'tanggal_expired',
    ];

    /**
    * * Get the formatted quantity in pieces.
    *
    * @return \Illuminate\Database\Eloquent\Casts\Attribute
    */
    protected function quantityPcsFormat () : Attribute
    {
        return Attribute::make(
            get: fn () => number_format($this->attributes['quantity_pcs'], 0, ',', '.')
        );
    }

    /**
    * * Get the formatted quantity in cartons.
    *
    * @return \Illuminate\Database\Eloquent\Casts\Attribute
    */
    protected function quantityCartonFormat () : Attribute
    {
        return Attribute::make(
            get: fn () => number_format($this->attributes['quantity_carton'], 0, ',', '.')
        );
    }

    /**
    * * Get the formatted expiry date.
    *
    * @return \Illuminate\Database\Eloquent\Casts\Attribute
    */
    protected function tanggalExpiredFormat () : Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->attributes['tanggal_expired'])->format('d F Y')
        );
    }

    /**
     * Get the barang that owns the BarangRusak
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }
}
