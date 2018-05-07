<?php

namespace App\Http\Controllers\pho\Comm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\View;

use App\Model\mol;
use Validator,Hash;
use DB;


class CommController extends Controller
{
    public function __construct(){
        $sel = new mol();
        $rows = $sel->selall("demo_zzfb", "id", "desc");
        
        function selcjl($at) {
            foreach($at as $v) {
                $arr[$v->id] = DB::table("dingdan")->where("o","=",$v->bh)->count();
            }
            return $arr;
        }
        
        $cjl = selcjl($rows);
        
        View::share(['cqh'=>$rows,"cjl"=>$cjl]);
    }
}
