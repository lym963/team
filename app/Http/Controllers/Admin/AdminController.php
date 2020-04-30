<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Validation\Rule;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize=config("app.pageSize");
        $data=Admin::paginate($pageSize);
        return view("admin.admin.index",["data"=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.admin.create");
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
            'admin_name' => 'bail|required|unique:admin|regex:/^[\x{4e00}-\x{9fa5}\w_]{2,50}$/u',
        ],[
            "admin_name.required"=>"管理员名称不可为空",
            "admin_name.unique"=>"管理员名称已存在",
            "admin_name.regex"=>"管理员名称格式不正确",
        ]);
        $data=$request->except("_token");
        $data["admin_pwd"]=encrypt($data["admin_pwd"]);
        $res=Admin::insert($data);
        if($res){
            return redirect("admin/index");
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
        $data=Admin::find($id);
        $data["admin_pwd"]=decrypt($data["admin_pwd"]);
        return view("admin.admin.edit",["data"=>$data]);
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
            'admin_name' => [
                'bail',
                'required',
                Rule::unique("admin")->ignore($id,"admin_id"),
                'regex:/^[\x{4e00}-\x{9fa5}\w_]{2,50}$/u'
            ]
        ],[
            "admin_name.required"=>"管理员名称不可为空",
            "admin_name.unique"=>"管理员名称已存在",
            "admin_name.regex"=>"管理员名称格式不正确",
        ]);
        $data=$request->except("_token");
        $data["admin_pwd"]=encrypt($data["admin_pwd"]);
        $res=Admin::where("admin_id",$id)->update($data);
        if($res!==false){
            return redirect("admin/index");
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
        $res=Admin::destroy($id);
        if($res){
            return redirect("admin/index");
        }
    }
}
