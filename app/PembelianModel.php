<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembelianModel extends Model
{
    protected $table = 'tbl_pembelians';
    protected $primaryKey = 'id_pembelian';

    protected $fillable = [
        'kategori',
        'total_item',
        'total_nominal',
    ];
}
