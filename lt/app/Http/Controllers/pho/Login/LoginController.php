<?php

namespace App\Http\Controllers\pho\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mol;
use Validator,
    Hash;
use DB;

class LoginController extends Controller {

    public function login($nickname = null) {
        return view("pho.Login.m_login", ["nickname" => $nickname]);
    }

    public function dologin(Request $request) {
        $sel = new mol();
        $nickname = $request->input("nickname");
        $xnickname = $request->input("xnickname");



        $pass = $request->input("pass");
        $type = $request->input("type");
        $str = $sel->selone("demo_root", "nickname", "=", $nickname);
        if (!empty($str)) {
            if ($str->pass == $pass) {
                if ($type == $str->type) {
                   
                    /*
                     * 推荐关系开始
                     */
                    if ($xnickname !== null) {
                        /*
                         * 查找推荐信息开始
                         * 推人 xnickname
                         */
                        $rows = $sel->selone("demo_root", "nickname", "=", $xnickname);
                        if (!empty($rows->name)) {
                            $array["xnickname"] = $xnickname;
                            $array["xname"] = $rows->name;
                        }

                        /*
                         * 查找推荐信息结束
                         */

                        /*
                         * 查找被推荐人的信息开始
                         * nickname推荐人账号
                         */
                        $item = $sel->selone("demo_root", "nickname", "=", $nickname);
                        if (!empty($item->nickname)) {
                            $array["lnickname"] = $nickname;
                            $array["lname"] = $item->name;
                        }

                        /*
                         * 查找被推荐人的信息结束
                         */

                        /*
                         * 判断推荐人和被推荐人的基本信息是否在表中存在开始
                         */
                        $a = $sel->selone("demo_tj", "xnickname", "=", $xnickname); //查看推荐人的信心是否在表中存在
                        if ($a == null) {
                            $tt["xnickname"] = $xnickname;
                            $tt["xname"] = $rows->name;
                            $sel->add("demo_tj", $tt);
                        }

                        $b = $sel->selone("demo_btj", "lnickname", "=", $nickname); //查看被推荐人的信息是否在表中存在
                        if ($b == null) {
                            if ($nickname !== $xnickname) {
                                $sel->add("demo_btj", $array);
                                //设置推荐奖励开始
                                $hh = $sel->selone("demo_root", "nickname", "=", $xnickname);
                                $integral["integral"] = $hh->integral + 50;
                                $sel->updatee("demo_root", "nickname", "=", $xnickname, $integral);
                                //设置推荐奖励结束
                            }
                        }
                        /*
                         * 判断推荐人和被推荐人的基本信息是否在表中存在结束
                         */
                    }
                    /*
                     * 推荐关系结束
                     */

                    if ($type == 1) {
                        session(["jTeluser" => $nickname]);
                        return redirect("jtel/navjx" . "/" . $nickname);
                    }
                    if ($type == 2) {
                        session(["Teluser" => $nickname]);
                        return redirect("tel/xyxc" . "/" . $nickname);
                    }
                } else {
                    echo "<script>alert('身份错误！');history.back()</script>";
                    $pp = array();
                    $pp["title"] = $nickname;
                    $pp["pass"] = $pass;
                    $pp["errors"] = ("身份错误！");
                    return back()->with("arry", $pp);
                }
            } else {
                echo "<script>alert('密码错误！');history.back()</script>";
                $pp = array();
                $pp["title"] = $nickname;
                $pp["pass"] = $pass;
                $pp["errors"] = ("密码错误！");
                return back()->with("arry", $pp);
            }
        } else {
            echo "<script>alert('账号不存在!');history.back();</script>";
            $pp = array();
            $pp["title"] = $nickname;
            $pp["pass"] = $pass;
            $pp["errors"] = ("账号不存在!");
            return back()->with("arry", $pp);
        }
    }

    public function reg($nickname = null) {
        return view("pho.Login.m_register", ["nickname" => $nickname]);
    }

    public function doreg($nickname = null, Request $request) {
        $sel = new mol();
        $str = $request->except("_token");

        if (empty($str["tel"])) {
            echo "<script>alert('电话不能为空!');history.back();</script>";
        }
        if (empty($str["pass"])) {
            echo "<script>alert('密码不能为空!');history.back();</script>";
        }
        if (empty($str["code"])) {
            echo "<script>alert('请输入正确的验证码!');history.back();</script>";
        }

        if ($str["code"] == session()->get("yzm")) {

        $arr = $sel->selone("demo_root", "nickname", "=", $str["tel"]);
        if (!empty($arr->nickname)) {
            echo "<script>alert('账号已存在!');history.back();</script>";
        } else {
            unset($str["password"]);
            unset($str["code"]);
            $str["nickname"] = $str["tel"];
            $arr = $sel->add("demo_root", $str);
            if ($arr == 1) {
                return redirect("tel/login" . "/" . $nickname);
            }
        }
        } else {
            echo "<script>alert('您输入的验证码不正确!');history.back();</script>";
        }
    }

    public function yzm($tel) {
        $sel = new mol();
        $str = $sel->yzm($tel);
        echo json_encode($str);
    }

    public function forgetpass() {
        return view("pho.Login.m_forget");
    }

    public function resetpass(Request $request) {
        $sel = new mol();
        $str = $request->except("_token");
        if ($str["nickname"] == "") {
            echo "<script>alert('手机密码不能为空!');history.back();</script>";
        }
        if ($str["pass"] == "") {
            echo "<script>alert('手机密码不能为空!');history.back();</script>";
        }
        if ($str["yzm"] == "") {
            echo "<script>alert('手机密码不能为空!');history.back();</script>";
        } else {
            if ($str["yzm"] == session()->get("yzm")) {
                $arr = $sel->selone("demo_root", "nickname", "=", $str["nickname"]);
                if (!empty($arr->nickname)) {
                    unset($str["yzm"]);
                    $str = $sel->updatee("demo_root", "nickname", "=", $str["nickname"], $str);
                    if ($str == 1) {
                        return redirect("tel/login");
                    }
                } else {
                    echo "<script>alert('您的账号不存在!');history.back();</script>";
                }
            } else {
                echo "<script>alert('请输入正确的验证码!');history.back();</script>";
            }
        }
    }

    public function outlogin($tel) {
        session()->forget("Teluser");
        return redirect("tel/login");
    }

}
