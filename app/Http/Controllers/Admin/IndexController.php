<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
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
	public function add(){
		return view('admin/add');
	}
	public function lists(){
		return view('admin/list');
	}
	public function tab(){
		return view('admin/tab');
	}
	public function img(){
		return view('admin/img');
	}
	public function pass(){
		if($input=Input::all()){
			//Log::debug($input);
			$rules=['password'=>'required|between:6,20|confirmed',];
			$message=[
				'password.required'=>'新密码不能为空！',
				'password.between'=>'新密码必须在6-20位之间！',
				'password.confirmed'=>'新密码和确认密码不一致！'
			];
			$validator=Validator::make($input,$rules,$message);
			if($validator->passes()){
				echo 'yes';
			}else{
				//dd($validator->errors()->all());
				return back()->withErrors($validator);
			}
		}else{
		return view('admin/pass');
		}
	}
}













