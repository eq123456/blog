<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use App\Http\Model\User;

require 'resources/org/code/Code.class.php';
class LoginController extends Controller
{
	public function login(){
		if($input=Input::all()){
			$code=new \Code;
			$acode=$code->get();
			if(strtoupper($input['code'])!=$acode)
			{
				return back()->with('msg','验证码输入有误！');
			}
			$user=User::first();			
			if($user->user_name!=$input['user_name'] || Crypt::decrypt($user->user_pass)!=$input['user_pass'])
			{
				return back()->with('msg','用户名或密码错误！');
			}
			session(['user'=>$user]);
			//dd(session('user'));
			return redirect('admin/index');
		}else{
			return view('admin.login');
		}
		
	}
	public function code(){
		$code=new \Code;
		$code->make();
	}
}
