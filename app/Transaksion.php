<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksion extends Model
{
    protected $fillable = [
        'user_id', 'type_transaksi_id', 'name'
    ];

    protected $hidden = [

    ];

    public function transaksionDetail(){
        return $this->hasMany(TrasaksionDetail::class,'transaksion_id');
    }

    // belongs produks
    public function produks(){
        return $this->belongsTo(Produk::class,'produk_id', 'id');
    }
   
    // relasi has mony to transaksions details
    // public function transaksionsDetails(){
    //     return $this->hasMany(TransaksionDetail::class,'transaksion_id');
    // }

    public function typeTransaksions(){
        return $this->belongsTo(TypeTransaksions::class, 'type_transaksi_id', 'id');
    }

    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
