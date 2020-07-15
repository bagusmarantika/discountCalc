<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $table = 'barangs';
    protected $fillable = ['nama_barang', 'tipe_barang', 'refundable', 'discount_code_barang', 
    'price_barang'];
}
