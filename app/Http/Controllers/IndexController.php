<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class IndexController extends Controller
{
    //进入注册页面
    public function index()
    {
        // 解析页面
        return view('index');
    }

}
