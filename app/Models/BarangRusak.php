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

    /**
     * * The table associated with the model.
     * * update model V.3
     *
     * @var string
     */
    protected $table = 'barang_rusak';

    /**
     * * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'nomor_nota_retur_barang',
        'quantity_pcs',
        'quantity_carton',
        'tanggal_expired',
        'tanggal_retur',
        'barang_id',
        'reasson_retur_id',
        'user_id',
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
     * * Get the formatted return date.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function tanggalReturFormat () : Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->attributes['tanggal_retur'])->format('d F Y')
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

    /**
     * * Get the reason for return that owns the damaged item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reassonRetur () : BelongsTo
    {
        return $this->belongsTo(ReassonRetur::class);
    }

    /**
     * * Get the user that owns the damaged item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user () : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
