<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeTransaksions extends Model
{
    protected $table = 'type_transaksions';
    protected $fillable = [
        'name'
    ];

    protected $hidden = [

    ];

    public function transaksions(){
        return $this->hasMany(Transaksion::class,'type_transaksi_id');
    }
}

