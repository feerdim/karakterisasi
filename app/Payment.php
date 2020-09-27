<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['id','approves_id','no_invoice','no_receipt','date_invoice','date_receipt','status','quantity','service','total','image'];
    public function approves(){
        return $this->belongsTo('App\Approve');
    }
}
