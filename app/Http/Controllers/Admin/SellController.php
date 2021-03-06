<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\validation\Rule;
use App\sell;//业务员表
class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //查询数据库表
        $sellInfo = sell::paginate(3);
        return view("admin.sell.index",['sellInfo'=>$sellInfo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.sell.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接值
        $post = request()->except('_token');
        //验证
        request()->validate([
            'sell_name' =>'unique:sell|required',
            'sell_tel' =>'required|regex:/^1[34578]\d{9}$/',
        ],[
            'sell_name.required' => '业务员名称不可为空',
            'sell_name.unique' => '业务员名称已存在',
            'sell_tel.required' => '业务员电话已存在',
            'sell_tel.regex' => '输入的手机号有误',
        ]);
        $res = sell::insert($post);
        //判断是否成功
        if($res){
            return redirect('sell/index');
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
        //获取修改的条数
        $sellInfo = sell::find($id);
        //渲染页面
        return view('admin.sell.edit',['sellInfo'=>$sellInfo]);
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
        $post = $request->except('_token');
        //验证
        request()->validate([
            'sell_name' =>[Rule::unique('sell')->ignore($id,'sell_id'),'required'],
            'sell_tel' =>'required|regex:/^1[34578]\d{9}$/',
        ],[
            'sell_name.required' => '业务员名称不可为空',
            'sell_name.unique' => '业务员名称已存在',
            'sell_tel.required' => '业务员电话已存在',
            'sell_tel.regex' => '输入的手机号有误',
        ]);
        //修改
        $res = sell::where('sell_id',$id)->update($post);
        //判断
        if($res!==false){
            return redirect('sell/index');
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
        $res = sell::destroy($id);
        //判断
        if($res){
            return redirect('sell/index');
        }
    }
}
