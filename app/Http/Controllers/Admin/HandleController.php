<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class HandleController extends Controller
{
    //
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
}
