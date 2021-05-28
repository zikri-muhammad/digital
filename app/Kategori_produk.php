<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori_produk extends Model
{
    protected $fillable = [
        'nama_kategori', 'description'
    ];

    protected $hidden = [

    ];

    public function produk(){
        return $this->hasMany(Produk::class);
    }


}
