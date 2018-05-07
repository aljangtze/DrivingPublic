<?php

namespace App\Http\Controllers\pho\Zzfb;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\mol;
use Validator,Hash;
use DB;

class ZzfbController extends Controller
{
    public function detail($nickname=null,$id) {
        $sel = new mol();
        $zzfb = $sel->selone("demo_zzfb", "id", "=", $id);
        $zzfbclass = $sel->selwhere("demo_zzfbclass", "jid", "=", $zzfb->id,"id","desc");
        $qxjl = $sel->selwhere("demo_grrz", "bianhao", "=", $zzfb->bh, "id", "desc");
        return view("pho.Zzfb.m_drive_xq",["zzfb"=>$zzfb,"qxjl"=>$qxjl,"zzfclass"=>$zzfbclass]);
    }
}
