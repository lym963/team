<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use DB;
class StatController extends Controller
{
    //客户行业统计
    public function work(){
        $count=Client::count();
        $data=DB::select("select count(*) as num,client_work from client group by client_work");
        $info=[];
        foreach($data as $k=>$v){
            $info[$k]['y']=$v->num/$count;
            $info[$k]['name']=$v->client_work;
        }
        $data = json_encode($info); 
        return view("admin.stat.work",["data"=>$data]);
    }
    //来源统计
    public function source(){
        $count=Client::count();
        $data=DB::select("select count(*) as num,client_source from client group by client_source");
        $info=[];
        foreach($data as $k=>$v){
            $info[$k]['y']=$v->num/$count;
            $info[$k]['name']=$v->client_source;
        }
        $data = json_encode($info); 
        return view("admin.stat.source",["data"=>$data]);
    }
}
