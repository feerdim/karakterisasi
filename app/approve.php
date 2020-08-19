<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class approve extends Model
{
    protected $fillable = ['id','name'];
    public function orders(){
        return $this->hasMany('App\Order');
    }
}
