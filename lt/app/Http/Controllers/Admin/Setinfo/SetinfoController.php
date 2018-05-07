<?php

namespace App\Http\Controllers\Admin\Setinfo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class SetinfoController extends Controller
{
    public function index() {
        $sel = new mol();
        $str = $sel->selone("demo_setinfo", "id", "=", "1");
        return view("Admin.Setinfo.tab",["str"=>$str]);
    }
    
    public function zfedit($id) {
        $sel = new mol();
        $str = $sel->selone("demo_setinfo", "id", "=", $id);
        return view("Admin.Setinfo.zfedit",["str"=>$str]);
    }
    
    public function store(Request $request) {
        $sel = new mol();
        $data["zfsm"] = $request->input("zfsm");
        $str = $sel->updatee("demo_setinfo", "id", "=", "1", $data);
        if($str == 1) {
            return redirect("admin/setinfo");
        }
    }
    
    public function txsetinfo(Request $request) {
        $sel = new mol();
        $data["txsm"] = $request->input("txsm");
        $str = $sel->updatee("demo_setinfo", "id", "=", "1", $data);
        if($str == 1) {
            return redirect("admin/setinfo");
        }
    }
    
    public function edit($id) {
        $sel = new mol();
        $str = $sel->selone("demo_setinfo", "id", "=", $id);
        return view("Admin.Setinfo.syedit",["str"=>$str]);
    }
    
    public function update($id,Request $request) {
        $sel = new mol();
        $data["ptsysm"] = $request->input("ptsysm");
        $str = $sel->updatee("demo_setinfo", "id", "=", $id, $data);
        if($str == 1) {
            return redirect("admin/setinfo");
        }
    }
    
    public function jsedit($id) {
        $sel = new mol();
        $str = $sel->selone("demo_setinfo", "id", "=", $id);
        return view("Admin.Setinfo.jsedit",["str"=>$str]);
    }
    
    public function txsm($id) {
        $sel = new mol();
        $str = $sel->selone("demo_setinfo", "id", "=", $id);
        return view("Admin.Setinfo.txedit",["str"=>$str]);
    }
    
    public function jssave($id,Request $request) {
        $sel = new mol();
        $data["jszsysm"] = $request->input("jszsysm");
        $str = $sel->updatee("demo_setinfo", "id", "=", $id, $data);
        if($str == 1) {
            return redirect("admin/setinfo");
        }
    }
    
    public function qcedit($id) {
         $sel = new mol();
        $str = $sel->selone("demo_setinfo", "id", "=", $id);
        return view("Admin.Setinfo.qcedit",["str"=>$str]);
    }
    
    public function qcsave($id,Request $request) {
        $sel = new mol();
        $data["qcfwsysm"] = $request->input("qcfwsysm");
        $str = $sel->updatee("demo_setinfo", "id", "=", $id, $data);
        if($str == 1) {
            return redirect("admin/setinfo");
        }
    }
}
