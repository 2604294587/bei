<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SignupController extends Controller
{
    //进入注册页面
    public function index()
    {
        // 解析注册页面
        return view('signup');
    }


    //接收并验证值
    public function signup(Request $request)
    {

        $info=$request->only(['username','pass']);
        // dd($data);
        //密码通过hash加密
        // $data['password']=Hash::make($request->input('password'));
        $data['username'] = $info['username'];
        $data['pass'] = $info['pass'];
        $data['addtime'] = date('Y-m-d H:i:s',time());
        // dd($data);
        //将注册数据插入数据库;
        $res=DB::table('users')->insert($data);  
         // dd($res);
        if($res){
            return view('login');
            //echo '注册成功';
        }else{
            return back();
        } 
    }
}
