<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use App\Sell;
use Illuminate\Validation\Rule;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize=config("app.pageSize");
        $data=Client::select("client.*","sell.sell_id","sell.sell_name")
                    ->leftJoin("sell","client.sell_id","=","sell.sell_id")
                    ->paginate($pageSize);
        return view("admin.client.index",["data"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sell=Sell::get();
        return view("admin.client.create",["sell"=>$sell]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证
        $request->validate([ 
            'client_name' => 'bail|required|unique:client|regex:/^[\x{4e00}-\x{9fa5}\w_]{2,50}$/u',
        ],[
            "client_name.required"=>"客户名称不可为空",
            "client_name.unique"=>"客户名称已存在",
            "client_name.regex"=>"客户名称格式不正确",
        ]);
        $data=$request->except("_token");
        $res=Client::insert($data);
        if($res){
            return redirect("client/index");
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sell=Sell::get();
        $data=Client::find($id);
        return view("admin.client.edit",["data"=>$data,"sell"=>$sell]);
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
        //表单验证
        $request->validate([ 
            'client_name' => [
                'bail',
                'required',
                Rule::unique("client")->ignore($id,"client_id"),
                'regex:/^[\x{4e00}-\x{9fa5}\w_]{2,50}$/u'
            ]
        ],[
            "client_name.required"=>"客户名称不可为空",
            "client_name.unique"=>"客户名称已存在",
            "client_name.regex"=>"客户名称格式不正确",
        ]);
        $data=$request->except("_token");
        $res=Client::where("client_id",$id)->update($data);
        if($res!==false){
            return redirect("client/index");
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
        $res=Client::destroy($id);
        if($res){
            return redirect("client/index");
        }
    }
}
