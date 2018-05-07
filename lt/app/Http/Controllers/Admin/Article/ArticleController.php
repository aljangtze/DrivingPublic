<?php

namespace App\Http\Controllers\Admin\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class ArticleController extends Controller
{
    public function index(Request $request) {
        $sel = new mol();
        $data = $sel->selall("demo_article", "id", "desc");
        $db = DB::table("demo_article")->orderby("id","desc");
        $where = [];
        if($request->has("title")) {
            $title = $request->input("title");
            $db->where("title","=",$title);
            $where["title"] = $title;
        }
        $data = $db->paginate(15);
        
       return view("Admin.article.tab",["items"=>$data,"where"=>$where]);
    }
    
    public function look($id) {
        $sel = new mol();
        $str = $sel->selone("demo_article", "id", "=", $id);
        return view("Admin.article.detail",["str"=>$str]);
    }


    public function create() {
        return view("Admin.article.form");
    }
    
    public function store(Request $request) {
        $sel = new mol();
        $data = $request->except("_token");
        date_default_timezone_set('PRC');
        $data["fbdate"] = date("Y-m-d H:i:s");
        $upims = $request->file('pic');
        if(empty($upims) || $upims == "" || $upims == null) {
            echo "<script>alert('请上传图片!');history.back();</script>";
        } else {
            $data['pic'] = $sel->uploads($upims,"./article",$data["pic"],"50","50",$data["pic"]);
            $str = $sel->add("demo_article", $data);
            if($str == 1) {
                return redirect("admin/article");
            }
        }
    }
    
    public function edit($id) {
        $sel= new mol();
        $str = $sel->selone("demo_article", "id", "=", $id);
        return view("Admin.article.edit",["str"=>$str]);
    }
    
    public function update($id,Request $request){
        $sel = new mol();
        $data = $request->except("_token","_method");
        $upims = $request->file('pic');
        if(empty($upims) || $upims == "" || $upims == null) {
            $data["pic"] = $data["mypic"];
        } else {
            $data['pic'] = $sel->uploads($upims,"./article",$data["pic"],"50","50",$data["mypic"]);
            unlink("./article/s_".$data["mypic"]);
            unlink("./article/".$data["mypic"]);
        }
            unset($data["mypic"]);
            $str = $sel->updatee("demo_article", "id", "=", $id, $data);
            if($str == 1) {
                return redirect("admin/article");
            }
    }
    
    public function destroy($id) {
        $sel = new mol();
        $str = $sel->selone("demo_article", "id", "=", $id);
        if(!empty($str->pic)){
            unlink("./article/s_".$str->pic);
            unlink("./article/".$str->pic);
        }
        $arr = $sel->sedelete("demo_article", "id", "=", $id);
        if($arr == 1) {
            return back();
        }
    }
    
    public function articlesqdel($id) {
        $sel = new mol();
        $str = explode(",", $id);
        foreach($str as $v) {
            $arr = $sel->selone("demo_article", "id", "=", $v);
            if(!empty($arr->pic)) {
                unlink("./article/s_".$arr->pic);
                unlink("./article/".$arr->pic);
            }
            $rows = $sel->sedelete("demo_article", "id", "=", $v);
        }
        if($rows == 1) {
            return back();
        }
    }
}
