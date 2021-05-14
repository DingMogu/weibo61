<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class SessionsController extends Controller
{
    //跳转登录界面
    public function create()
    {
        return view('sessions.create');
    }
    //提交登录
    public function store(Request  $request)
    {
        $credentials = $this->validate($request,[
           'email' => 'required|email|max:255',
           'password' => 'required'
        ]);

        if(Auth::attempt($credentials,$request->has('remember'))) {
            //登录成功后的操作
            session()->flash('success','欢迎回来');
            return  redirect()->route('users.show',[Auth::user()]);
        }else{
            //登录失败后的操作
            session()->flash('danger','很抱歉,您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success','您已成功退出');
        return redirect('login');
    }
}
