<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'kategori_produk_id','nama_produk', 'description', 'gambar', 'stok'
    ];

    protected $hidden = [

    ];

    public function getPhotoAttribute($value)
    {
        return url('storage/' . $value);
    }

   
    public function kategoriProduk(){
        return $this->belongsTo(Kategori_produk::class);
    }

    // relasi to transaksions 
    public function transaksions(){
        return $this->hasMany(Transaksion::class,'produk_id');
    }
}
