<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    //定义表名
    protected $table = "sell";
    //定义主键
    protected $primaryKey ="sell_id";
    //关闭自动时间
    public $timestamps = false;
}
