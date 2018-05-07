<?php

namespace App\Http\Controllers\Admin\Tjgx;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mol;
use Validator,
    Hash;
use DB;

class TjgxController extends Controller {

    public function index() {
        $sel = new mol();
        $data = $sel->selall("demo_tj", "id", "desc");
        
        /*
         * 推荐人数开始
         */
        function count($yy) {
            foreach($yy as $v) {
                $trr[$v->id] = DB::table("demo_btj")->where("xnickname","=",$v->xnickname)->count();
            }
            return $trr;
        }
        $selcount = count($data);
        /*
         * 推荐人数结束
         */
        
        /*
         * 推荐奖励开始
         */
        function seltjj($uu) {
            foreach($uu as $t) {
                $tt[$t->id] = DB::table("demo_root")->where("nickname","=",$t->xnickname)->first();
            }
            return $tt;
        }
        $tjj = seltjj($data);
        /*
         * 推荐奖励结束
         */
        
        return view("Admin.Tjgx.tab", ["items" => $data,"trr"=>$selcount,"tjj"=>$tjj]);
    }

    public function create() {
        
    }

    public function store(Request $request) {
        
    }

    public function edit($id) {
        $sel = new mol();
        $data = $sel->selwhere("demo_btj", "xnickname", "=", $id, "id", "desc");
        return view("Admin.Tjgx.taba", ["items" => $data]);
    }

    public function update($id, Request $request) {
        
    }

    public function destroy($id) {
        
    }

}
