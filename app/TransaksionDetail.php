<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksionDetail extends Model
{
    protected $table = 'transaksions_details';
    protected $fillable = [
        'produk_id', 'transaksion_id', 'stok'
    ];

    protected $hidden = [

    ];
    public function transaksion(){
        return $this->belongsTo(Transaksion::class,'transaksion_id', 'id');
    }

     // belongs produks
     public function produks(){
        return $this->belongsTo(Produk::class,'produk_id', 'id');
    }

     // belongs produks
    //  public function transaksions(){
    //     return $this->belongsTo(Transaksion::class,'transaksi_id', 'id');
    // }

    public function transaksions(){
        return $this->belongsTo('App\Transaksion');
    }

    public function typeTransaksions(){
        return $this->belongsTo(TypeTransaksions::class, 'type_transaksi_id', 'id');
    }
}
