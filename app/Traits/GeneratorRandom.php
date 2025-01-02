<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait GeneratorRandom
{
    public function generateUniqueCode(int $length = 6)
    {
        // do {
        //     // Generate kode acak
        //     $code = Str::upper(Str::random($length));
        // } while (KategoryBarang::where('barcode_barang', $code)->exists()); // Cek apakah sudah ada di database
        // return $code;
    }

    public function generateStringAndNumberRandom () : string
    {
        return Str::upper(Str::random(20));
    }
}
