<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;//客户表
use App\sell;//业务员表
use App\Call;//访谈表
class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询数据
        $callInfo = Call::select('call.*','client.client_name','sell.sell_name')->leftJoin('client','call.client_id','=','client.client_id')->leftJoin('sell','call.sell_id','=','sell.sell_id')->paginate(3);
        //渲染页面
        return view('admin.call.index',['callInfo'=>$callInfo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //访谈客户的id和姓名
        $client = Client::select('client_id','client_name')->get();
        //访谈业务员的id和姓名
        $sell = sell::select('sell_id','sell_name')->get();
        //渲染页面
        return view('admin.call.create',['client'=>$client,'sell'=>$sell]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收参数
        $post = request()->except('_token');
        //入库
        $res = Call::insert($post);
        //判断
        if($res){
            return redirect('call/index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //访谈客户的id和姓名
        $client = Client::select('client_id','client_name')->get();
        //访谈业务员的id和姓名
        $sell = sell::select('sell_id','sell_name')->get();
        //查询表
        $callInfo = Call::find($id);
        //渲染页面
        return view('admin.call.edit',['client'=>$client,'sell'=>$sell,'callInfo'=>$callInfo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //接值
        $post = request()->except('_token');
        //修改
        $res = Call::where('call_id',$id)->update($post);
        //判断
        if($res!==false){
            return redirect('call/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除
        $res = Call::destroy($id);
        //判断
        if($res){
            return redirect('call/index');
        }
    }
}
