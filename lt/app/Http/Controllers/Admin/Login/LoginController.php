<?php

namespace App\Http\Controllers\Admin\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mol;
use Validator,
    Hash;
use DB;

class LoginController extends Controller {

    public function login() {
        return view("Admin.Login.Login");
    }

    public function dologin(Request $request) {
        $sel = new mol();
        $nickname = $request->input("nickname");
        $pass = $request->input("pass");
        $bianhao = $request->input("bianhao");
        $data = $sel->selone("demo_user", "nickname", "=", $nickname);
        if (!empty($data)) {
            if ($data->pass == $pass) {
                if ($bianhao == $data->bianhao) {
                    session(["Adminuser" => $nickname]);

//                session()->set("Adminuser",$nickname);
                    if ($data->type == 3) {
                        $c = "您没操作权限";
                        return back()->with("errors", $c);
                    } else {
                        return redirect("admin/home/main/" . $bianhao);
                    }
                } else {
                    $c = "请输入正确的编号";
                    return back()->with("errors", $c);
                }
            } else {
                $c = "密码错误";
                return back()->with("errors", $c);
            }
        } else {
            $a = "账号不存在";
            return back()->with("errors", $a);
        }
    }

    public function outlogin() {
        session()->forget("Adminuser");
        return redirect("admin/login");
    }

}
