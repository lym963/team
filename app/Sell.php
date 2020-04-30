<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $table="sell";
    protected $primaryKey="sell_id";
    protected $guarded=[];
    public $timestamps=false;
}
