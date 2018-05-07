<?php

namespace App\Http\Controllers\pho\Znx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class ZnxController extends Controller
{
    public function znx($nickname=null) {
        $sel = new mol();
        $data = DB::table("demo_znx")->where("nickname","=",$nickname)->orderby("id","desc")->get();
        return view("pho.znx.m_letter",["items"=>$data]);
    }
    
    public function znxdel($id) {
        $sel = new mol();
       $str = $sel->sedelete("demo_znx", "id", "=", $id);
       if($str == 1) {
           return back();
       }
    }
}
