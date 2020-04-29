<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    // //定义表名
    protected $table = "call";
    //定义主键
    protected $primaryKey ="call_id";
    //关闭自动时间
    public $timestamps = false;
}
