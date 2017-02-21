<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class NewsController extends Controller
{
    //显示新闻页面
    public function index()
    {
    	// 读取数据
    	$news = DB::table('news')->orderby('addtime','desc')->get();
    	// dd($news);
    	// 显示新闻列表
    	return view('home.index',['newsinfo'=>$news]);
    }

    // 新闻发布页
    public function add()
    {
    	// 显示新闻发布页面
    	// echo 111;
    	return view('home.add');
    }

    // 执行发布
    public function insert(Request $request)
    {
    	//  接收数据
    	$data = $request->except('_token');
    	$time = date("Y-m-d H:i:s",time());
    	$data['addtime'] = $time;
    	// 执行发布
    	$res = DB::table('news')->insert($data);
		if($res){
			// 成功
			return redirect('/news');
		}else{
			// 失败
			return back()->with('error','数据添加失败');
		}
    	// dd($data);
    }

    // 修改
    public function edit($id)
    {
    	// 查询数据
        $res = DB::table('news')->where('id',$id)->first();
        // 显示模板 分配变量
    	return view('home.edit',['newinfo'=>$res]);
    }

    // 执行修改
    public function update(Request $request)
    {
    	// 接收数据
        $date = $request->only(['title','intro','author','info']);
        $id = $request->input('id');
       
        // 执行修改
        $res = DB::table('news')->where('id',$id)->update($date);

        if($res){
            // 成功
            return redirect('/news');
        }else{
            // 失败
            return back()->with('error','数据修改失败');
        }
    }

    // 删除
    public function delete($id)
    {
    	// 执行删除
    	$res = DB::table('news')->where('id',$id)->delete();
        if($res){
            // 成功
            return redirect('/news');
        }else{
            // 失败
            return back()->with('error','数据删除失败');
        }
    }
}
