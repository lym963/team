<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
     //定义表名
     protected $table = "client";
     //定义主键
     protected $primaryKey ="client_id";
     //关闭自动时间
     public $timestamps = false;
}
