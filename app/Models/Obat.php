<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

class Obat extends Model
{
    //
}
=======
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Obat extends Model
{
    protected $fillable = ['nama_obat', 'kemasan', 'harga'];

    public function periksa(): BelongsToMany
    {
        return $this->belongsToMany(Periksa::class, 'detail_periksa', 'id_obat', 'id_periksa');
    }
}
>>>>>>> a719af0 (bengkod)
