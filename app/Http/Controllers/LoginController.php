<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    //解析页面
    public function index()
    {
        // 解析登录页面
        return view('login');
    }

    //接收登录信息,验证数据,执行登录
    public function login(Request $request)
    {
        //接收表单数据
        $data = $request->only(['username','pass']);
        // dd($data);
        $tourl = $request->session()->get('nowurl');
        $where = $data['username'];
        // 查询用户是否存在
        $user = DB::table('users')->where('username',$where)->first();
        // dd($user);
        if($user){
            //检测密码是否一致
            if($data['pass'] == $user->pass){
                //登录成功,将登录信息用户id存入session
                session(['uid'=>$user->id]);
                session(['username'=>$user->username]);
                
                    return redirect('/news');
            }else{
                return back()->with('error','用户名或密码错误');
            }
        }else{
            return back()->with('error','没有此用户');
        }
    }

    //退出登录
    public function logout()
    {
        // 清除session中的用户id
        session()->forget('uid');
        session()->forget('username');
        return redirect('/');
    }
}
