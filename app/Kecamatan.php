<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $fillable = [
        'kabupaten_id', 'kecamatan_id','title'
    ];
}
