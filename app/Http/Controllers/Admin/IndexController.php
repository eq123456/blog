<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Model\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Log;


class IndexController extends Controller
{
    public function index()
    {	
    	return view('admin/index');
	}
	public function element()
	{
		return view('admin/element');
	}
	public function info(){	//dd(session('user.user_name'));	
		return view('admin/info');
	}
	public function quit(){
		session(["user"=>null]);
		return redirect('admin/login');
	}
	
	public function pass(){
		if($input=Input::all()){
			$rules=['password'=>'required|between:6,20|confirmed',];
			$message=[
				'password.required'=>'新密码不能为空！',
				'password.between'=>'新密码必须在6-20位之间！',
				'password.confirmed'=>'新密码和确认密码不一致！',
			];
			$validator=Validator::make($input,$rules,$message);			
			if($validator->passes()){
				$user=User::first();//dd(session('user'));
				if(Crypt::decrypt($user->password)==$input['password_o']){
				$user->password=Crypt::encrypt($input['password_o']);
				$user->update();
				return redirect('admin/info'); 
				}else{
					return back()->with('errors','原密码输入有误！');
				}
				
			}else{	
				//dd($validator->errors()->all());
				//dd(back());
				return back()->withErrors($validator);
			}
			
		}else{
		return view('admin.pass');
		}
	}
}













