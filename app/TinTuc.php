<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    protected $table = "TinTuc";

    public function loaitin()
    {
    	return $this->belongsTo('App\LoaiTin','IdLoaiTin','Id');
    } 
    public $timestamps=false;
}
