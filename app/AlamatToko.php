<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlamatToko extends Model
{
    protected $table = 'alamat_toko';
    protected $fillable = ['kecamatan_id','detail'];
}
