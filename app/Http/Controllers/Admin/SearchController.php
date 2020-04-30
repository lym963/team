<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;//客户表
use App\Sell;//业务员表
use App\Call;//拜访表
class SearchController extends Controller
{
    //
    public function client(){
        $client_name = request()->client_name;
        $client_work = request()->client_work;
        $client_source = request()->client_source;
        $client_phone = request()->client_phone;
        $client_tel = request()->client_tel;
        $sell_id = request()->sell_id;
        $level = request()->level;
        //条件
        $where = [];
        //判断
        if(!empty($client_name)){
            $where[] = ['client_name','like',"%$client_name"];
        }
        if(!empty($client_work)){
            $where[] = ['client_work','like',"%$client_work"];
        }
        if(!empty($client_source)){
            $where[] = ['client_source','like',"%$client_source"];
        }
        if(!empty($client_phone)){
            $where[] = ['client_phone','like',"%$client_phone"];
        }
        if(!empty($client_tel)){
            $where[] = ['client_tel','like',"%$client_tel"];
        }
        if(!empty($sell_id)){
            $where[] = ['client.sell_id','=',"$sell_id"];
        }
        if(!empty($level)){
            $where[] = ['client_rank','=',"$level"];
        }
        //查询业务员名称
        $sellName  = Sell::get();
        $clientInfo = Client::select('client.*','sell.sell_name')->leftJoin('sell','client.sell_id','=','sell.sell_id')->where($where)->paginate(3);
        //接值
        $search = request()->all();
        //渲染数据
        return view('admin.search.client',['data'=>$clientInfo,'sell'=>$sellName,'search'=>$search]);
    }
    public function call(){
        //接值
        $call_name = request()->call_name;
        $call_site = request()->call_site;
        $call_desc = request()->call_desc;
        $call_time = request()->call_time;
        $next_time = request()->next_time;
        $sell_id = request()->sell_id;
        $client_id = request()->client_id;
        //条件
        $where = [];
        //判断
        if(!empty($call_name)){
            $where[] = ['call_name','like',$call_name];
        }
        if(!empty($call_site)){
            $where[] = ['call_site','like',$call_site];
        }
        if(!empty($call_desc)){
            $where[] = ['call_name','like',$call_desc];
        }
        if(!empty($sell_id)){
            $where[] = ['call.sell_id','=',$sell_id];
        }
        if(!empty($client_id)){
            $where[] = ['call.client_id','=',$client_id];
        }
        if(!empty($call_time)){
            $where[] = ['call_time','=',$call_time];
        }
        if(!empty($next_time)){
            $where[] = ['next_time','=',$next_time];
        }
        //查询业务员
        $sell = Sell::get();
        //查询客户
        $client = Client::get();
         //查询数据
         $callInfo = Call::select('call.*','client.client_name','sell.sell_name')->leftJoin('client','call.client_id','=','client.client_id')->leftJoin('sell','call.sell_id','=','sell.sell_id')->where($where)->paginate(3);
         //接收所有值
         $search = request()->all();
         //渲染页面
         return view('admin.search.call',['callInfo'=>$callInfo,'sell'=>$sell,'client'=>$client,'search'=>$search]);
    }
}
