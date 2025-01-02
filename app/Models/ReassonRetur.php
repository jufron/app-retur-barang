<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ReassonRetur extends Model
{
    protected $table = 'reasson_retur';

    protected $fillable = [
        'name'
    ];

    public function barangRusak () : HasMany
    {
        return $this->hasMany(BarangRusak::class, 'reason_retur_id');
    }
}
